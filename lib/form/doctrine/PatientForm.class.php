<?php

/**
 * Patient form.
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PatientForm extends BasePatientForm
{
  protected
    $contactDynamicFormManager = null;
  
  public function initialize()
  {
    $this->labels = array
    (                
      'holder_id'              => 'Titular',
      'dentist_id'             => 'Dentista',
      'firstname'              => 'Nombres',
      'lastname'               => 'Apellidos',
      'gender'                 => 'Genero',
      'date_of_birth'          => 'Fecha de Nacimiento',
      'description'            => 'Observaciones',
      'treatments'             => '¿Qué tratamiento ha adquirido?',
      'brush_teeth'            => '¿Cuantas veces al día cepilla sus dientes?',
      'different_brush'        => '¿Aparte del cepillo utiliza otro aditamento para limpiar sus dientes?',
      'consultation'           => '¿Motivo de la consulta?',
      'type'                   => 'Tipo',   
      'active'                 => 'Activo',   
      'medical_histories_list' => 'Historia Medica',
      'dental_histories_list'  => 'Historia Dental',
    );
  }
  
  public function configure()
  {
    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'holder_id'            => new sfWidgetFormJQueryCompleter(array
                                (
                                  'url'             => $this->genUrl('@patient_load_holders'),
                                  'value_callback'  => array($this, 'getFullName'),
                                  'config'          => sprintf('{ max: "20" }')
                                ), array('size' => 50)),        
      'dentist_id'            => new sfWidgetFormJQueryCompleter(array
                                (
                                  'url'             => $this->genUrl('@patient_load_dentists'),
                                  'value_callback'  => array($this, 'getDentistFullName'),
                                  'config'          => sprintf('{ max: "20" }')
                                ), array('size' => 50)),     
      'firstname'            => new sfWidgetFormInputText(array(), array('size' => 30)),
      'lastname'             => new sfWidgetFormInputText(array(), array('size' => 30)),
      'gender'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getGenders(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
      'date_of_birth'        => new sfWidgetFormDateExt(array
                                (
                                  'format'     => $this->widgetFormatter->getStandardDateFormat(),
                                  'year_start' => 1920,
                                  'year_end'   => date('Y'),
                                )),         
      'type'                 => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getTypes(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
      'medical_histories_list'      => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'            => $this->getRelatedModelName('MedicalHistories'),
                                  'expanded'         => true,
                                  'multiple'         => true,
                                  'renderer_class'     => 'sfWidgetFormSelectDoubleList',
                                  'renderer_options' => array('label_unassociated' => 'No Asociadas','label_associated'   => 'Asociadas')
                                )),
      'dental_histories_list'      => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'            => $this->getRelatedModelName('DentalHistories'),
                                  'expanded'         => true,
                                  'multiple'         => true,
                                  'renderer_class'     => 'sfWidgetFormSelectDoubleList',
                                  'renderer_options' => array('label_unassociated' => 'No Asociadas','label_associated'   => 'Asociadas')
                                )),    
      'treatments'           => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),        
      'brush_teeth'          => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),        
      'different_brush'      => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),        
      'consultation'         => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),        
      'description'          => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 550,
                                  'height'           => 350,
                                  'config'           => 'theme_advanced_disable: "anchor,cleanup,help"',
                                )),
    ));
    
    $this->types = array
    (                
      'id'                     => '=',
      'holder_id'              => 'combo',
      'dentist_id'             => 'combo',
      'firstname'              => 'name',
      'lastname'               => 'name',
      'gender'                 => array('combo', array('choices' => array_keys($this->getTable()->getGenders()))),
      'date_of_birth'          => 'date',
      'description'            => 'pass',
      'treatments'             => 'text',
      'brush_teeth'            => 'text',
      'different_brush'        => 'text',
      'consultation'           => 'text',
      'type'                   => array('combo', array('choices' => array_keys($this->getTable()->getTypes()))),
      'active'                 => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'                   => '-',
      'created_at'             => '-',
      'updated_at'             => '-',
      'medical_histories_list' => 'list',
      'dental_histories_list'  => 'list',
        
    );

    $this->validatorSchema['holder_id']->setOption('required', true);
    $this->validatorSchema['dentist_id']->setOption('required', true);
    
    $this->addDiagnosisForm();
  }
  
  
  
  public function addDiagnosisForm()
  {
    $this->contactDynamicFormManager = new sfDynamicFormEmbedderManager('diagnosis', $this->object->getDiagnosis()->getRelation(), 'Diagn&oacute;sticos', $this, null, new sfCallable(array($this->object, 'getDiagnosis')));
  }  
  
  public function getDentistFullName($dentist_id)
  {
    $name = '';
    if ($dentist_id)
    {
      $dentist = Doctrine::getTable('Dentist')->findOneById($dentist_id);
      
      $name     = $dentist? $dentist->getFullName() : '';
    }
    
    return $name;
  }

  public function getFullName($holder_id)
  {
    $name = '';
    if ($holder_id)
    {
      $holder= Doctrine::getTable('Holder')->findOneById($holder_id);
      
      $name     = $holder? $holder->getFullName() : '';
    }
    
    return $name;
  }
}
