<?php
const DEFAULT_APP = 'Frontend';

if (!isset($_GET['app']) || !file_exists(__DIR__.'/App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// add composer autoload
require __DIR__ . '/vendor/autoload.php';

// On commence par inclure la classe nous permettant d'enregistrer nos autoload
require __DIR__.'/lib/OCFram/SplClassLoader.php';

// On va ensuite enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model, etc.)
$OCFramLoader = new SplClassLoader('OCFram', __DIR__.'/lib');
$OCFramLoader->register();

$appLoader = new SplClassLoader('App', __DIR__.'/');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/lib/vendors');
$entityLoader->register();

$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/lib/vendors');
$formBuilderLoader->register();

// Il ne nous suffit plus qu'à déduire le nom de la classe et de l'instancier
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

// set the err handler
function error2exception($code, $message, $fichier, $ligne)
{
	$except = 'OCFram\\MyException';
	throw new $except($message, 0, $code, $fichier, $ligne);
}
set_error_handler('error2exception');

$app = new $appClass;
$app->run();
