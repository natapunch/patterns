<?php

/**
 * Class for getting values from config
 *
 * Class ConfigSingleton
 */
class ConfigSingleton
{


    private static $instance = null;
    private $params = [];

    /**
     * ConfigSingleton constructor.
     */
    private function __construct()
    {
        $this->params = [
            'db' => 'oracle',
            'key2' => 'value2'
        ];

    }

    /**
     * Returns ConfigSingleton unique ex
     *
     * @return ConfigSingleton
     */
    public static function getInstance()
    {
        //check if initialized
        if (self::$instance == null) {
            //init
            self::$instance = new self();
        }

        return self::$instance;

    }

    public function __clone()
    {
        //leave empty
    }

    /**
     * Returns value from config by key
     *
     * @param $key string
     * @return mixed|null
     */
    public function get(string $key)
    {
        if (array_key_exists($key, $this->params)) {
            return $this->params[$key];
        } else {
            return null;
        }
    }

    public function getAll(): array
    {
        return $this->params;
    }

    /**
     * Sets value to config by key
     *
     * @param $key
     * @param $value
     */
    public function set(string $key, $value)
    {
        $this->params[$key] = $value;
    }


}