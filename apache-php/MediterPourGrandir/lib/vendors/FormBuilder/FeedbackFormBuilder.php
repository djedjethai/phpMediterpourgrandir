<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\TextField;
use \OCFram\NotNullValidator;

class FeedbackFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->buildCsrf();
    $this->form->add(new TextField([
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 13,
        'cols' => 80,
        'validators' => [
          new NotNullValidator('Merci de spécifier votre commentaire'),
        ],
       ]));
  }
}
