<?php
namespace OCFram;

class Config extends ApplicationComponent
{
  protected $vars = [];

  public function get($var)
  {
    if (!$this->vars)
    {
      // encode password
      // $password='theadminnametoencode';
      // $hash = password_hash($password, PASSWORD_BCRYPT);
      // var_dump($hash);
	    
      // $password2='thepasswordnametoencode';
      // $hash = password_hash($password2, PASSWORD_BCRYPT);
      // var_dump($hash);


      $xml = new \DOMDocument;
      $xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/app.xml');

      $elements = $xml->getElementsByTagName('define');

      foreach ($elements as $element)
      {
        $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
      }
    }

    if (isset($this->vars[$var]))
    {
      return $this->vars[$var];
    }

    return null;
  }
}
