<?php


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

    $dat_ = array(
        'DenominazioneSeller'   =>  "",
        'IndirizzoSeller'       =>  "",
        'CAPSeller'             =>  "",
        'ComuneSeller'          =>  "",
        'ProvinciaSeller'        =>  "",
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

    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->formatOutput = true;
    $dom->preserveWhiteSpace = false;
    $domx = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="(File per visualizzazione FatturaPA 1.2 - NON inviare).xsl"');
    $dom->appendChild($domx);

    /*
     * $FE - тег "FatturaElettronica"
     * $attr1 (2,3) - атрибути теги "FatturaElettronica"
     * $tNode - текст атрибутів
     */

    $FE = $dom->createElement("p:FatturaElettronica");

    $attr1 = $dom->createAttribute("versione");
    $tNode = $dom->createTextNode("FPA12");
    $attr1->appendChild($tNode);
    $attr2 = $dom->createAttribute("xmlns:p");
    $tNode = $dom->createTextNode("http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2");
    $attr2->appendChild($tNode);
    $attr3 = $dom->createAttribute("xmlns:ds");
    $tNode = $dom->createTextNode("http://www.w3.org/2000/09/xmldsig#");
    $attr3->appendChild($tNode);
    $FE->appendChild($attr1);
    $FE->appendChild($attr2);
    $FE->appendChild($attr3);

    /*
     * $FEH - тег "FatturaElettronicaHeader" sub FatturaElettronicas
     */

    $FEH = $dom->createElement("FatturaElettronicaHeader");

    /*
     * $DT - тег "DatiTrasmissione" sub "FatturaElettronicaHeader"
     */

    $DT = $dom->createElement("DatiTrasmissione");

    /*
     * $IT - тег "IdTrasmittente" sub "DatiTrasmissione"
     */

    $IT = $dom->createElement("IdTrasmittente");

    /*
     *  $IP - тег "IdPaese" sub "IdTrasmittente"
     *  $tNode - текст теги "IdPaese"
     */

    $IP = $dom->createElement("IdPaese");
    $tNode = $dom->createTextNode($dat_['IdPaese']);
    $IP->appendChild($tNode);
    /*
     *  $IC - тег "IdCodice" sub "IdTrasmittente"
     *  $tNode - текст теги "IdCodice"
     */

    $IC = $dom->createElement("IdCodice");
    $tNode = $dom->createTextNode($dat_['idCodice']);
    $IC->appendChild($tNode);


    $IT->appendChild($IP);
    $IT->appendChild($IC);

    $DT->appendChild($IT);

    /*
     *  $PI - тег "ProgressivoInvio" sub "DatiTrasmissione"
     *  $tNode - текст теги "ProgressivoInvio"
     */

    $PI = $dom->createElement("ProgressivoInvio");
    $tNode = $dom->createTextNode($dat_['progressivoInvio']);
    $PI->appendChild($tNode);

    $DT->appendChild($PI);

    /*
         *  $FT - тег "FormatoTrasmissione" sub "DatiTrasmissione"
         *  $tNode - текст теги "FormatoTrasmissione"
         */

    $FT = $dom->createElement("FormatoTrasmissione");
    $tNode = $dom->createTextNode($dat_['FormatoTrasmissione']);
    $FT->appendChild($tNode);

    $DT->appendChild($FT);

    /*
     *  $CD - тег "CodiceDestinatario" sub "DatiTrasmissione"
     *  $tNode - текст теги "CodiceDestinatario"
     */

    $CD = $dom->createElement("CodiceDestinatario");
    $tNode = $dom->createTextNode($dat_['CodiceDestinatario']);
    $CD->appendChild($tNode);

    $DT->appendChild($CD);
    $FEH->appendChild($DT);

    /*
    * закрита тега DatiTrasmissione
    */
    /*
     * $CP - тег "CedentePrestatore" sub "FatturaElettronicaHeader"
     */
    $CP = $dom->createElement("CedentePrestatore");
    /*
     * $DA - тег "DatiAnagrafici" sub "CedentePrestatore"
     */
    $DA = $dom->createElement("DatiAnagrafici");
    /*
     * $IFIVA - тег "IdFiscaleIVA" sub "DatiAnagrafici"
     */
    $IFIVA = $dom->createElement("IdFiscaleIVA");

    $IP1 = $dom->createElement("IdPaese");
    $tNode = $dom->createTextNode($dat_['IdPaese']);
    $IP1->appendChild($tNode);

    $IC1 = $dom->createElement("IdCodice");
    $tNode = $dom->createTextNode($dat_['idCodice']);
    $IC1->appendChild($tNode);

    $IFIVA->appendChild($IP1);
    $IFIVA->appendChild($IC1);
    $DA->appendChild($IFIVA);

    /*
     * $CF - тег "CodiceFiscale" sub "DatiAnagrafici"
     */

    $CF = $dom->createElement("CodiceFiscale");
    $tNode = $dom->createTextNode($dat_['CodiceFiscale']);
    $CF->appendChild($tNode);
    $DA->appendChild($CF);
    /*
     * $A - тег "Anagrafica" sub "DatiAnagrafici"
     */
    $A = $dom->createElement("Anagrafica");
    /*
     * $D - тег "Denominazione" sub "Anagrafica"
     */
    $D = $dom->createElement("Denominazione");
    $tNode = $dom->createTextNode($dat_['DenominazioneSeller']);
    $D->appendChild($tNode);
    $A->appendChild($D);
    $DA->appendChild($A);

    /*
     * $RF - тег "RegimeFiscale" sub "DatiAnagrafici"
     */
    $RF = $dom->createElement("RegimeFiscale");
    $tNode = $dom->createTextNode($dat_['RegimeFiscale']);
    $RF->appendChild($tNode);
    $DA->appendChild($RF);
    $CP->appendChild($DA);

    /*
     * тег "Sede" sub "CedentePrestatore"
     */

    $Sede = $dom->createElement("Sede");
    $I = $dom->createElement("Indirizzo");
    $tNode = $dom->createTextNode($dat_['IndirizzoSeller']);
    $I->appendChild($tNode);
    $Sede->appendChild($I);

    $CAP = $dom->createElement("CAP");
    $tNode = $dom->createTextNode($dat_['CAPSeller']);
    $CAP->appendChild($tNode);
    $Sede->appendChild($CAP);

    $C = $dom->createElement("Comune");
    $tNode = $dom->createTextNode($dat_['ComuneSeller']);
    $C->appendChild($tNode);
    $Sede->appendChild($C);

    $P = $dom->createElement("Provincia");
    $tNode = $dom->createTextNode($dat_['ProvinciaSeller']);
    $P->appendChild($tNode);
    $Sede->appendChild($P);

    $N = $dom->createElement("Nazione");
    $tNode = $dom->createTextNode($dat_['NazioneSeller']);
    $N->appendChild($tNode);
    $Sede->appendChild($N);
    $CP->appendChild($Sede);

    $IREA = $dom->createElement("IscrizioneREA");

    $U = $dom->createElement("Ufficio");
    $tNode = $dom->createTextNode($dat_['Ufficio']);
    $U->appendChild($tNode);
    $IREA->appendChild($U);

    $NREA = $dom->createElement("NumeroREA");
    $tNode = $dom->createTextNode($dat_['NumeroREA']);
    $NREA->appendChild($tNode);
    $IREA->appendChild($NREA);

    $NREA = $dom->createElement("NumeroREA");
    $tNode = $dom->createTextNode($dat_['NumeroREA']);
    $NREA->appendChild($tNode);
    $IREA->appendChild($NREA);

    $NREA = $dom->createElement("NumeroREA");
    $tNode = $dom->createTextNode($dat_['NumeroREA']);
    $NREA->appendChild($tNode);
    $IREA->appendChild($NREA);

    $CS = $dom->createElement("CapitaleSociale");
    $tNode = $dom->createTextNode($dat_['NumeroREA']);
    $CS->appendChild($tNode);
    $IREA->appendChild($CS);



    $CP->appendChild($IREA);
    $FEH->appendChild($CP);
    $FE->appendChild($FEH);

    $dom->appendChild($FE);
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