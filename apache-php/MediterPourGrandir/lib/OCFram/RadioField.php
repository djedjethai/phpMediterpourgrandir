<?php
namespace OCFram;

class RadioField extends Field
{
  protected $maxLength;
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= '<span class="text-danger">'.$this->errorMessage.'<span><br />';
    }

    //var_dump($this->name);
    
  
    $widget .= '<div><input type="radio" id='.$this->label.' name='.$this->name.' value='.$this->label.'>';
    $widget .= '<label for='.$this->label.'>'.$this->label.'</label></div>';

   
    return $widget;
  }




 /*<p>Select a maintenance drone:</p>

<div>
  <input type="radio" id="huey" name="drone" value="huey"
         checked>
  <label for="huey">Huey</label>
</div>

<div>
  <input type="radio" id="dewey" name="drone" value="dewey">
  <label for="dewey">Dewey</label>
</div>

<div>
  <input type="radio" id="louie" name="drone" value="louie">
  <label for="louie">Louie</label>
</div>*/


}