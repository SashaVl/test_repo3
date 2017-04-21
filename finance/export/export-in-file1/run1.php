<?php

function openFileXml($data, $fileXml = 'template.php')
{
    /**
     * @var $xmlstr = new DOMDocument()
     */
    include $fileXml;
    return $xmlstr;
}


defined('STDIN') OR define('STDIN', fopen('php://stdin', 'r'));

defined('_DS') OR define('_DS',DIRECTORY_SEPARATOR);

$data = fgets(STDIN);

//*********************************vars**********************************************
include_once "vars.php";
//******************************end vars*********************************************

// Decode JSON
$data = json_decode($data, true);
$export_id = $data['export_id'];
$invoices = $data['invoices'];

$dir = createTempDir('invoices_');

$zip = new ZipArchive();

$zip_name = $dir.'/'.time().".zip";
if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
{
}

$tax = 22;

foreach ($invoices as $i => $invoice) {

    $data = array(
        'DenominazioneSeller'   =>  "",
        'IndirizzoSeller'       =>  "",
        'CAPSeller'             =>  "",
        'ComuneSeller'          =>  "",
        'provinceSeller'        =>  "",
        'IdPaese'               =>  vars::IdPaese,
        'NazioneSeller'         =>  "",
        'idCodice'              =>  vars::idCodice,
        'progressivoInvio'      =>  vars::progressivoInvio,
        'FormatoTrasmissione'   =>  vars::FormatoTrasmissione,
        'CodiceDestinatario'    =>  vars::CodiceDestinatario,
        'RegimeFiscale'         =>  vars::RegimeFiscale,
        'Ufficio'               =>  "",
        'NumeroREA'             =>  "",
        'CapitaleSociale'       =>  "",
        'SocioUnico'            =>  "",
        'StatoLiquidazione'     =>  "",
        'Telefono'              =>  "",
        'Fax'                   =>  "",
        'Email'                 =>  "",
        'RiferimentoAmministrazione' => "",
        'DenominazioneBuyer'    =>  "",
        'IndirizzoBuyer'        =>  "",
        'CAPBuyer'              =>  "",
        'ComuneBuyer'           =>  "",
        'ProvinciaBuyer'        =>  "",
        'NazioneBuyer'          =>  "",
        'TipoDocumento'         =>  "",
        'Divisa'                =>  "",
        'Data'                  =>  "",
        'Numero'                =>  "",
        'ImportoTotaleDocumento'=>  "",
        'DescrizioneService'    =>  "",
        'DescrizioneServiceTax' =>  "",
        'AliquotaIVA'           =>  number_format($tax,2),
        'Quantita'              =>  "",
        'PrezzoUnitario'        =>  "",
        'PrezzoTotale'          =>  "",
        'Imposta'               =>  "",
        'RiferimentoNormativo'  =>  "",
        'CondizioniPagamento'   =>  "",
        'ModalitaPagamento'     =>  "",
        'DataScadenzaPagamento' =>  "",
        'ImportoPagamento'      =>  "",
        'IstitutoFinanziario'   =>  "",
        'IBAN'                  =>  "",



    );

    $dom = new SimpleXMLElement(openFileXml($data));
    $dom->formatOutput = true;
    $dom->preserveWhiteSpace = false;

    foreach ($invoices['items'] as $key => $itemInv)
    {

    }


    $zip->addFromString ( $invoice['id'] . '.xml' , $dom->saveXML());

}
$zip->close();
readfile($zip_name);

//var_dump($invoices);

$pathToPHP = "";
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $pathToPHP = 'C:\Winginx\php54\php.exe';
} elseif (PHP_OS === 'Darwin') {
    // for macos
    $pathToPHP = '/usr/local/bin/php';
} else {
    $pathToPHP = '/usr/bin/php';
}

$pathToScript = __DIR__ . _DS . '..' . _DS . '..' . _DS .
    '..' . _DS . '..' . _DS . 'script' . _DS . 'tools';


$extension = 'zip';
$command = $pathToPHP . ' ' . $pathToScript . ' change-export-file-extension --type="invoice" --id="' . $export_id . '" --extension="' . $extension . '"';
exec($command);

function createTempDir($prefix = null)
{
    $name = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid($prefix, true);

    if (file_exists($name)) {
        unlink($name);
    }

    mkdir($name, 0777, true);

    if (is_dir($name)) {
        return $name;
    } else {
        return false;
    }
}