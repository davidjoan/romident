<?php

/**
 * Holder form.
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HolderForm extends BaseHolderForm
{
  protected
    $contactDynamicFormManager = null;
  
  public function initialize()
  {
    $this->labels = array
    (        
      'code'          => 'Codigo',
      'firstname'     => 'Nombres',
      'lastname'      => 'Apellidos',
      'gender'        => 'Sexo',
      'company'       => 'Empresa',
      'email'         => 'Email',
      'home_phones'   => 'Teléfono de Casa',
      'office_phones' => 'Teléfono de Oficina',
      'mobile_phone'  => 'Celular',
      'fax'           => 'Fax',
      'description'   => 'Descripción',
      'active'        => 'Activo',   
    );
  }
  
  public function configure()
  {
    $this->object->loadNextCode();

    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'code'                 => new sfWidgetFormValue(array('value' => $this->object->getCode())),
      'firstname'            => new sfWidgetFormInputText(array(), array('size' => 30)),
      'lastname'             => new sfWidgetFormInputText(array(), array('size' => 30)),
      'gender'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getGenders(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
      'company'              => new sfWidgetFormInputText(array(), array('size' => 60)),
      'email'                => new sfWidgetFormInputText(array(), array('size' => 30)),
      'home_phones'          => new sfWidgetFormInputText(array(), array('size' => 15)),
      'office_phones'        => new sfWidgetFormInputText(array(), array('size' => 15)),
      'mobile_phone'         => new sfWidgetFormInputText(array(), array('size' => 15)),
      'fax'                  => new sfWidgetFormInputText(array(), array('size' => 15)),
      'description'          => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 550,
                                  'height'           => 350,
                                  'config'           => 'theme_advanced_disable: "anchor,cleanup,help"',
                                )),
      //'meta_keywords'        => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 2)),
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
      'code'          => '-',
      'firstname'     => 'name',
      'lastname'      => 'name',
      'gender'        => array('combo', array('choices' => array_keys($this->getTable()->getGenders()))),
      'company'       => 'text',
      'email'         => 'email',
      'home_phones'   => 'phone',
      'office_phones' => 'phone',
      'mobile_phone'  => 'phone',
      'fax'           => 'phone',
      'description'   => 'pass',
      'active'        => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'          => '-',
      'created_at'    => '-',
      'updated_at'    => '-',
    );
    
    //$this->addPatientForm();
  }
  
  
  
  public function addPatientForm()
  {
    $this->contactDynamicFormManager = new sfDynamicFormEmbedderManager('patient', $this->object->getPatients()->getRelation(), 'Datos del Pacientes', $this, null, new sfCallable(array($this->object, 'getPatients')));
  }  
}
