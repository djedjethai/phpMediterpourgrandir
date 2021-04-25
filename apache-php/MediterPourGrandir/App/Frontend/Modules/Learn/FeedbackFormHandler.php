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
	var_dump('grrrr');
        $this->manager->update($this->form->entity());
      }

      return true;
    }

    return false;
  }

}
