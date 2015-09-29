<?php

/**
 * Appointment form base class.
 *
 * @method Appointment getObject() Returns the current form's model object
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAppointmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'patient_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Patient'), 'add_empty' => true)),
      'date_of_quote' => new sfWidgetFormDateTime(),
      'title'         => new sfWidgetFormInputText(),
      'descriptions'  => new sfWidgetFormTextarea(),
      'active'        => new sfWidgetFormInputText(),
      'slug'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'patient_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Patient'), 'required' => false)),
      'date_of_quote' => new sfValidatorDateTime(array('required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'descriptions'  => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'active'        => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Appointment', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('appointment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Appointment';
  }

}
