<?php

/**
 * General components.
 *
 * @package    cusasite
 * @subpackage General
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 */
class GeneralComponents extends ComponentsProject
{
  public function executeLeftBox()
  {
    $this->holders    = Doctrine::getTable('Holder')->count();
    $this->patients   = Doctrine::getTable('Patient')->count();
    
    $this->lastVisit = Doctrine::getTable('Visit')->findLast();
  }

  public function executeNews()
  {
    $this->news = Doctrine::getTable('News')->findNews();
  }
  
}
