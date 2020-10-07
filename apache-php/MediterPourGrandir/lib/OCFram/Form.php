<?php
namespace OCFram;

class Form
{
  protected $entity;
  protected $csrfForm;
  protected $fields = [];
  
  public function __construct(Entity $entity, $csrfForm)
  {

    $this->setEntity($entity);
    $this->setCsrfForm($csrfForm);
    
  }
  
  public function add(Field $field)
  {
    $attr = $field->name(); // On récupère le nom du champ.

    $field->setValue($this->entity->$attr()); // On assigne la valeur correspondante au champ.
    
    $this->fields[] = $field; // On ajoute le champ passé en argument à la liste des champs.
    return $this;
  }

  public function addCsrf(Field $field)
  {
    $attr = $field->name(); // On récupère le nom du champ.

    $field->setValue($this->csrfForm); // On assigne la valeur correspondante au champ.
    
    $this->fields[] = $field; // On ajoute le champ passé en argument à la liste des champs.
    return $this;
  }
  
  public function createView()
  {
    $view = '';
    
    // On génère un par un les champs du formulaire.
    foreach ($this->fields as $field)
    {
      $view .= $field->buildWidget().'<br />';
    }
    
    return $view;
  }
  
  public function isValid()
  {
    $valid = true;
    
    // On vérifie que tous les champs sont valides.
    foreach ($this->fields as $field)
    {
      if (!$field->isValid())
      {
        $valid = false;
      }
    }
    
    return $valid;
  }
  
  public function entity()
  {
    return $this->entity;
  }
  
  public function setEntity(Entity $entity)
  {
    $this->entity = $entity;
  }

  public function setCsrfForm($csrfForm)
  {
    $this->csrfForm = $csrfForm;
  }
}