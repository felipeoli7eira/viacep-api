<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/helpers.php';

// caso você queira ver o retorno da api no terminal, setar como "true"
$showReturnInTerminal = true;

// CEP de exemplo na documentação da API
$cepToConsult = '01001000';

if ( $showReturnInTerminal === true && array_key_exists(1, $argv) ) {

    $cepToConsult = $argv[ 1 ];
}

$cep = App\CEP::consult($cepToConsult);

if ($showReturnInTerminal === true) {

    showInTerminal($cep);
}

showInWebPage($cep);