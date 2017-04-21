<?php

echo 'This is sample module for external handler for exporting Requests' . "\n\n";

// Define STDIN
defined('STDIN') OR define('STDIN', fopen('php://stdin', 'r'));

// Get all data. Its is in JSON so we must decode it
$data = fgets(STDIN);

// Decode JSON
$data = json_decode($data, true);
$export_id = $data['export_id'];
$requests = $data['requests'];
// Use var_dump($requests) to see full data

###
### You can update amount ready requests using internal script
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
$baseCommand = $pathToPHP . ' ' . $pathToScript . ' update-export-progress --type="request" --id="' . $export_id . '" --amount_ready=';
// 4. To update amount concat amount ready requests to `$baseCommand` and execute it

// Sample code how you can use external handler
echo 'Requests list:' . "\n";
foreach ($requests as $i => $request) {

    echo 'Request #' . $request['id'] . ' belongs to customer "' . $request['customer']['login'] . '" and have status "' . $request['status'] . '"' . "\n";

    usleep(250000);

    // Update amount ready requests
    $command = $baseCommand . ($i + 1);
    exec($command);
}

// If you need you can change extension of result file.
// In our example we just set 'txt'
$extension = 'txt';
$command = $pathToPHP . ' ' . $pathToScript . ' change-export-file-extension --type="request" --id="' . $export_id . '" --extension="' . $extension . '"';
exec($command);

echo "\n\n";
echo 'Create copy of directory `' . realpath(dirname(__FILE__)) . '` to create your export module' . "\n";
echo 'Main PHP file must be named `run.php`' . "\n";
echo 'Feel free to use any external libraries' . "\n";
