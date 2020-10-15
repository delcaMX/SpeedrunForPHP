<?php

    namespace speedruncom\games;
    
    class GamesLoader extends \Loader
    {
        private $filters;
        private $orderBy;
        private $direction;
        
        public function __construct()
        {
            parent::__construct();
            
            $this->getStrings(__DIR__ . "/games.ini");
            
            $this->filters = [];
            $this->orderBy = "";
            $this->direction = "";
            
            $this->resetFilters();
            $this->resetOrderBy();
        }
        
        public function resetOrderBy()
        {
            $this->orderBy = SRC_GAMES_NAME_INT;
            $this->direction = SRC_GAMES_DIRECTION_DESC;
        }
        
        public function setOrderBy($order = "", $direction = "")
        {
            if($order == null || $direction == null)
            {
                throw new \Exception("Parameter is null");
            }
            
            $this->orderBy = $order;
            $this->direction = $direction;
        }
        
        public function resetFilters()
        {
            $this->filters = array(
                SRC_GAMES_NAME => "",
                SRC_GAMES_ABBREVIATION => "",
                SRC_GAMES_RELEASED => "",
                SRC_GAMES_GAMETYPE => "",
                SRC_GAMES_PLATFORM => "",
                SRC_GAMES_REGION => "",
                SRC_GAMES_GENRE => "",
                SRC_GAMES_ENGINE => "",
                SRC_GAMES_DEVELOPER => "",
                SRC_GAMES_PUBLISHER => "",
                SRC_GAMES_MODERATOR => "",
                SRC_GAMES_ROMHACK => "",
                SRC_GAMES_BULK => "");
        }
        
        private function getQueryDetails()
        {
            $filtersString = "";
            
            foreach ($this->filters as $key => $val)
            {
                if($val != "")
                {
                    if($filtersString == "")
                    {
                        $filtersString = "?";
                    }
                    else
                    {
                        $filtersString = $filtersString . "&";
                    }
                    
                    $filtersString = $filtersString . $key . "=" . $val;
                }
            }
            
            if($this->orderBy != "" && $this->direction != "")
            {
                if($filtersString == "")
                {
                    $filtersString = "?";
                }
                else
                {
                    $filtersString = $filtersString . "&";
                }
                
                $filtersString = $filtersString . SRC_GAMES_ORDER_BY . "=" . $this->orderBy . "&" . SRC_GAMES_DIRECTION . "=" . $this->direction;
            }
            
            return $filtersString;
        }
        
        public function setFilter($key = "", $val = "")
        {
            if($key == null || $val == null)
            {
                throw new \Exception("Parameter is null");
            }
            
            if (!array_key_exists($key, $this->filters))
            {
                throw new \Exception("Filter " . $key . " does not exist");
            }
            
            $this->filters[$key] = $val;
        }
        
        public function getGamesList()
        {
            return file_get_contents(SRC_API . "/" . SRC_VERSION . "/" . SRC_API_GAMES);
        }
        
        public function getGame($name = "")
        {
            $this->checkNullParameter($name);
            
            $url = SRC_API . "/" . SRC_VERSION . "/" . SRC_API_GAMES . "/" . $name . "?" . $this->getQueryDetails();
            
            $data = file_get_contents($url);
            
            
            return new Game($data);
        }
    }

?>