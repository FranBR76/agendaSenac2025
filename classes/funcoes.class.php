<?php

class Funcoes {
    public function dtNasc($vlr, $tipo) {
        switch ($tipo) {
            case 1:
                $rst = implode("-", array_reverse(explode("/",  $vlr))); // converte data brasil p/ internacional
                break;
            case 2:
                $rst = implode("/", array_reverse(explode("-", $vlr)));
                // faz o inverso
                break;

        }
        return $rst;
    }

    

    //novas funcoes 
}

?>