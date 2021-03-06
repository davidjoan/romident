<?php

/**
 * Dentist form base class.
 *
 * @method Dentist getObject() Returns the current form's model object
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDentistForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      'gender'        => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'home_phones'   => new sfWidgetFormInputText(),
      'office_phones' => new sfWidgetFormInputText(),
      'mobile_phone'  => new sfWidgetFormInputText(),
      'fax'           => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'active'        => new sfWidgetFormInputText(),
      'slug'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'firstname'     => new sfValidatorString(array('max_length' => 100)),
      'lastname'      => new sfValidatorString(array('max_length' => 100)),
      'gender'        => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 100)),
      'home_phones'   => new sfValidatorString(array('max_length' => 200)),
      'office_phones' => new sfValidatorString(array('max_length' => 200)),
      'mobile_phone'  => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'fax'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'active'        => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Dentist', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'Dentist', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('dentist[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dentist';
  }

}
