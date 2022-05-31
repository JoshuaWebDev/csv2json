<?php

/**
* Autor: Josué B. da Silva
* Website: joshuawebdev.wordpress.com
* Email: josue.barros1986@gmail.com
* Versão 1.7
*
* Lê um arquivo no formato csv ao qual consiste em uma tabela
* importada de um banco de dados qualquer
* A primeira linha contém os atributos da tabela
* A segunda em diante contém os dados de cada registro da tabela
* A primeira linha é dividida e transformada em um array
* onde seus elementos são os atributos da tabela
* As demais linhas do arquivo também são convertidas em arrays
* onde cada elemento do array é um dado da tabela
*
* É possível definir o tipo de separador (vígula, ponto e vígula, etc)
* simplesmente alterando a constante SEPARATOR
* Caso o arquivo de origem possua aspas ao redor dos campos, altere
* a constante QUOTES para vazio ('')
*/

define ('SEPARATOR', ','); // DEFINE O SEPARADOR QUE PODE SER VÍRGULA, PONTO E VÍRGULA OU OUTRO
define ('QUOTES', '"');    // DEFINE SE HAVERÁ ASPAS OU NÃO

// Verifica se o argumento foi informado corretamente
if ($argc < 2 || $argc > 2) {
    print( "Após invocar o nome do programa digite o nome do arquivo que será convertido!\n" );
    exit();
}

$filename = $argv[1];
$newfile  = substr($filename, 0, -4);

// Verifica se o arquivo existe
function handleFile( $filename ) {

    if ( !file_exists( $filename  ) ) {
        throw new Exception( "O arquivo {$filename} não existe ou encontra-se em outra pasta!" );
    }

    // retorna um número inteiro, o indicador do arquivo
    return file( $filename );

}

try {

    $csv_file_array = handleFile( $filename );

    $csv_head = explode( SEPARATOR, $csv_file_array[0] );

    // elimina quebra de linhas
    $csv_head = preg_replace( "/(\r\n|\n|\r)+/", "", $csv_head );

    // inicia a string abrindo um array no formato json
    $json = "[";

    for ( $i = 1; $i < count( $csv_file_array ); $i++ ) {

        // cria um id para cada registro
        $json .= "\n  {\n    \"id\": \"" . $i . "\",";

        // cria um array a partir da segunda linha em diante
        $rows = explode( SEPARATOR, $csv_file_array[$i] );

        // elimina quebra de linhas
        $rows = preg_replace( "/(\r\n|\n|\r)+/", "", $rows );

        for ( $j = 0; $j < count( $rows ); $j++ ) {

            $json .= "\n    " . QUOTES . $csv_head[$j] . QUOTES . ": " . QUOTES . $rows[$j] . QUOTES;

            if ($j < count($rows) - 1) {
                $json .= ",";
            }
        }

        $json .= "\n  },";

    }

    // elimina a última vírgula após a última chave
    $json = preg_replace( "/,$/", "", $json );

    $json .= "\n]\n";

    $newfile .= '.json';
    file_put_contents($newfile, $json);
    echo "O arquivo " . $newfile . " foi criado com sucesso!";

} catch ( Exception $e ) {
    echo "Aviso: ", $e->getMessage(), "\n";
}

?>