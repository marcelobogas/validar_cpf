<?php

use App\validation\CPF;

require __DIR__ . '/vendor/autoload.php';

$resultado = CPF::validar('000.000.000-00');

var_dump($resultado);
