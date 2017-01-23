<?php

/**
 * Class Autoloader
 */
class Autoloader
{
    private static $instance=null;
    /**
     * @var array   Namespace mapping
     */
    protected static $ns_map = [];
    /**
     * Load class
     *
     * @param string $classname Class name
     */
    protected function load(string $classname)
    {
        if ($path = $this->getClassPath($classname)) {
            require_once $path;
        }
    }

    /**
     * Autoloader constructor.
     */
    public function __construct()
    {
        spl_autoload_register([$this, 'load']);
    }

    public static function getInstance()
    {
        //check if initialized
        if (self::$instance == null) {
            //init
            self::$instance = new self();
        }
        return self::$instance;
    }


    /**
     * Register namespace root path
     *
     * @param string $namespace Root namespace
     * @param string $root_path Namespace root path
     */
    public static function addNamespacePath(string $namespace, string $root_path)
    {
        self::$ns_map[$namespace] = $root_path;
    }


    /**
     * Get realpath to the class definition file
     * @param $classname string name of class
     * @return string
     */
    protected function getClassPath(string $classname): string
    {
        $class_path = $classname . '.php';
        if (!empty(self::$ns_map)) {
            foreach (self::$ns_map as $ns => $path) {
                $lookup_pattern = sprintf('/^%s/', $ns);
                if (preg_match($lookup_pattern, $classname)) {
                    $class_path = preg_replace($lookup_pattern, $path, $class_path);
                    break;
                }
            }
        }

        return realpath(str_replace('\\', DIRECTORY_SEPARATOR, $class_path));
    }

    private function __clone()
    {
        //leave empty
    }

}

Autoloader::getInstance();