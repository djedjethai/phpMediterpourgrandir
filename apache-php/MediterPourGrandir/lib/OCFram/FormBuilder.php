<?php
namespace OCFram;

use \OCFram\CsrfField;

abstract class FormBuilder
{
  protected $form;
  protected $csrfForm;
  
  public function __construct(Entity $entity, $csrfForm)
  {
    $this->setForm(new Form($entity, $csrfForm));
    $this->setCsrfForm($csrfForm);
  }
  
  abstract public function build();
  
  public function setForm(Form $form)
  {
    $this->form = $form;
  }

  public function setCsrfForm($csrfForm)
  {
    $this->csrfForm = $csrfForm;
  }
  
  public function form()
  {
    return $this->form;
  }

  public function csrfForm()
  {
    return $this->csrfForm;
  }

  public function buildCsrf()
  {
    
    return $this->form->addCsrf(new CsrfField([
        'name' => 'csrfForm',
        'value' => $this->csrfForm(),
       ]));
  }

}