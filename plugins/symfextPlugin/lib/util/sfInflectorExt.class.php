<?php

/**
 * sfInflectorExt
 *
 * @package    symfext
 * @subpackage util
 * @author     Jonathan Olger Nieto Lajo <jonathan_nieto@hotmail.com>
 */
class sfInflectorExt extends Doctrine_Inflector
{
  /**
   * @see Doctrine_Inflector
   */
  public static function urlize($text)
  {
    return str_replace('-', '_', parent::urlize($text));
  }
  
  /**
   * Returns an underscore-syntaxed version but uppercase of a string.
   *
   * @param  string $word  String to constantize.
   *
   * @return string Constantized string.
   */
  public static function constantize($word)
  {
    return strtoupper(sfInflector::underscore($word));
  }
}
