# **CSV 2 JSON**
Programa em PHP que lê um arquivo no formato csv e converte-o para json

___
:bust_in_silhouette: Autor: Josué B. da Silva

:globe_with_meridians: Website: joshuawebdev.wordpress.com

:envelope: E-mail: josue.barros1986@gmail.com


## Descrição

Lê um arquivo no formato csv ao qual consiste em uma tabela importada de um banco de dados qualquer.
A primeira linha contém os atributos da tabela.
A segunda em diante contém os dados de cada registro da tabela.
A primeira linha é dividida e transformada em um array onde seus elementos são os atributos da tabela.
As demais linhas do arquivo também são convertidas em arrays onde cada elemento do array é um dado da tabela

É possível salvar o conteúdo em outro arquivo por meio do comando

    php csv2json.php [data.csv] > [nome_arquivo.json]

onde [data.csv] é o arquivo csv a ser convertido em json e [nome_arquivo.json] é o nome do arquivo a ser criado com o conteúdo de [data.csv] no formato json.
