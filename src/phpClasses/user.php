<?php 
    class User {
        private $_id;
        private $_name;
        private $_nbPlaylists;
        private $_nbMusic;
        private $_analysisPrecision;
        private $_libraryPath;
        private $_libraryName;
        //private $_playlists; //array of playlists

        public function __construct($data){
            $this->_hydrate($data[0]);
        }

        /* methodes d'hydratations  */
        private function _hydrate(array $data){
            foreach($data as $key => $value){
                //on recupere le nom du setter correspondant à l'attribut
                $method = 'set'.ucfirst($key);
                //si le settler correspondant existe
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }

        /**
         * Get the value of _id
         */ 
        public function getId()
        {
            return $this->_id;
        }

        /**
         * Set the value of _id
         */ 
        public function setUser_id($_id)
        {
            $this->_id = $_id;
        }

        /**
         * Get the value of _name
         */ 
        public function getName()
        {
            return $this->_name;
        }

        /**
         * Set the value of _name
         */ 
        public function setUser_name($_name)
        {
            $this->_name = $_name;
        }

        /**
         * Get the value of _nbPlaylists
         */ 
        public function getNbPlaylists()
        {
            return $this->_nbPlaylists;
        }

        /**
         * Set the value of _nbPlaylists
         */ 
        public function setUser_nb_playlists($_nbPlaylists)
        {
            $this->_nbPlaylists = $_nbPlaylists;
        }

        /**
         * Get the value of _nbMusic
         */ 
        public function getNbMusic()
        {
            return $this->_nbMusic;
        }

        /**
         * Set the value of _nbMusic
         */ 
        public function setUser_nb_music($_nbMusic)
        {
            $this->_nbMusic = $_nbMusic;
        }

        /**
         * Get the value of _analysisPrecision
         */ 
        public function getAnalysisPrecision()
        {
            return $this->_analysisPrecision;
        }

        /**
         * Set the value of _analysisPrecision
         */ 
        public function setUser_analysisPrecision($_analysisPrecision)
        {
            $this->_analysisPrecision = $_analysisPrecision;
        }

        /**
         * Get the value of _libraryPath
         */ 
        public function getLibraryPath()
        {
            return $this->_libraryPath;
        }

        /**
         * Set the value of _libraryPath
         */ 
        public function setUser_libraryPath($_libraryPath)
        {
            $this->_libraryPath = $_libraryPath;
        }

        /**
         * Get the value of _libraryName
         */ 
        public function getLibraryName()
        {
            return $this->_libraryName;
        }

        /**
         * Set the value of _libraryName
         */ 
        public function setUser_libraryName($_libraryName)
        {
            $this->_libraryName = $_libraryName;
        }

    
    }
?>