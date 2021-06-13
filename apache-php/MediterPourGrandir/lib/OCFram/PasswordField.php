<?php
namespace OCFram;

class PasswordField extends Field
{
  protected $maxLength;
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= '<span class="form__error">'.$this->errorMessage.'</span><br />';
    }

    
    $widget .= '<div class="form__group"><label for="'.$this->label.'" class="form__label">'.$this->label.'</label><input type="password" id="'.$this->label.'" class="form__input" name="'.$this->name.'" ';
    
    if (!empty($this->value))
    {
      $widget .= ' value="'.htmlspecialchars($this->value).'"';
    }
    
    if (!empty($this->maxLength))
    {
      $widget .= ' maxlength="'.$this->maxLength.'"';
    }
    
    return $widget .= ' /></div>';
  }
  
  public function setMaxLength($maxLength)
  {
    $maxLength = (int) $maxLength;
    
    if ($maxLength > 0)
    {
      $this->maxLength = $maxLength;
    }
    else
    {
      throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
    }
  }
}
