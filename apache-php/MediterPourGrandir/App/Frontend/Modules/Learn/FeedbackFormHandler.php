<?php
namespace App\Frontend\Modules\Learn;

use \OCFram\FormHandler;

class FeedbackFormHandler extends FormHandler
{
  public function process($haveFeedback)
  {
    if($this->request->method() == 'POST' && $this->form->isValid())
    {

      if($haveFeedback !== true) {
        $this->manager->add($this->form->entity());
      }
      else 
      {
        $this->manager->update($this->form->entity());
      }

      return true;
    }

    return false;
  }

}
