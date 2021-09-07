<?php

namespace App\validation;

class CPF {

        
    /**
     * Método responsável por verificar se um CPF é válido
     *
     * @param string $cpf 
     *
     * @return boolean
     */
    public static function validar($cpf) {
        /* obtém somente os números */
        $cpf = preg_replace('/\D/', '', $cpf);

        /* verifica a qtde de caracteres */
        if (strlen($cpf) != 11) {
            return false;
        }

        /* cálculo do dígito verificador (expressão base para o cálculo) */
        $cpfValidacao = substr($cpf, 0, 9);

        /* verifica o primeiro dígito (posicão 10) */
        $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao);
        /* verifica o segundo dígito (posicão 11) */
        $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao);

        return $cpfValidacao == $cpf;
    }
    
    /**
     * Método responsável por cálcular um dígito verificador com base em umna sequencia numérica
     *
     * @param string $base
     *
     * @return string
     */
    public static function calcularDigitoVerificador($base) {
        /* auxiliares */
        $tamanho = strlen($base);
        $multiplicador = $tamanho + 1;

        /* soma */
        $soma = 0;

        /* itera os números do CPF */
        for ($i = 0; $i < $tamanho; $i++) {
            $soma += $base[$i] * $multiplicador;
            $multiplicador--;
        }

        /* resto da divisão */
        $resto = $soma % 11;

        /* retorna o dígito verificador */
        return $resto > 1 ? 11 - $resto : 0;
    }

}