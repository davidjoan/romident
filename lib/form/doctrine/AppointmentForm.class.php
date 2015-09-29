<?php

/**
 * Appointment form.
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AppointmentForm extends BaseAppointmentForm
{
  public function initialize()
  {
    $this->labels = array
    (        
      'patient_id'  => 'Paciente',
      'title'       => 'Titulo',
      'descriptions' => 'Descripci&oacute;n',
      'date_of_quote'  => 'Fecha de la Cita',
      'active'      => 'Estado',   

    );
  }
  public function configure()
  {

    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'patient_id'           => new sfWidgetFormJQueryCompleter(array
                                (
                                  'url'             => $this->genUrl('@appointment_load_patients'),
                                  'value_callback'  => array($this, 'getFullName'),
                                  'config'          => sprintf('{ max: "20" }')
                                ), array('size' => 50)),     
      'title'                => new sfWidgetFormInputText(array(), array('size' => 30)),
      'descriptions'            => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),
      'date_of_quote'        => new sfWidgetFormDateTimeExt(array
                                (
                                 // 'format'     => $this->widgetFormatter->getStandardDateFormat(),
                                )),                                     
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
    ));
    
    $this->types = array
    (        
      'id'             => '=',
      'patient_id'     => 'combo',
      'title'          => 'text',
      'descriptions'   => 'text',
      'date_of_quote'  => 'date',
      'active'         => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'           => '-',
      'created_at'     => '-',
      'updated_at'     => '-'
    );
  }
  
  public function getFullName($patient_id)
  {
    $name = '';
    if ($patient_id)
    {
      $patient = Doctrine::getTable('Patient')->findOneById($patient_id);
      
      $name     = $patient? $patient->getFullName() : '';
    }
    
    return $name;
  }  
}