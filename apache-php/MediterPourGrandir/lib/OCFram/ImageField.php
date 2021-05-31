<?php
namespace OCFram;

class ImageField extends Field
{
  protected $maxLength;
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->value))
    {
      $widget .= '<img style="max-width: 200px;" src="/Web/pictures/'.$this->value.'" alt="test" />';
    }

    $widget .= '<h5>Photo</h5>';

    $widget .= '<input class="btn btn-light" type="file" name='.$this->name.' id="fileUpload"><br />';
    
    $widget .= '<p style="margin-bottom: 40px"><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu\'à une taille maximale de 5 Mo</p>';
    
    return $widget;
  }
  
}
