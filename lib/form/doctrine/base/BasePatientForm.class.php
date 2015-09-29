<?php

/**
 * Patient form base class.
 *
 * @method Patient getObject() Returns the current form's model object
 *
 * @package    romident
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePatientForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'holder_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Holder'), 'add_empty' => true)),
      'dentist_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dentist'), 'add_empty' => true)),
      'firstname'              => new sfWidgetFormInputText(),
      'lastname'               => new sfWidgetFormInputText(),
      'gender'                 => new sfWidgetFormInputText(),
      'date_of_birth'          => new sfWidgetFormDateTime(),
      'description'            => new sfWidgetFormTextarea(),
      'treatments'             => new sfWidgetFormTextarea(),
      'brush_teeth'            => new sfWidgetFormInputText(),
      'different_brush'        => new sfWidgetFormInputText(),
      'consultation'           => new sfWidgetFormTextarea(),
      'type'                   => new sfWidgetFormInputText(),
      'active'                 => new sfWidgetFormInputText(),
      'slug'                   => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'medical_histories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'MedicalHistory')),
      'dental_histories_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'DentalHistory')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'holder_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Holder'), 'required' => false)),
      'dentist_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Dentist'), 'required' => false)),
      'firstname'              => new sfValidatorString(array('max_length' => 100)),
      'lastname'               => new sfValidatorString(array('max_length' => 100)),
      'gender'                 => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'date_of_birth'          => new sfValidatorDateTime(array('required' => false)),
      'description'            => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'treatments'             => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'brush_teeth'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'different_brush'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'consultation'           => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'type'                   => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'active'                 => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
      'medical_histories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'MedicalHistory', 'required' => false)),
      'dental_histories_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'DentalHistory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Patient', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('patient[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Patient';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['medical_histories_list']))
    {
      $this->setDefault('medical_histories_list', $this->object->MedicalHistories->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['dental_histories_list']))
    {
      $this->setDefault('dental_histories_list', $this->object->DentalHistories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMedicalHistoriesList($con);
    $this->saveDentalHistoriesList($con);

    parent::doSave($con);
  }

  public function saveMedicalHistoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['medical_histories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->MedicalHistories->getPrimaryKeys();
    $values = $this->getValue('medical_histories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('MedicalHistories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('MedicalHistories', array_values($link));
    }
  }

  public function saveDentalHistoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['dental_histories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->DentalHistories->getPrimaryKeys();
    $values = $this->getValue('dental_histories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('DentalHistories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('DentalHistories', array_values($link));
    }
  }

}
