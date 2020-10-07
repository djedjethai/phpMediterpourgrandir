<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;
use \OCFram\RegexValidator;


class ContactFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->buildCsrf();
    $this->form->add(new StringField([
        'label' => 'Pseudo',
        'name' => 'pseudo',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le mail spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier votre pseudo.'),
          new RegexValidator('Utilisez des Chiffres et/ou des lettres. Les caracteres speciaux ne sont pas autorises.', '#[a-zA-Z0-9]#'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Email',
        'name' => 'email',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier votre email.'),
          new RegexValidator('votre email ne correspond pas au format email', '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 8,
        'cols' => 60,
        'validators' => [
          new NotNullValidator('Merci de spécifier le contenu'),
        ],
       ]));
  }
}