<?php

//require_once '/home/datasolu/symfony/lib/autoload/sfCoreAutoload.class.php';
require_once(dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php');
sfCoreAutoload::register();
require_once(dirname(__FILE__).'/../plugins/symfextPlugin/config/sfProjectConfigurationExt.class.php');

class ProjectConfiguration extends sfProjectConfigurationExt
{
  protected function getActivePlugins()
  {
    return array
           (
             'sfFormExtraPlugin',
             'sfMediaBrowserPlugin',
             'sfDoctrinePlugin',
             'symfextPlugin'
           );
  }
  
  protected function setConfigVariables()
  {
    parent::setConfigVariables();
    
    sfConfig::set('site_name', 'Romident');
    //$this->setConfigDirPathVariable('application_images' , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'application_images' );
    
  }
}