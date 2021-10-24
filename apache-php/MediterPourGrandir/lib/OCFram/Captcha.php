<?php
namespace OCFram;

use \OCFram\KeyGenerator;

class Captcha
{
  protected $captchaCode;
  protected $strength = 6;

  public function setCaptcha()
  {
	$keyGenerator = new KeyGenerator;
	$key = $keyGenerator->generateSecureKey($this->strength);
	$this->captchaCode = $key;
   }

  public function getCaptcha()
  {
	  if($this->captchaCode){
		  return $this->captchaCode;
	  } else {
		  return false;
	  }
  }
}

