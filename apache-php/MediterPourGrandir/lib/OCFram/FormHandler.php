<?php
namespace OCFram;

use \OCFram\Mailer;
use \OCFram\KeyGenerator;
use \OCFram\Hasher;

abstract class FormHandler
{
  protected $form;
  protected $manager;
  protected $request;

  public function __construct(Form $form, Manager $manager, HTTPRequest $request)
  {
    $this->setForm($form);
    $this->setManager($manager);
    $this->setRequest($request);
  }

  // Setters
  public function setForm(Form $form)
  {
    $this->form = $form;
  }

  public function setManager(Manager $manager)
  {
    $this->manager = $manager;
  }

  public function setRequest(HTTPRequest $request)
  {
    $this->request = $request;
  }

  public function processMailContact($student)
  {
    if($this->request->method() == 'POST' && $this->form->isValid())
    {

      $authMailer = new Mailer();

      //$authMailer->sendMailAuth($student);
      return true;
    }
  } 
}