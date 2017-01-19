<?php

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