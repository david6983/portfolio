<?php   
    class Track {
        private $_id;
        private $_name;
        private $_artists;
        private $_genre;
        private $_path;
        private $_key;
        private $_lenght;
        private $_bpm;
        private $_userId;
        
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
        public function setId($_id)
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
        public function setName($name)
        {
            $this->_name = $_name;
        }

        /**
         * Get the value of _artists
         */ 
        public function getArtists()
        {
            return $this->_artists;
        }

        /**
         * Set the value of _artists
         */ 
        public function setArtists($artists)
        {
            $this->_artists = $_artists;
        }

        /**
         * Get the value of _genre
         */ 
        public function getGenre()
        {
            return $this->_genre;
        }

        /**
         * Set the value of _genre
         */ 
        public function setGenre($genre)
        {
            $this->_genre = $_genre;
        }

        /**
         * Get the value of _path
         */ 
        public function getPath()
        {
            return $this->_path;
        }

        /**
         * Set the value of _path
         */ 
        public function setPath($path)
        {
            $this->_path = $_path;
        }

        /**
         * Get the value of _key
         */ 
        public function get_Key()
        {
            return $this->_key;
        }

        /**
         * Set the value of _key
         */ 
        public function setKey($key)
        {
            $this->_key = $_key;
        }

        /**
         * Get the value of _lenght
         */ 
        public function getLenght()
        {
            return $this->_lenght;
        }

        /**
         * Set the value of _lenght
         */ 
        public function setLenght($lenght)
        {
            $this->_lenght = $length;
        }

        /**
         * Get the value of _bpm
         */ 
        public function getBpm()
        {
            return $this->_bpm;
        }

        /**
         * Get the value of _bpm
         */ 
        public function setBpm($bpm)
        {
            $this->_bpm = $bpm;
        }

        /**
         * Set the value of _userId
         *
         */ 
        public function setUserId($userId)
        {
            $this->_userId = $userId;
        }

        /**
         * Get the value of _userId
         */ 
        public function getUserId()
        {
            return $this->_userId;
        }

    }
?>