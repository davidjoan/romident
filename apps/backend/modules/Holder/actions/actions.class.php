<?php

/**
 * Holder actions.
 *
 * @package    romident
 * @subpackage Holder
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HolderActions extends ActionsCrud
{
    protected function complementList(sfWebRequest $request, DoctrineQuery $q)
  {
    sfDynamicFormEmbedder::resetParams('patient');

  }
}
