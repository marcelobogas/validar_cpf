<?php

use App\validation\CPF;

require __DIR__ . '/vendor/autoload.php';

$resultado = CPF::validar('283.585.488-69');

var_dump($resultado);