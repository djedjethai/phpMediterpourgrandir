<?php
namespace OCFram;

use \OCFram\Writer;

class DBWriter extends Writer {

	protected $manager;

	public function __construct($formater, $manager)
	{
		parent::__construct($formater);
		$this->manager = $manager;
		
	}

	public function write($text) {

		$errManager = $this->manager->getManagerOf('Err');
		$errManager->recordErr($text);
	}
}