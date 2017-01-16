<?php

require_once "ConfigSingleton.php";
require_once "DatabaseAdapterFactory.php";
require_once "DatabaseAdapters/DatabaseAdapters.php";
require_once "Exceptions/IncorrectAdapterNameException.php";
require_once "Exceptions/ParametersParseException.php";

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