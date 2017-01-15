<?php

require_once("ConfigSingleton.php");
require_once "DatabaseAdapterFactory.php";
require_once "DatabaseAdapters/DatabaseAdapters.php";
require_once "Exceptions/IncorrectAdapterNameException.php";

$config = ConfigSingleton::getInstance();

try {
    $database_factory = new DatabaseAdapterFactory();
    $adapter = $database_factory->getAdapter($config->get("db"));
    debug($adapter);
} catch (IncorrectAdapterNameException $e) {
    echo $e->getMessage();
}


function debug($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}