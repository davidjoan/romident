<?php

/**
 * Appointment actions.
 *
 * @package    romident
 * @subpackage Appointment
 * @author     David Joan Tataje Mendoza <dtataje@datasolutions.pe>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AppointmentActions extends ActionsCrud
{
  public function executeLoadPatients(sfWebRequest $request)
  {
    $patients = Doctrine::getTable('Patient')->findByNameLike($request->getParameter('term'), $request->getParameter('limit'));
    $patients = $patients->toCustomArray(array('id' => 'getId', 'title' => 'getFullName'));
    return $this->renderJson($patients);
  }	
  
  public function executeCitas(sfWebRequest $request)
  {
  	$datos = Doctrine::getTable('Appointment')->findAll();
  	$result = array();
  	
  	foreach($datos as $key => $dato)
  	{
  		$result[$key] = array
  		                (
  		                  'id' => $dato->getId(),
  		                  'title' => $dato->getFormattedDateOfQuote('HH:mm').' | '.$dato->getTitle().' | '.$dato->getStatusStr(),
  		                  'start' => $dato->getFormattedDateOfQuote('yyyy-MM-dd HH:mm:ss'),
  		                  'url' => sfContext::getInstance()->getRouting()->generate('appointment_edit', array('slug' => $dato->getSlug())),
  		                  'color' => ($dato->getActive() == 1 )?'#7D58EE':'#C31434'
  		                  
  		     );
  	}
  	return $this->renderJson($result);
  }
}
