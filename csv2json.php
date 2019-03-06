<?php
/**
* Autor: Josué Barros da Silva
* Website: joshuawebdev.wordpress.com
* Email: josue.barros1986@gmail.com
* Versão 1.1
*
* Inicialmente o programa lê duas string no formato csv
* A primeira é a linha que contém os atributos de uma tabela
* A segunda contém os dados de cada registro da tabela
* Ambas as strings são transformadas em arrays e seus elementos
* irão gerar os atributos e valores do arquivo json
*/

// inicia a string abrindo um array no formato json
$json = "[";

$head_csv = "CODIGO;MATRICULA;DTINICIO;ALUNO;ANACIONAL;ANATUAL;SEXO;REGISTRO;LIVRO;FOLHA;DTREGISTRO;CARTORIO;PROCEDENCIA;NASCIMENTO;NAUF;AUTORIZA;BOLSA;AENDERECO;ABAIRRO;ACIDADE;AUF;ACEP;ALOCAL;ORELIGIAO;RELIGIAO;ATELEFONE;OBSPREF;CODSIT;DATASIT;PAI;PNACIONAL;PNATURAL;PPROFISSAO;PFONE;PENDTRABALHO;MAE;MPROFISSAO;MNATURAL;MNACIONAL;MFONE;MENDTRABALHO;PRENDA;MRENDA;RESPONSAVEL;RPROFISSAO;RNATURAL;RNACIONAL;RENDERECO;RRENDA;RFONE;ASMA;BRONQUITE;DIABETES;EPLEPSIA;HIPERTENSAO;REUMATISMO;OUTDOENCA;DFISICA;DAUDITIVA;DVISUAL;DFALA;OUTDEFICIENCIA;CATAPORA;CAXUMBA;COQUELUCHE;ESCARLATINA;RUBEOLA;SARAMPO;OUTCONTAGIOSA;PLANODESAUDE;EMCASODEFEBRE;ALERGIAS;REALIZANDOTRATAMENTO;ENOME;EFONE;EMEDICO;EMEDFONE;EHOSPITAL;EHOSFONE;BCGORAL;BCGINTRA;ANTITIFO;TRIPLICE;OUTVACINA;SABIM;AVARIOLA;ASARAMPO;FILENAME;RRG;RCPF;REMAIL;ARG;ARGEMISS;ALIAS;ACPF;ACOMPLETO;ANUM";

$data_csv = "1;13;13.12.2011;SARAH DE SOUSA SOARES CARDOSO;BRASILEIRA;NATAL;F;130868;404;224;18.09.2006;4o OF;;16.09.2006;RN;NILDE;40;RUA MANOEL LELE 10 PONTA NEGRA;QUINTAS;NATAL;RN;59082440;U;N;;;;0;30.12.1899;VACIO DOUGLAS SOARES CARDOSO;BRASILEIRA;;VENDEDORA;999686425;TEL.8847 8920;LUANA BARBOSA DE SOUSA;;;BRASILEIRA;999312554;;0;0;VACIO DOUGLAS SOARES CARDOSO;;NATAL;BRASILEIRA;RUA FRANCISCO ALVES, 158;0;99686425;N;N;N;N;N;N;;N;N;N;N;;N;N;N;N;N;S;;;;;;RITA;32587;MANOEL;32074321;SAO LUCAS;32074321;S;S;S;S;;S;S;S;;1108628;80723454434;;0;;;   .   .   -;;3;296;07.12.2012;LEVI LIMA CAMPOS;BRASILEIRO;MACAPA;M;0;;0;30.12.1899;;;27.12.2010;RN;RAMON;100;RUA COEMA? 1053;QUINTAS;NATAL;RN;59035065;U;S;EVANGELICOS;87364291;;1;05.06.2014;RAMON SALES CAMPOS;BRASILEIRO;MACAPA;EMPRESARIO;36531063;RUA COEMA? 1045 QUINTAS;STEPHANE VAZ DE LIMA CAMPOS;UNIVERSITARIA;BELEM;BRASILEIRA;87716464;;0;0;RAMON SALES CAMPOS;EMPRESARIO;MACAPA;BRASILEIRO;RUA COEMA? 1045 QUINTAS;0;87364291;N;N;N;N;N;N;;N;N;N;N;;N;N;N;N;N;N;;HAP VIDA;PARACETAMOL;;;RAMON SALES CAM;87364291;;;ANTONIO PRUDENT;;S;S;S;S;;S;S;S;;191889;87050315249;ramon.s.c@hotmail.com;;;LEVI;;;6;1;05.11.2011;PAULO GABRIEL DA SILVA NEVES;BRASILEIRA;NATAL;M;131146;A 405;202;09.10.2006;4o OF;EXPANSIVO;08.10.2006;RN;STEPHANE;50;RUA ASSIS BRASIL 261 A;QUINTAS;NATAL;RN;59070340;U;S;CATOLICA;88263199/;87575140;0;30.12.1899;PAULO EDUARO DAS CHAGAS NEVES;BRASILEIRA;NATAL;POLICIAL MILITAR;87575140;;VALQUIRIA MARIA DA CONCEI?AO DA SILVA;DO LAR;NATAL;BRASILEIRA;88263188;;0;0;VALQUIRIA MARIA DA CONCEI?AO DA SILVA;DO LAR;NATAL;BRASILEIRA;;0;88263188/987;N;N;N;N;N;N;;N;N;N;N;;N;N;N;N;N;N;;;;;;;;;;;;N;N;N;N;;N;N;N;;1385394;4651801404;;0;;GABRIEL;   .   .   -;;8;2;22.11.2011;KLEBERSON FERREIRA DA SILVA;BRASILEIRA;NATAL;M;260336;A-436;173;22.08.2002;5o OF;CENTRO EDUC DISNEY;10.08.2002;RN;;30;RUA PERCEVAL CALDAS 566 A;BOM PASTOR;NATAL;RN;59042050;U;S;;91555346;;0;30.12.1899;KERGINALDO FERREIRA DA SILVA;BRASILEIRA;NATAL;ENTREGADOR;988843585;;JACILIANE ALVES DA SILVA;MERENDEIRA;NATAL;BRASILEIRA;;;0;0;JACILIANE ALVES DA SILVA;;NATAL;BRASILEIRA;;0;9155 5346;N;N;N;N;N;N;;N;N;N;N;;N;N;N;N;N;N;;;;;;;;;;;;N;N;N;N;;N;N;N;;1925127;1126384496;;0;;KLEBERSON;   .   .   -;;9;3;24.11.2011;AMARILES MARIA DE OLIVEIRA;BRASILEIRA;NATAL;F;291751;A-541;88;21.07.2008;5? OF;;15.07.2008;RN;;30;RUA PEDRO NOVOA 225 QUINTAS;QUINTAS;NATAL;RN;59035320;U;S;;87279908;98681300;0;30.12.1899;JANILSON DE DEUS OLIVEIRA;BRASILEIRA;NATAL;COMERCIANTE;98681300;;MARICELIA COSTA DE OLIVEIRA;COMERCIANTE;GUARABIRA;BRASILEIRA;36533231;;0;0;JANILSON DE DEUS OLIVEIRA;COMERCIANTE;NATAL;BRASILEIRA;;0;98681300;N;N;N;N;N;N;;N;N;N;N;;N;N;N;N;N;N;;HAPVIDA;PARACETAMOL;;;MARICELIA;98681300;;;;;S;S;S;S;;S;S;S;;1833156;5017981454;;0;;AMARILES;   .   .   -;;";

// cria um array contendo o cabeçalho do arquivo csv (head_csv)
$head_array = explode( ";", $head_csv );

// cria um array onde cada elemento é uma linha de data_csv
$data_array = explode( ";", $data_csv );

for ( $i = 0; $i < count( $data_array ); $i++ ) {

    $k = 0;

    $json .= "\n  {";

    for ( $j = 0; $j < count( $head_array ); $j++ ) {

        $json .= "\n    \"{$head_array[$j]}\" : \"{$data_array[$k]}\",";
        $k += 1;

    }

    $json .= "\n  },";

}

// Elimina a última vírgula depois da última chave
$json = preg_replace( "/,$/", "", $json );

$json .= "\n]\n";

echo $json;

?>