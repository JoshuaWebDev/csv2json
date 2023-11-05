<?php

namespace JoshuaWebDev\Csv2Json;

use Exception;

/**
 * @author Josué Barros da Silva
 * Website: joshuawebdev.wordpress.com
 * GitHub: https://github.com/JoshuaWebDev
 * Email: josue.barros1986@gmail.com
 * @version 1.8.1
 */

/**
 * This is a summary
 * 
 * This is a description
 * 
 * This is a series of tags
 * 
 */
class Csv2Json
{
    private $fileName     = null;   // nome do arquivo csv
    private $separator    = ",";    // utilizado para separar as colunas no arquivo csv (padrão = ",")
    private $quotes       = '\"';   // define se haverá aspas ou não
    private $csvFileArray = null;   // array contendo cada uma das linhas do arquivo csv

    /**
     * @param  string
     * @return array
     */
    private function handleFile($filename): array
    {
        if (is_null($filename)) {
            throw new Exception("O nome do arquivo está nulo (NULL)");
        }

        if (!file_exists($filename)) {
            throw new Exception("O arquivo {$filename} não existe ou encontra-se em outra pasta!");
        }

        // retorna os dados do arquivo em formato de
        // array, onde cada elemento do array corresponde
        // a uma linha do arquivo
        return file($filename);
    }

    /**
     * @param  string
     * @return void
     */
    public function setSeparator($separator): void
    {
        $this->separator = $separator;
    }

    /**
     * @return string
     */
    public function getSeparator(): string
    {
        return $this->separator;
    }

    /**
     * @param  string
     * @return void
     */
    public function setQuotes($quotes): void
    {
        $this->quotes = $quotes;
    }

    /**
     * @param  string
     * @return string|Exception
     */
    public function convert($filename): string
    {
        try {
            $csv_file_array = $this->handleFile($filename);

            $csv_head = explode($this->separator, $csv_file_array[0]);

            // elimina quebra de linhas
            $csv_head = preg_replace("/(\r\n|\n|\r)+/", "", $csv_head);

            // inicia a string abrindo um array no formato json
            $json = "[";

            for ($i = 1; $i < count($csv_file_array); $i++) {

                // cria um id para cada registro
                $json .= "\n  {\n    \"id\": \"" . $i . "\",";

                // cria um array a partir da segunda linha em diante
                $rows = explode($this->separator, $csv_file_array[$i]);

                // elimina quebra de linhas
                $rows = preg_replace("/(\r\n|\n|\r)+/", "", $rows);

                for ($j = 0; $j < count($rows); $j++) {

                    $json .= "\n    " . $this->quotes . $csv_head[$j] . $this->quotes . ": " . $this->quotes . $rows[$j] . $this->quotes;

                    if ($j < count($rows) - 1) {
                        $json .= ",";
                    }
                }

                $json .= "\n  },";
            }

            // elimina a última vírgula após a última chave
            $json = preg_replace("/,$/", "", $json);

            $json .= "\n]\n";

            return $json .= '.json';
        } catch (Exception $e) {
            return "Error: " . $e->getMessage() . "\n";
        }
    }
}
