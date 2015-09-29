<?php

/**
 * MedicalHistory form base class.
 *
 * @method MedicalHistory getObject() Returns the current form's model object
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMedicalHistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'active'        => new sfWidgetFormInputText(),
      'slug'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'patients_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Patient')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 200)),
      'description'   => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'active'        => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'patients_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Patient', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'MedicalHistory', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('medical_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MedicalHistory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['patients_list']))
    {
      $this->setDefault('patients_list', $this->object->Patients->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePatientsList($con);

    parent::doSave($con);
  }

  public function savePatientsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['patients_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Patients->getPrimaryKeys();
    $values = $this->getValue('patients_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Patients', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Patients', array_values($link));
    }
  }

}
