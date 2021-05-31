<?php
namespace OCFram;

class MyException extends \ErrorException 
{
	public function __toString()
	{
		switch ($this->severity) 
		{
			case E_USER_ERROR:
				$type = 'Error fatal';
				break;

			case E_WARNING:
			case E_USER_WARNING:
				$type = 'Warning';
				break;

			case E_NOTICE:
			case E_USER_NOTICE:
				$type = 'Notice';
				break;

			default:
				$type = 'Unknow error';
				break;
		}

		return '<strong>' .$type. '</strong> : [' .$this->code. '] ' .$this->message. '<br /><strong>' .$this->file. '</strong> at the line <strong>' .$this->line. '</strong>';
	}
}
