<?php
    
    namespace speedruncom\games;
    
    class Game extends \speedruncom\resources\Resource
    {
        protected $id;
        protected $names;
        protected $abbreviation;
        protected $weblink;
        protected $released;
        protected $releaseDate;
        protected $ruleset;
        protected $romhack;
        protected $gametypes;
        protected $platforms;
        protected $regions;
        protected $genres;
        protected $engines;
        protected $developers;
        protected $publishers;
        protected $moderators;
        protected $created;
        protected $assets;
        protected $links;
        
        public function __construct($data = null)
        {   
            $data = $this->formatData($data);
            
            $this->getStrings(__DIR__ . "/games.ini");
                    
            $this->id = $this->getFromData($data, SRC_GAMES_ID);
            $this->names = $this->getFromData($data, SRC_GAMES_NAMES);
            $this->abbreviation = $this->getFromData($data, SRC_GAMES_ABBREVIATION);
            $this->weblink = $this->getFromData($data, SRC_GAMES_WEBLINK);
            $this->released = $this->getFromData($data, SRC_GAMES_RELEASED);
            $this->releaseDate = $this->getFromData($data, SRC_GAMES_RELEASE_DATE);
            $this->ruleset = $this->getFromData($data, SRC_GAMES_RULESET);
            $this->romhack = $this->getFromData($data, SRC_GAMES_ROMHACK);
            $this->gametypes = $this->getFromData($data, SRC_GAMES_GAMETYPES);
            $this->platforms = $this->getFromData($data, SRC_GAMES_PLATFORMS);
            $this->regions = $this->getFromData($data, SRC_GAMES_REGIONS);
            $this->genres = $this->getFromData($data, SRC_GAMES_GENRES);
            $this->engines = $this->getFromData($data, SRC_GAMES_ENGINES);
            $this->developers = $this->getFromData($data, SRC_GAMES_DEVELOPERS);
            $this->publishers = $this->getFromData($data, SRC_GAMES_PUBLISHERS);
            $this->moderators = $this->getFromData($data, SRC_GAMES_MODERATORS);
            $this->created = $this->getFromData($data, SRC_GAMES_CREATED);
            $this->assets = $this->getFromData($data, SRC_GAMES_ASSETS);
            $this->links = $this->getFromData($data, SRC_GAMES_LINKS);
        }
    }
?>