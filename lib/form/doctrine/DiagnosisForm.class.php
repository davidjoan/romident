<?php

/**
 * Diagnosis form.
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiagnosisForm extends BaseDiagnosisForm
{
  public function initialize()
  {
    $this->labels = array
    (        
      //'patient_id' => 'Paciente',
      'tooth'      => 'Diente',
      'diagnosis'  => 'Diagn&oacute;stico',
      'treatment'  => 'Tratamiento',
      'active'     => 'Activo',   

    );
  }
  public function configure()
  {

    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'tooth'                => new sfWidgetFormInputText(array(), array('size' => 30)),
      'diagnosis'            => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),
      'treatment'            => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
    ));
    
    $this->types = array
    (        
      'id'            => '=',
      'patient_id'    => '-',
      'tooth'         => 'text',
      'diagnosis'     => 'text',
      'treatment'     => 'text',
      'active'        => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'          => '-',
      'created_at'    => '-',
      'updated_at'    => '-'
    );
  }
}
