<?php
namespace OCFram;

use \OCFram\Csrf;
use \OCFram\ExceptionHandler;

abstract class BackController extends ApplicationComponent
{
  protected $action = '';
  protected $module = '';
  protected $page = null;
  protected $view = '';
  protected $managers = null;
  protected $session = null;
  protected $cache = null;

  public function __construct(Application $app, $module, $action)
  {
    parent::__construct($app);

    $this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
    $this->session = new Session($this->managers->getManagerOf('Session'));
    $this->page = new Page($app);
    $this->cache = new Cache(__DIR__.'/../../tmp/cache/datas');

    $this->setModule($module);
    $this->setAction($action);
    $this->setView($action);
  }

  public function execute()
  {
    // var_dump($this->action);
    try{

      $method = 'execute'.ucfirst($this->action);

      if (!is_callable([$this, $method]))
      {
        throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module');
      }

      $this->$method($this->app->httpRequest());

    } catch(MyException $e) {
      // ExceptionHandler::errorLoggerDbFile($e, $this->getManager());
      ExceptionHandler::errorLoggerFile($e, 'errExecution.txt');
      
    } catch(\Exception $e) {
      ExceptionHandler::errorLoggerFile($e, 'errExceptionFinalCatch.txt');
    }
  }

  public function page()
  {
    // yyy;
    return $this->page;

  }

  public function setModule($module)
  {
    if (!is_string($module) || empty($module))
    {
      throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
    }

    $this->module = $module;
  }

  public function setAction($action)
  {

    if (!is_string($action) || empty($action))
    {
      throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
    }

    $this->action = $action;
  }

  public function setView($view)
  {
    if (!is_string($view) || empty($view))
    {
      throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
    }

    $this->view = $view;

    $this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
  }

  public function getModule()
  {
    return $this->module;
  }

  public function getAction()
  {
    return $this->action;
  }

  public function getSession()
  {
    return $this->session;
  }

  public function getManager()
  {
    return $this->managers;
  }

  public function cache()
  {
    return $this->cache;
  }

  public function verifSession()
  {
    // $req = $this->app()->httpRequest()->getPost('csrfForm');
    // echo('verif http ds back ctrl');
    // echo '<pre>';
    // print_r($req);
    // echo 'beuu';

    $sessionId = $this->app->user()->getUser();
    $student = $this->session->isValidSession($sessionId);

    if(!$student)
    {
      $this->app->user()->deconnexionUser();
      $this->app->httpResponse()->redirect('/');
      return;
    }
    return $student;
  }

  public function createCsrf()
  {
    $csrfFormClass = new Csrf;
    $token = $csrfFormClass->setToken();
    return $token;
  }
}