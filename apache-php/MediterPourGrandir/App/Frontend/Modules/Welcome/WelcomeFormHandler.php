<?php
namespace App\Frontend\Modules\Welcome;

use \OCFram\FormHandler;
use \OCFram\Mailer; 

class WelcomeFormHandler extends FormHandler
{
 
  public function processMailContact($contact)
  {
    if ($this->request->method() == 'POST' && $this->form->isValid())
    {
        Mailer::sendMailContact($contact);
        return true;
    }
    else
    {
      // return trigger_error('formulaire incorrect', E_USER_ERROR);
      return false;
    }
  } 
}
