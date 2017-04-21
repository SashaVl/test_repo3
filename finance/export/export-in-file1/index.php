<?php

$file = __DIR__ . '/assets/fattura_singola_linea.xml';
// $file = __DIR__ . '/assets/fattura_multipla.xml';


$includePath = __DIR__ . '/include/exceptions/';
autoIncludeFiles($includePath);
$includePath = __DIR__ . '/include/baseclasses/';
autoIncludeFiles($includePath);

$includePath = __DIR__ . '/include/classes/header';
autoIncludeFiles($includePath);

$includePath = __DIR__ . '/include/classes/body';
autoIncludeFiles($includePath);

$includePath = __DIR__ . '/include/classes';
autoIncludeFiles($includePath);


$fatturra = new FatturaElettronicaClass($file);
var_dump($fatturra->getHeader());

function autoIncludeFiles($includePath, $createClass = false)
{
    if (substr($includePath, -1) != DIRECTORY_SEPARATOR) {
        $includePath .= DIRECTORY_SEPARATOR;
    }
    $directories = glob($includePath . '*');
    foreach ($directories as $fileToImport) {
        if (!is_file($fileToImport)) {
            continue;
        }
        include_once $fileToImport;

        if ($createClass) {
            $classFile = pathinfo($fileToImport);
            $className = $classFile['filename'];
            if (class_exists($className)) {
                new $className();
            }
        }
    }

    return true;
}





