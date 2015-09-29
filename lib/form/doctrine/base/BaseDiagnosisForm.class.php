<?php

/**
 * Diagnosis form base class.
 *
 * @method Diagnosis getObject() Returns the current form's model object
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDiagnosisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'patient_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Patient'), 'add_empty' => true)),
      'tooth'      => new sfWidgetFormInputText(),
      'diagnosis'  => new sfWidgetFormTextarea(),
      'treatment'  => new sfWidgetFormTextarea(),
      'active'     => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'patient_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Patient'), 'required' => false)),
      'tooth'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'diagnosis'  => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'treatment'  => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'active'     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Diagnosis', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('diagnosis[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Diagnosis';
  }

}
