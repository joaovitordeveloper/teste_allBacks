<?php

namespace App\Utils;

class Str{
    
    static function removeMascaras($dados)
{
        $dados = str_replace('.', '', $dados);
        $dados = str_replace('/', '', $dados);
        $dados = str_replace('-', '', $dados);
        $dados = str_replace('(', '', $dados);
        $dados = str_replace(')', '', $dados);
        $dados = str_replace('R$', '', $dados);
        $dados = str_replace(' ', '', $dados);

        return $dados;
}

}