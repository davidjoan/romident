<?php

/**
 * Diagnosis
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    romident
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Diagnosis extends BaseDiagnosis
{
  public function getFormattedDatetime($format = 'D')
  {
    return $this->getTable()->getDateTimeFormatter()->format($this->getCreatedAt() ,  $format);
  }
}