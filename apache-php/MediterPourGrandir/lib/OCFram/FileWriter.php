<?php
namespace OCFram;

use \OCFram\Writer;

class FileWriter extends Writer {

	protected $file;

	public function __construct($formater, $file)
	{
		parent::__construct($formater);
		$this->file = $file;
	}

	public function write($text)
	{
		// the entry of the path is 'OCFram' 
		$f = fopen(__DIR__ .'/../../Web/errLogger/'.$this->file, 'a');
		fwrite($f, $this->formater->format($text));
		fclose($f);
	}
}