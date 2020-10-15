<?php

    class Loader
    {
        public function __construct()
        {
            spl_autoload_register(function ($class_name)
            {
                //print($class_name . ".php --- ");
                require_once($class_name . ".php");
            });
        }
        
        protected function getStrings($fileName)
        {
            $strings = parse_ini_file($fileName);
            $keys = array_keys($strings);
    
            foreach($keys as $key)
            {
                define($key, $strings[$key]);
            }
        }
        
        protected function checkNullParameter($par)
        {
            if($par == null)
            {
                throw new \Exception("Parameter is null");
            }
        }
    }

?>