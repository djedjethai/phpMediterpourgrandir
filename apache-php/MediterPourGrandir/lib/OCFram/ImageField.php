<?php
namespace OCFram;

/*<img style="max-width: 200px;"src="/pictures/<?=$student->picture()?>" alt="test" />


<h5>Photo</h5>
<input class="btn btn-light" type="file" name="picture" id="fileUpload"><br />
<p style="margin-bottom: 40px"><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>*/

class ImageField extends Field
{
  protected $maxLength;
  
  public function buildWidget()
  {
    $widget = '';
    
    // err message
    /*if (!empty($this->errorMessage))
    {
      $widget .= '<span class="text-danger">'.$this->errorMessage.'<span><br />';
    }*/

    if (!empty($this->value))
    {
      $widget .= '<img style="max-width: 200px;" src="/Web/pictures/'.$this->value.'" alt="test" />';
      // $widget .= ' value="'.htmlspecialchars($this->value).'"';
    }

    $widget .= '<h5>Photo</h5>';

    // $widget .= '<label class="text-dark">'.$this->label.'</label><input type="text" class="form-control" name="'.$this->name.'" ';

    $widget .= '<input class="btn btn-light" type="file" name='.$this->name.' id="fileUpload"><br />';
    
    $widget .= '<p style="margin-bottom: 40px"><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu\'à une taille maximale de 5 Mo</p>';
    
    return $widget;
  }
  
}