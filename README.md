# **CSV 2 JSON**
Programa em PHP que lê um arquivo no formato csv e converte-o para json

+ Linguagem: [PHP](https://www.php.net)
+ Versão 1.8

___
:bust_in_silhouette: Autor: Josué B. da Silva

:globe_with_meridians: Website: joshuawebdev.wordpress.com

:envelope: E-mail: josue.barros1986@gmail.com
___

## Descrição

Lê um arquivo no formato csv e converte-o para json.

É possível definir o tipo de separador (vígula, ponto e vígula, etc) por meio do método setSeparator().

É possível definir entre aspas simples ou duplas por meio do método setQuotes().

> Dentro do arquivo csv2json.php você pode ver um exemplo do uso dos métodos setSeparator() e setQuotes()

## Dependências

É necessário ter instalado em seu computador o [PHP](https://www.php.net) a partir da versão 5.6 (versão com suporte a execução pelo terminal) e o gerenciador de dependências [Composer](https://getcomposer.org/).

## Instalação

```
composer require joshuawebdev/csv2sql
```

## Execução

O programa roda por meio de um terminal (prompt de comando, no caso do Windows). Ele recebe dois parâmetros:

Exemplo de Execução:

Sintaxe de Uso

```
php csv2json.php [source.csv]
```

onde [source.csv] é o arquivo csv a ser convertido em json.

## Reutilizando em outras aplicações

Caso queira reutilizar a biblioteca em outra aplicação, primeiro instale a biblioteca por meio do comando:

```
composer require joshuawebdev/csv2sql
```

Em seguida importe a classe Csv2Json para o local onde deseja utilizar como no exemplo abaixo:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use JoshuaWebDev\Csv2Sql\Csv2Sql;

$csv2sql = new Csv2Sql;

```

Uma vez instanciado o objeto da classe Csv2Json é possível usar os métodos setSeparator(), setQuotes() e converter()

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use JoshuaWebDev\Csv2Sql\Csv2Sql;

$csv2sql = new Csv2Sql;

$csv2json->setSeparator(';');
$csv2json->setQuotes('"');

$json = $csv2json->convert($filename);

```