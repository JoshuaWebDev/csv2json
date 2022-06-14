<?php

require __DIR__ . '/vendor/autoload.php';

use JoshuaWebDev\Csv2Json\Csv2Json;

$csv2json = new Csv2Json;

define ('SEPARATOR', ','); // DEFINE O SEPARADOR QUE PODE SER VÍRGULA, PONTO E VÍRGULA OU OUTRO
define ('QUOTES', '"');    // DEFINE SE HAVERÁ ASPAS OU NÃO

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

file_put_contents($newfile, $json);

// // Verifica se o arquivo existe
// function handleFile( $filename ) {

//     if ( !file_exists( $filename  ) ) {
//         throw new Exception( "O arquivo {$filename} não existe ou encontra-se em outra pasta!" );
//     }

//     // retorna um número inteiro, o indicador do arquivo
//     return file( $filename );

// }

// try {

//     $csv_file_array = handleFile( $filename );

//     $csv_head = explode( SEPARATOR, $csv_file_array[0] );

//     // elimina quebra de linhas
//     $csv_head = preg_replace( "/(\r\n|\n|\r)+/", "", $csv_head );

//     // inicia a string abrindo um array no formato json
//     $json = "[";

//     for ( $i = 1; $i < count( $csv_file_array ); $i++ ) {

//         // cria um id para cada registro
//         $json .= "\n  {\n    \"id\": \"" . $i . "\",";

//         // cria um array a partir da segunda linha em diante
//         $rows = explode( SEPARATOR, $csv_file_array[$i] );

//         // elimina quebra de linhas
//         $rows = preg_replace( "/(\r\n|\n|\r)+/", "", $rows );

//         for ( $j = 0; $j < count( $rows ); $j++ ) {

//             $json .= "\n    " . QUOTES . $csv_head[$j] . QUOTES . ": " . QUOTES . $rows[$j] . QUOTES;

//             if ($j < count($rows) - 1) {
//                 $json .= ",";
//             }
//         }

//         $json .= "\n  },";

//     }

//     // elimina a última vírgula após a última chave
//     $json = preg_replace( "/,$/", "", $json );

//     $json .= "\n]\n";

//     $newfile .= '.json';
//     file_put_contents($newfile, $json);
//     echo "O arquivo " . $newfile . " foi criado com sucesso!";

// } catch ( Exception $e ) {
//     echo "Aviso: ", $e->getMessage(), "\n";
// }

?>