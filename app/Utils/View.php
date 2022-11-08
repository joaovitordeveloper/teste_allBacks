<?php

namespace App\Utils;

class View{

       /**
     * Metodo responsavel por retornar o conteudo da view
     * @param string $view
     * @return string
     */
    private static function getContentView($view){
        $file = __DIR__ . '/../../resources/view/'.$view.'.html';

        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Metodo responsavel por retornar o conteudo renderizado da view
     * @param string $view
     * @param array $vars (string/numeric)
     * @return string
     */
    public static function render($view, $var = []){
        //conteudo da view
        $contentView = self::getContentView($view);

        //chaves do array de variaveis
        $key = array_keys($var);
        $key = array_map(function($item){
            return '{{' .$item . '}}';
        }, $key);

        //retorna o conteudo renderizado
        //chave, valor, view
        return str_replace($key,array_values($var), $contentView);

    }
}