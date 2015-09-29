<?php

/**
 * Log actions.
 *
 * @package    datasol
 * @subpackage Log
 * @author     David Joan Tataje Mendoza <dtataje@datasolutions.pe>
 */
class LogActions extends ActionsProject
{
  public function executeLogin(sfWebRequest $request)
  {
    Doctrine::getTable('Visit')->createAndSave($request->getPathInfoArray());
    $this->form = new LoginBackendForm();
    
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $user = Doctrine::getTable('User')->findOneByLowerCaseUsername($this->form->getValue('username'));
        $this->getUser()->login($user);
        
        return $this->redirect('@home');
      }
    }
  }
  public function executeLogout()
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->logout();
    }
    
    return $this->redirect('@log_login');
  }
}
