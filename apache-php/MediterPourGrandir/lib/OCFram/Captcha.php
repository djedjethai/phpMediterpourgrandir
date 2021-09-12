<?php
namespace OCFram;

class Captcha
{
  protected $captchaCode;
  protected $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  protected $strength = 6;
  protected $secure = true;


  public function setCaptcha()
  {
  	$input_length = strlen($this->permitted_chars);
        $random_string = '';
        for($i = 0; $i < $this->strength; $i++) {
            if($this->secure) {
                $random_character = $this->permitted_chars[random_int(0, $input_length - 1)];
            } else {
                $random_character = $this->permitted_chars[mt_rand(0, $input_length - 1)];
            }
            $random_string .= $random_character;
        }
      
        $this->captchaCode = $random_string;
  }

  public function getCaptcha()
  {
	  // $renderedCap = $this->renderCaptcha()
	  if($this->captchaCode){
		  return $this->captchaCode;
	  } else {
		  return false;
	  }
  }

  public function renderCaptcha()
  {
	  // set captcha with <span>
  }
}
