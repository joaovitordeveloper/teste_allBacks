<?php

namespace App\Controller\Pages;

use \App\Utils\View;


/**
 * metodo responsvel por retornar o conteudo do site
 * @return string
 */
class Page{
  
    /**
   * metodo responsvel por renderizr o Header
   * @return string
   */
    private static function getHeader()
    {
      return View::render('pages/header',[
        'nome'=>'All Blacks - Teste João Vitor'
      ]);
    }
  
    /**
   * metodo responsvel por renderizr o footer
   * @return string
   */
    private static function getFooter()
    {
      return View::render('pages/footer');
    }

       /**
   * metodo responsvel por renderizr o xml
   * @return string
   */
  public static function getXml()
  {
    return View::render('pages/xml');
  }

     /**
   * metodo responsvel por renderizr o xml
   * @return string
   */
       /**
   * metodo responsvel por renderizr o Table
   * @return string
   */
  public static function getTable()
  {
    return View::render('pages/table',[]);
  }
  /**
 * metodo responsvel por renderizr o conteudo XML
 * @return string
 */
   public static function getPage($titulo, $content){

    return View::render('pages/page', [
      'titulo'=>$titulo,
      'header'=>self::getHeader(),
      'footer'=>self::getFooter(),
      'xml'=>self::getXml(),
      'table'=>self::getTable(),
      'content' => $content
    ]);

   }
}