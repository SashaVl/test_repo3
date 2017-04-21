<?php

echo 'This is ItalyEExport module for external handler for exporting Invoices' . "\n\n";

// Define STDIN
defined('STDIN') OR define('STDIN', fopen('php://stdin', 'r'));

// Get all data. Its is in JSON so we must decode it
$data = fgets(STDIN);

// Decode JSON
$data = json_decode($data, true);
$export_id = $data['export_id'];
$invoices = $data['invoices'];
// Use var_dump($invoices) to see full data
include 'include/classes/FatturaElettronicaClass.php';
$file = __DIR__ . '/assets/fattura_custom_body.xml';
$fattura = new FatturaElettronicaClass($file);

###
### You can update amount ready invoices using internal script
###
// 1. Get path to PHP
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $pathToPHP = 'C:\Winginx\php54\php.exe';
} elseif (PHP_OS === 'Darwin') {
    // for macos
    $pathToPHP = '/usr/local/bin/php';
} else {
    $pathToPHP = '/usr/bin/php';
}
// 2. Get path to script
$pathToScript = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
    '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'script' . DIRECTORY_SEPARATOR . 'tools';
// 3. Create base command
$baseCommand = $pathToPHP . ' ' . $pathToScript . ' update-export-progress --type="invoice" --id="' . $export_id . '" --amount_ready=';
// 4. To update amount concat amount ready invoices to `$baseCommand` and execute it

// Sample code how you can use external handler
echo 'Invoices list:' . "\n";
var_dump($invoices);
var_dump($baseCommand);
var_dump($fattura);

foreach ($invoices as $i => $invoice) {
// TODO Place invoice data to xml document
    echo 'Invoice #' . $invoice['id'] . ' belongs to customer "' . $invoice['customer']['login'] . '" and have status "' . $invoice['status'] . '"' . "\n";

    usleep(250000);

    // Update amount ready invoices
    $command = $baseCommand . ($i + 1);
    exec($command);
}

// TODO compress all xml files and show download link
// use zip for compress all invoices in one file
$zip = new ZipArchive();
// If you need you can change extension of result file.
$extension = 'zip';
$command = $pathToPHP . ' ' . $pathToScript . ' change-export-file-extension --type="invoice" --id="' . $export_id . '" --extension="' . $extension . '"';
exec($command);

echo "\n\n";
echo 'Create copy of directory `' . realpath(dirname(__FILE__)) . ' to create your export module' . "\n";
echo 'Main PHP file must be named `run.php`' . "\n";
echo 'Feel free to use any external libraries' . "\n";
