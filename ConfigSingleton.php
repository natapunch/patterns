<?php

require_once "Exceptions/ParametersParseException.php";

/**
 * Class for getting values from config
 *
 * Class ConfigSingleton
 */
class ConfigSingleton
{
    const PARAMETERS_FILE = "parameters.json";

    private static $instance = null;
    private $params = [];

    /**
     * ConfigSingleton constructor
     * @throws ParametersParseException if parameters file is invalid
     */
    private function __construct()
    {
        $file_content = file_get_contents(self::PARAMETERS_FILE);

        $parse_result = json_decode($file_content, true);
        if (is_null($parse_result)) {
            throw new ParametersParseException("Can't parse file " . self::PARAMETERS_FILE);
        }
        $this->params = $parse_result;
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

    private function __clone()
    {
        //leave empty
    }

    /**
     * Protects from creation through unserialize
     */
    private function __wakeup()
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