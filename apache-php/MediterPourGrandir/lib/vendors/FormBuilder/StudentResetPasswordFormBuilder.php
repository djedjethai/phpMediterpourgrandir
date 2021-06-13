<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\PasswordField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;
use \OCFram\RegexValidator;


class StudentResetPasswordFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->buildCsrf();
    $this->form->add(new PasswordField([
        'label' => 'Mot de passe',
        'name' => 'password',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier votre mot de passe.'),
          new RegexValidator('Le mot de passe doit contenir au minimum 8 caracteres (chiffres et/ou lettres). Les caracteres speciaux ne sont pas acceptes', '#[a-zA-Z0-9]{1,}#'),
        ],
       ]))
       ->add(new PasswordField([
        'label' => 'Nouveau mot de passe',
        'name' => 'newPassword',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier votre nouveau mot de passe.'),
          new RegexValidator('Le mot de passe doit contenir au minimum 8 caracteres (chiffres et/ou lettres). Les caracteres speciaux ne sont pas acceptes', '#[a-zA-Z0-9]{1,}#'),
        ],
       ]))
       ->add(new PasswordField([
        'label' => 'Confirmation nouveau mot de passe',
        'name' => 'confirmPassword',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de confirmer votre nouveau mot de passe.'),
          new RegexValidator('Le mot de passe doit contenir au minimum 8 caracteres (chiffres et/ou lettres). Les caracteres speciaux ne sont pas acceptes', '#[a-zA-Z0-9]{1,}#'),
        ],
       ]));
  }
}
