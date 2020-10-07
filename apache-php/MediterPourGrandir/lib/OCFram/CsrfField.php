<?php
namespace OCFram;

class CsrfField extends Field
{

  public function buildWidget()
  {
    return '<input type="hidden" value="'.$this->value.'" name="csrfForm" />'; 
  }
  
}