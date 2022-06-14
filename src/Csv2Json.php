<?php

namespace JoshuaWebDev\Csv2Json;

/**
* @author Josué Barros da Silva
* Website: joshuawebdev.wordpress.com
* GitHub: https://github.com/JoshuaWebDev
* Email: josue.barros1986@gmail.com
* @version 1.8
*
* Lê um arquivo no formato csv ao qual consiste em uma tabela importada de um banco de dados qualquer
* pode, inclusive, ser oriunda de uma tabela em planilha (xls, xlsx)
* A primeira linha contém os atributos da tabela
* A segunda em diante contém os dados de cada registro da tabela
* A primeira linha é dividida e transformada em um array onde seus elementos são os atributos da tabela
* As demais linhas do arquivo também são convertidas em arrays onde cada elemento do array é um dado da tabela
*
* É possível definir o tipo de separador (vígula, ponto e vígula, etc)
* simplesmente alterando a constante SEPARATOR
* Caso o arquivo de origem possua aspas ao redor dos campos, altere
* a constante QUOTES para vazio ('')
*/

class Csv2Json
{
    private $fileName = null;         // nome do arquivo csv
    private $separator = ",";         // utilizado para separar as colunas no arquivo csv (padrão = ",")
    private $quotes = '\"';           // define se haverá aspas ou não
    private $csvFileArray = null;     // array contendo cada uma das linhas do arquivo csv

    /**
     * @return int
     */
    private function handleFile( $filename )
    {
        if (  is_null( $filename ) ) {
            throw new Exception( "O nome do arquivo está nulo (NULL)" );
        }

        if ( !file_exists( $filename  ) ) {
            throw new Exception( "O arquivo {$filename} não existe ou encontra-se em outra pasta!" );
        }
    
        // retorna um número inteiro, o indicador do arquivo
        return file( $filename );
    }

    public function setSeparator( $separator )
    {
        $this->separator = $separator;
    }

    public function setQuotes( $quotes )
    {
        $this->quotes = $quotes;
    }

    /**
     * @return void
     */
    public function convert( $filename )
    {
        try {

            $csv_file_array = $this->handleFile( $filename );
        
            $csv_head = explode( $this->separator, $csv_file_array[0] );
        
            // elimina quebra de linhas
            $csv_head = preg_replace( "/(\r\n|\n|\r)+/", "", $csv_head );
        
            // inicia a string abrindo um array no formato json
            $json = "[";
        
            for ( $i = 1; $i < count( $csv_file_array ); $i++ ) {
        
                // cria um id para cada registro
                $json .= "\n  {\n    \"id\": \"" . $i . "\",";
        
                // cria um array a partir da segunda linha em diante
                $rows = explode( $this->separator, $csv_file_array[$i] );
        
                // elimina quebra de linhas
                $rows = preg_replace( "/(\r\n|\n|\r)+/", "", $rows );
        
                for ( $j = 0; $j < count( $rows ); $j++ ) {
        
                    $json .= "\n    " . $this->quotes . $csv_head[$j] . $this->quotes . ": " . $this->quotes . $rows[$j] . $this->quotes;
        
                    if ($j < count($rows) - 1) {
                        $json .= ",";
                    }
                }
        
                $json .= "\n  },";
        
            }
        
            // elimina a última vírgula após a última chave
            $json = preg_replace( "/,$/", "", $json );
        
            $json .= "\n]\n";
        
            return $json .= '.json';
        
        } catch ( Exception $e ) {
            return "Error: " . $e->getMessage() . "\n";
        }
    }
}