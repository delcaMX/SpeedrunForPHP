<?php
    
    namespace speedruncom\resources;
    
    abstract class Resource
    {
        protected function getStrings($fileName)
        {
            $strings = parse_ini_file($fileName);
            $keys = array_keys($strings);
    
            foreach($keys as $key)
            {
                if(!isset($key))
                {
                    define($key, $strings[$key]);
                }
            }
        }
        
        protected function formatData($json)
        {
            if($json == null)
            {
                throw new \Exception("Data is null");
            }
            
            return json_decode($json, true)["data"];
        }
        
        public function __get($prop) {
            if(property_exists($this, $prop))
            {
                if(isset($this->$prop)) {
                    return $this->$prop;
                }
                else
                {
                    throw new \Exception("Property was not set: " . $prop);
                }                
            }
            else
            {
                throw new \Exception("Invalid property: " . $prop);
            }
        }
        
        protected function getFromData($data, $key)
        {
            if(array_key_exists($key, $data))
            {
                return $data[$key];
            }
            else
            {
                throw new \Exception("Game data not valid, resource does not exist: " . $key);
            }
        }
    }

?>