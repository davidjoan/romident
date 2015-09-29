<?php

class ContactForm extends sfForm
{
  
  public function configure()
  {
     $this->setWidgets(array(
        'name'    => new sfWidgetFormInput(),
        'email'   => new sfWidgetFormInput(),
        'company' => new sfWidgetFormInput(),
        'subject' => new sfWidgetFormInput(),
        'message' => new sfWidgetFormTextarea(),
        //'captcha' => new sfWidgetFormReCaptcha(array('public_key' => sfConfig::get('app_recaptcha_public_key'),'theme' => 'red', 'culture' => 'es'))
        'captcha' => new sfWidgetFormInput(),
     ));
     
     $this->setValidators(array(
        'name'    => new sfValidatorString(array('required' => true)),
        'email'   => new sfValidatorEmail(),
        'subject' => new sfValidatorString(array('required' => false)),
        'company' => new sfValidatorString(array('required' => false)),
        'message' => new sfValidatorString(array('min_length' => 4)),
        //'captcha' => new sfValidatorReCaptcha(array('private_key' => sfConfig::get('app_recaptcha_private_key')))
        'captcha' => new sfValidatorString(array('required' => false)),
    ));
     
    $this->widgetSchema->setNameFormat('contact[%s]'); 
  }
}