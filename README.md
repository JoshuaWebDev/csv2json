# **CSV 2 JSON**
Programa em PHP que lê um arquivo no formato csv e converte-o para json

+ Linguagem: [PHP](https://www.php.net)
+ Versão 1.4

___
:bust_in_silhouette: Autor: Josué B. da Silva

:globe_with_meridians: Website: joshuawebdev.wordpress.com

:envelope: E-mail: josue.barros1986@gmail.com
___

## Descrição

Lê um arquivo no formato csv ao qual consiste em uma tabela importada de um banco de dados qualquer.
A primeira linha contém os atributos da tabela.
A segunda em diante contém os dados de cada registro da tabela.
A primeira linha é dividida e transformada em um array onde seus elementos são os atributos da tabela.
As demais linhas do arquivo também são convertidas em arrays onde cada elemento do array é um dado da tabela

É possível definir o tipo de separador (vígula, ponto e vígula, etc) simplesmente alterando a constante SEPARATOR.
Caso o arquivo de origem possua aspas ao redor dos campos, altere a constante QUOTES para vazio ('').

Sintaxe de Uso

    php csv2json.php [source.csv]

onde [source.csv] é o arquivo csv a ser convertido em json.
