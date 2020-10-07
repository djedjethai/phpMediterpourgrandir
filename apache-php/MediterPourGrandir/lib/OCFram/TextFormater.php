<?php

namespace OCFram;

use \OCFram\Formater;

class TextFormater implements Formater {

	public function format($text)
	{
		date_default_timezone_set('UTC');

		return "\n".'Date: ' . date('l jS \of F Y h:i:s A') . "\n" . 'Text: ' . $text; 
	}
}