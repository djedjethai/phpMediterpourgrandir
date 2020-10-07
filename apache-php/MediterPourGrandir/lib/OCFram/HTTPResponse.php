<?php
namespace OCFram;

use \OCFram\ExceptionHandler;

class HTTPResponse extends ApplicationComponent
{
  protected $page;

  public function addHeader($header)
  {
    header($header);
  }

  public function redirect($location)
  {
    header('Location: '.$location);
    exit;
  }

  public function redirect404()
  {
    $this->page = new Page($this->app);
    $this->page->setContentFile(__DIR__.'/../../Errors/404.html');
    
    $this->addHeader('HTTP/1.0 404 Not Found');
    
    $this->send404();
  }

  public function send404()
  {
    
    exit($this->page->getGeneratedPageError());
    
  }
  
  // before cache modif
  public function send($controller)
  {
    
    try {
      exit($this->page->getGeneratedPage($controller));
    }
    catch(MyException $e) {
      // ExceptionHandler::errorLoggerDbFile($e, $controller->getManager());
      ExceptionHandler::errorLoggerFile($e, 'errHttpResponse.txt');
    } 
    catch(\Exception $e) {
      ExceptionHandler::errorLoggerFile($e, 'errExceptionFinalCatch.txt');
    }

  }

// for cache
  // public function send($page)
  // {
  //   exit($page);
  // }

  public function setPage(Page $page)
  {
    $this->page = $page;
  }

  // Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true
  public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
  {
    setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  }
}