<?php
namespace OCFram;

class KeyGenerator 
{
	protected $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  	protected $secure = true;


  	public function generateSecureKey($nbr)
  	{
  		$input_length = strlen($this->permitted_chars);
        	$random_string = '';
        	for($i = 0; $i < $nbr; $i++) {
            		if($this->secure) {
                		$random_character = $this->permitted_chars[random_int(0, $input_length - 1)];
            		} else {
                		$random_character = $this->permitted_chars[mt_rand(0, $input_length - 1)];
            		}
            		$random_string .= $random_character;
        	}
      
        	return $random_string;
  	}


	public function generateKey($nbr)
	{
		$longueurKey = $nbr;
        	$key = "";
        	for($i=1;$i<$longueurKey;$i++) 
        	{
            		$key .= mt_rand(0,9);
        	}

        	return $key;
	}

}
