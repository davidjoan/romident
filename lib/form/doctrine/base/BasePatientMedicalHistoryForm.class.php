<?php

/**
 * PatientMedicalHistory form base class.
 *
 * @method PatientMedicalHistory getObject() Returns the current form's model object
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePatientMedicalHistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'patient_id'         => new sfWidgetFormInputHidden(),
      'medical_history_id' => new sfWidgetFormInputHidden(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'patient_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('patient_id')), 'empty_value' => $this->getObject()->get('patient_id'), 'required' => false)),
      'medical_history_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('medical_history_id')), 'empty_value' => $this->getObject()->get('medical_history_id'), 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('patient_medical_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PatientMedicalHistory';
  }

}
