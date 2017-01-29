<?php

use Exceptions\IncorrectAdapterNameException;
use Exceptions\ParametersParseException;
use Decorator\CitizenDecorator;
use Decorator\StudPerson;
use Decorator\StrongDecorator;


require_once "Autoloader.php";

// Example of usage addNamespacePath:
// Autoloader::addNamespacePath('MindK', 'vendor/mindk/src');

try {
    $config = ConfigSingleton::getInstance();
    $database_factory = new DatabaseAdapterFactory();
    $adapter = $database_factory->getAdapter($config->get("database")["adapter"]);
    debug($adapter);
} catch (ParametersParseException $e) {
    echo $e->getMessage();
} catch (IncorrectAdapterNameException $e) {
    echo $e->getMessage();
}
function debug($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}


echo "<pre>";
echo "Паттерн Decorator \n <br>";

$q=new CitizenDecorator(new StrongDecorator(new StudPerson()));
$q->describe();


