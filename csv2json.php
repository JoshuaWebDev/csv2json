<?php

/**
* Autor: Josué B. da Silva
* Website: joshuawebdev.wordpress.com
* Email: josue.barros1986@gmail.com
* Versão 1.6
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
* É possível salvar o conteúdo em outro arquivo por meio do
* comando php csv2json.php > [nome_arquivo.json]
* substituindo o argumento após ">" pelo nome no do arquivo
* sem os colchetes []
*/

// Verifica se o argumento foi informado corretamente
if ($argc < 2 || $argc > 2) {
    print( "Após invocar o nome do programa digite o nome do arquivo que será convertido!\n" );
    exit();
}

$filename = $argv[1];

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

    $csv_head = explode( ";", $csv_file_array[0] );

    // elimina quebra de linhas
    $csv_head = preg_replace( "/(\r\n|\n|\r)+/", "", $csv_head );

    // inicia a string abrindo um array no formato json
    $json = "[";

    for ( $i = 1; $i < count( $csv_file_array ); $i++ ) {

        $json .= "\n  {";

        // cria um array a partir da segunda linha em diante
        $rows = explode( ";", $csv_file_array[$i] );

        // elimina quebra de linhas
        $rows = preg_replace( "/(\r\n|\n|\r)+/", "", $rows );

        for ( $j = 0; $j < count( $rows ); $j++ ) {

            $json .= "\n    {$csv_head[$j]} : {$rows[$j]},";

        }

        $json .= "\n  },";

    }

    // elimina a última vírgula após a última chave
    $json = preg_replace( "/,$/", "", $json );

    $json .= "\n]\n";

    echo $json;

} catch ( Exception $e ) {
    echo "Aviso: ", $e->getMessage(), "\n";
}

?>
