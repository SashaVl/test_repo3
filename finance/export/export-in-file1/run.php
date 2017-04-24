<?php
include_once 'XmlCreator.php';

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
//include_once 'DomElement.php';

$tax = 22;

foreach ($invoices as $i => $invoice) {

    /*
     *
     */

    $array = array(
        'DenominazioneSeller'   =>  $invoice['values']['company_name'],      //Назва компанії продавця послуг
        'IndirizzoSeller'       =>  $invoice['values']['street_1']."".$invoice['values']['street_2'], //Юридична адреса компанії продавца послуг
        'CAPSeller'             =>  $invoice['values']['zip'],               //Код почти компанії (Zip code) (юридична адреса продавця)
        'ComuneSeller'          =>  $invoice['values']['city'],              //автономна й незалежна одиниця адміністративно-територіального поділу Італії (юридична адреса продавця)
        'ProvinciaSeller'       =>  "",                                      //код провинции Італії наприклад: CB - CAMPOBASSO (юридична адреса продавця)
        'IdPaese'               =>  vars::IDPAESE,                           //код країни (юридична адреса продавця)
        'NazioneSeller'         =>  vars::NAZIONE,                           //Нація використовую скорочення код країни (юридична адреса продавця)
        'idCodice'              =>  vars::idCodice,                          //налоговый кодекс (юридична адреса продавця)
        'progressivoInvio'      =>  vars::progressivoInvio,                  //Тип документа
        'FormatoTrasmissione'   =>  vars::FormatoTrasmissione,
        'CodiceDestinatario'    =>  vars::CodiceDestinatario,
        'RegimeFiscale'         =>  vars::RegimeFiscale,
        'Ufficio'               =>  "",
        'NumeroREA'             =>  "",
        'CapitaleSociale'       =>  "",
        'CodiceFiscale'         =>  "",
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
        'DatiBeniServizi'       =>  $invoice['items'],
        'CodiceTip'             =>  "INTERNO",
        'CodiceValore'          =>  "",
        'DescrizioneTax'        =>  "",
        'PrezzoUnitarioTax'     =>  "",
        'EsigibilitaIVA'        =>  "",
    );

    $dom = XmlCreator::GenXml($array);
    echo $dom->saveXML();
    //var_dump($invoice);
    //$zip->addFromString ( $invoice['id'] . '.xml' , $dom->saveXML());
    break;
}
$zip->close();

//readfile($zip_name);

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


$extension = 'txt';
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