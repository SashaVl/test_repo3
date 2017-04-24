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
     *  обраховую загальний податок та суму сплати за "інвойси" для занесення даних в масив $array
     * аналогічний обрахунок виконується в методі: XmlCreator::GenXml($array)
     */
    $totalTax = 0; //загальний податок
    $totalSum = 0;
    foreach ($invoice['items'] as $val)
    {
        $Sum = $val['price']*$val['quantity'];
        $taxValue = 0;  //сума податку для однієї послуги
        if($val['tax'] !== 0){
            $taxValue = ($val['price']*($val['tax']/100)*$val['quantity']);
        }
        $totalTax += $taxValue;
        $totalSum += $Sum;
    }


    $array = array(
        'DenominazioneSeller'   =>  $invoice['values']['company_name'],      //Назва компанії продавця послуг
        'IndirizzoSeller'       =>  $invoice['values']['street_1']." ".$invoice['values']['street_2'], //Юридична адреса компанії продавца послуг
        'CAPSeller'             =>  $invoice['values']['zip'],               //Код почти компанії (Zip code) (юридична адреса продавця)
        'ComuneSeller'          =>  $invoice['values']['city'],              //автономна й незалежна одиниця адміністративно-територіального поділу Італії (юридична адреса продавця)
        'ProvinciaSeller'       =>  "",                                      //код провинції Італії наприклад: CB - CAMPOBASSO (юридична адреса продавця)
        'IdPaese'               =>  vars::ID_PAESE,                          //код країни (юридична адреса продавця)
        'NazioneSeller'         =>  vars::NAZIONE,                           //Нація - використовую скорочення код країни (юридична адреса продавця)
        'idCodice'              =>  vars::ID_CODICE,                         //Податковий кодекс (юридична адреса продавця)
        'progressivoInvio'      =>  vars::PROGRESSIVO_INVIO,                 //Тип документe
        'FormatoTrasmissione'   =>  vars::FORMATO_TRANSMISSIONE,             //принимает фиксированное значение
        'CodiceDestinatario'    =>  vars::CODICE_DESTINATARIO,               //код документа з 6 символів
        'RegimeFiscale'         =>  vars::REGIME_FISCALE,                    //Податковий режим
        'Ufficio'               =>  "",                                      //Код провінціїї Італії (стосується потреб рекламної компанії)
        'NumeroREA'             =>  "",                                      //номер за яким компанія зареєстрована в реєстрі компаній (стосується потреб рекламної компанії)
        'CapitaleSociale'       =>  "",                                      //Кількість капіталу компанії (стосується потреб рекламної компанії)
        'CodiceFiscale'         =>  vars::CODICE_FISCALE,                    //Податковий кодекс (використовується як додатковий елемент ідентифікації) (необовязкове поле)
        'SocioUnico'            =>  "SM",                                    //поле повинно містити «SU» значення, якщо компанія в особі однієї людини, или «SM» у випадку компанії з персоналом (стосується потреб рекламної компанії)
        'StatoLiquidazione'     =>  "LN",                                    //Поле повинно містити «LS» у випадку ліквідаціїї компанії, «LN» - у випадку не лівквідації компанії (стосується потреб рекламної компанії)
        'Telefono'              =>  $invoice['values']['phone'],             //Телефон компанії
        'Fax'                   =>  "",                                      //Факс компанії
        'Email'                 =>  $invoice['values']['email'],             //Email компанії
        'RiferimentoAmministrazione' => "",                                  //Посилання на попередній документ

        // інфрмація про покупця

        'DenominazioneBuyer'    =>  $invoice['customer']['name'],            //Ім'я покупця
        'IndirizzoBuyer'        =>  $invoice['customer']['street_1'],        //Адреса покупця
        'CAPBuyer'              =>  $invoice['customer']['zip_code'],        //Код почти покупця (Zip code)
        'ComuneBuyer'           =>  $invoice['customer']['city'],            //Місто проживання покупця
        'ProvinciaBuyer'        =>  "",                                      //код провинції покупця
        'NazioneBuyer'          =>  "",                                      //Нація - використовую скорочення код країни
        'TipoDocumento'         =>  "TD01",                                  //Тип документа (код)
        'Divisa'                =>  "EUR",                                   //Код валюти
        'Data'                  =>  $invoice['date_created'],                //Дата видачі у форматі: YYYY-MM-DD
        'Numero'                =>  $invoice['number'],                      //номер документу
        'ImportoTotaleDocumento'=>  $invoice['total'],                       //Сума з урахування податку
        'AliquotaIVA'           =>  number_format($invoice['values']['vat_percent'],2),
        //'Imposta'               =>  "",   //Вноситься автоматично в класі XmlCreator
        'RiferimentoNormativo'  =>  "Aliq. ".$invoice['values']['vat_percent']."% con scissione pagamenti", //Опис стрічки податку
        'CondizioniPagamento'   =>  "TP02",                                  // «TP01» в разі оплати в розстрочку, «TP02» в разі повної оплати у вигляді одноразової виплати,«TP03» в разі передоплати
        'ModalitaPagamento'     =>  "MP05",                                  //Використовується для вказівки режиму оплати (наприклад: банківський переказ MP05)
        'DataScadenzaPagamento' =>  $invoice['date_till'],                   //дата закінчення терміну дії оплати в форматі YYYY-MM-DD
        'ImportoPagamento'      =>  $totalSum,                               //Сума платежу без податку
        'IstitutoFinanziario'   =>  $invoice['values']['bank_name'],         //Ідентифікція банку-одержувача платежу
        'IBAN'                  =>  $invoice['values']['bank_id'],           //Номер банківського рахунку в формі абревіатури IBAN, міжнародний стандарт
        'DatiBeniServizi'       =>  $invoice['items'],                       //перебір всіх послуг що продаються операція відбувається в класі XmlCreator
        'CodiceTipo'            =>  "INTERNO",                               //Стандарт кодування продукту
        'CodiceValore'          =>  "(NOTA)",                                //дає можливість однозначно ідентифікуватипродукт в залежності від типу коду
        'DescrizioneTax'        =>  "Scissione dei pagamenti ai sensi dell'art. 17-ter del D.P.R. n. 633/1972", //Наименування податку
        'PrezzoUnitarioTax'     =>  "0",                                     //Поле повинно містити значення ціни за послуги (відноситься до податку тому ціна "0")
        'EsigibilitaIVA'        =>  "S",                                     //вказує режим сплати податку (відкладений або негайний) "I" - негайна сплата , "D" - податок з відстрочкою, "S" - для роздільних платежів
    );

    $dom = XmlCreator::GenXml($array);
    //echo $dom->saveXML();
    //var_dump($invoice);
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