<?php
    include "Loader.php";
    
    class SpeedrunComLoader extends \Loader
    {       
        public $games;
        
        public function __construct()
        {
            parent::__construct();
            
            $this->getStrings(__DIR__ . "/speedruncom.ini");
            
            $this->games = new \speedruncom\games\GamesLoader();
        }
    }
    
?>