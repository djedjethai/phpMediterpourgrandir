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

  public function renderCaptcha($captcha)
  {
	  $input = 'a,b,c,d,e,f';
	  $r_input = $input[random_int(0, strlen($input) -1)];

	  var_dump("ggh:".$r_input);

	  // $captcha = $this->setCaptcha();
	  $str = '<div>';
	  for($i = 0; $i < $this->strength; $i++){
		 
		// $str .= '<span="'.$r_input[$i].'">"'.$captcha[$i].'"</span>"';
	  }
	  $str .= '</div>';

	  return $str;
  }
}
