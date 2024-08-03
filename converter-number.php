<?php

class Conversor {

    public function converterRomano($numero){
        $romano = '';

        $simbolos = ['M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I'];
        $valores = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];

        for($i = 0; $i < count($simbolos); $i++){

            while($numero >= $valores[$i]){

                $romano = $romano . $simbolos[$i];
                $numero = $numero - $valores[$i];

            }

        }

        return "<h3>Em Romano: ". $romano . "</h3>";
        
    }

    public function converterArabico($romano) {
        $simbolos = "MDCLXVI";
        $valores = [1000, 500, 100, 50, 10, 5, 1];

        // chama a função para remover caracteres incorretos
        $romano = $this->removerCaracteresIncorretos($romano, $simbolos);

        $tam = strlen($romano);
        $arabico = 0;

        // Conversão de romano para arábico
        for ($i = 0; $i < $tam - 1; $i++) {
            $anterior = $valores[strpos($simbolos, strtoupper($romano[$i]))];
            $atual = $valores[strpos($simbolos, strtoupper($romano[$i + 1]))];

            if ($anterior < $atual) {
                $arabico = $arabico - $anterior;
            } else {
                $arabico = $arabico + $anterior;
            }
        }

        $arabico = $arabico + $valores[strpos($simbolos, strtoupper($romano[$tam-1]))];

        /**
         * Verificação para impedir numeros Romanos digitados da forma incorreta.
         * Por exemplo:
         * 
         * {
         *    XXXX --> XL = 40
         *    VX --> V = 5
         *    IL --> XLIX = 49
         *    IVX --> VI = 6 
         * }
         * 
        */

        $romano2 = $this->converterRomano($arabico);

        if($romano != $romano2){
            return ('<h3>Em Arábico = ' . $arabico. '</hx3>');
        } else {

            return $romano . " = " . $arabico;

        }

    }

    // Função para a remoção de caracteres especiais de converterArabico()

    public function removerCaracteresIncorretos($romano, $simbolos) {
        $tam = strlen($romano);
        $i = 0;

        while ($i < $tam) {
            if (strpos($simbolos, strtoupper($romano[$i])) === false) {
                $romano = substr($romano, 0, $i) . substr($romano, $i + 1);
                $tam--;
            } else {
                $i++; 
            }
        }

        return $romano;
    }

}


?>