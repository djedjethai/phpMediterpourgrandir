<?php
namespace OCFram;

class Page extends ApplicationComponent
{

  protected $content = null;
  protected $contentFile;
  protected $vars = [];

  public function addVar($var, $value)
  {
    if (!is_string($var) || is_numeric($var) || empty($var))
    {
      throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
    }

    $this->vars[$var] = $value;
  }

  public function getGeneratedPageError()
  {

    if (!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }

    $user = $this->app->user();

    extract($this->vars);

    ob_start();
      require $this->contentFile;
    

    return ob_get_clean();
  }  

  public function getGeneratedPage($controller)
  {

    if (!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }

    $user = $this->app->user();
    $module = $controller->getModule();
    $view = $controller->getAction();


    extract($this->vars);

    ob_start();
      require $this->contentFile;
      
    $content = ob_get_clean();

    ob_start();

    switch($controller->getModule()){
      case 'Welcome':
        require __DIR__.'/../../App/'.$this->app->name().'/Templates/layoutWel.php';
        break;
      case 'Auth':
        require __DIR__.'/../../App/'.$this->app->name().'/Templates/layoutAuth.php';
        break;
      case 'Learn':
        require __DIR__.'/../../App/'.$this->app->name().'/Templates/layoutLearn.php';
        break;
      case 'News':
        require __DIR__.'/../../App/'.$this->app->name().'/Templates/layoutNews.php';
        break;
      case 'Connexion':
        require __DIR__.'/../../App/'.$this->app->name().'/Templates/layoutConnexions.php';
        break;
      case 'Account':
        require __DIR__.'/../../App/'.$this->app->name().'/Templates/layoutAccount.php';
        break;
      default:
        require __DIR__.'/../../App/'.$this->app->name().'/Templates/layoutWel.php';
    }

    return ob_get_clean();

  }

  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }

    $this->contentFile = $contentFile;
  }

   public function setContent($content)
  {
    echo '<br />ds page';
    var_dump($content);


    if (!is_string($content))
    {
      throw new \InvalidArgumentException('Le contenu de la page doit être une chaine de caractères');
    }
    
    $this->content = $content;
  }

  public function content()
  {
    return $this->contentFile;
  }
  
}