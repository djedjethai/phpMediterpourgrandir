<?php
namespace OCFram;

abstract class Writer 
{
	protected $formater;

	abstract public function Write($text);

	public function __construct($formater)
	{
		$this->formater = $formater;
	}
}