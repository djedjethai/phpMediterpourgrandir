<?php
namespace OCFram;

class RegexValidator extends Validator
{
  protected $regex;
  
  public function __construct($errorMessage, $regex)
  {
    parent::__construct($errorMessage);
    
    $this->regex = $regex;
  }
  
  public function isValid($value)
  {
    $valid = false;
    if (preg_match($this->regex, $value) || strlen($value) === 0)
    {
      // return $value;
      $valid = true;
    }
    return $valid;
  }
  
}