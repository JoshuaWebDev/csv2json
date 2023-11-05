<?php

// require __DIR__ . '/vendor/autoload.php';

use JoshuaWebDev\Csv2Json\Csv2Json;

$csv2json = new Csv2Json;

// Verifica se o argumento foi informado corretamente
if ($argc < 2 || $argc > 2) {
    print( "Após invocar o nome do programa digite o nome do arquivo que será convertido!\n" );
    exit();
}

$filename = $argv[1];
$newfile  = substr($filename, 0, -4);

$csv2json->setSeparator(';');
$csv2json->setQuotes('"');

$json = $csv2json->convert($filename);

$newfile .= '.json';

if (file_put_contents($newfile, $json)) {
    echo "O arquivo " . $filename . " foi convertido para " . $newfile;
} else {
    echo "Ocorreu algum erro durante a conversão";
}

?>
