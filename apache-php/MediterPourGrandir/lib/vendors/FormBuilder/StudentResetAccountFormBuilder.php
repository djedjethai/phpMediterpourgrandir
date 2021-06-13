<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\PasswordField;
use \OCFram\ImageField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;
use \OCFram\RegexValidator;


class StudentResetAccountFormBuilder extends FormBuilder
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
          new RegexValidator('Utilisez des Chiffres et/ou des lettres. Les caracteres speciaux ne sont pas autorises.', '#[a-zA-Z0-9]#'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Email',
        'name' => 'email',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new RegexValidator('votre email ne correspond pas au format email', '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#'),
        ],
       ]))
       ->add(new PasswordField([
	'label' => 'Mot de passe',
        'name' => 'password',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Le mot de passe est necessaire a toute modification.'),
          new RegexValidator('Le mot de passe doit contenir au minimum 8 caracteres (chiffres et/ou lettres). Les caracteres speciaux ne sont pas acceptes', '#[a-zA-Z0-9]{1,}#'),
          ],
       ]))
        ->add(new ImageField([
            'label' => 'Picture',
            'name' => 'picture',
       ]));
  }
}

 
