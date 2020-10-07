<?php
namespace App\Frontend\Modules\News;

use \OCFram\FormHandler;

class NewsFormHandler extends FormHandler
{
  public function process()
  {
    if($this->request->method() == 'POST' && $this->form->isValid())
    {
      
      $this->manager->save($this->form->entity());

      return true;
    }

    return false;
  }

}