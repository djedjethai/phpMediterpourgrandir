<?php
namespace OCFram;

class Cache
{
  protected $dataFolder;
  
  public function __construct($dataFolder)
  {
    $this->setDataFolder($dataFolder);
  }
  
  public function delete($key)
  {
    if (file_exists($this->dataFolder.'/'.$key)) {
	    unlink($this->dataFolder.'/'.$key);
    }
  }

  public function deleteAllNews()
  {
    foreach (glob($this->dataFolder.'/news-*') as $filename) {
        unlink($filename);
    }
  }

  public function deleteIndex()
  {
    foreach (glob($this->dataFolder.'/index-*') as $filename) {
        unlink($filename);
    }
  }
  
  public function read($key)
  {
    $content = $this->readFile($this->dataFolder.'/'.$key);
    
    return $content === null ? null : unserialize($content);
  }
  
  public function readFile($filename)
  {
    if (!file_exists($filename)) return null;

    $file = fopen($filename, 'r');
    $content = '';
    
    $expires = (int) fgets($file);
    
    if ($expires < time())
    {
      fclose($file);
      unlink($filename);
      return null;
    }
    
    while (($buffer = fgets($file)) !== false)
    {
      $content .= $buffer;
    }
    
    fclose($file);
    
    return $content;
  }
  
  public function write($name, $value, $duration)
  {
    $this->writeFile($this->dataFolder.'/'.$name, serialize($value), $duration);
  }
  
  public function writeFile($filename, $content, $duration)
  {

    $interval = \DateInterval::createFromDateString($duration);
    $expires = (new \DateTime)->add($interval)->getTimestamp();
    
    file_put_contents($filename, $expires."\n".$content);
  }
  
  public function dataFolder()
  {
    return $this->dataFolder;
  }
  
  public function setDataFolder($dataFolder)
  {
    if (!is_dir($dataFolder))
    {
      throw new \InvalidArgumentException('Le dossier spécifié pour le cache des données est invalide');
    }
    
    $this->dataFolder = $dataFolder;
  }
}
