<?php   
    /**
     * describe a track
     */
    class Track {
        private $_id;
        private $_name;
        private $_artists;
        private $_genre;
        private $_path;
        private $_key;
        private $_length;
        private $_bpm;
        private $_userId;
        
        public function __construct($data){
            /* call all the setter */
            $this->_hydrate($data[0]);
        }

        /**
         * call all the setter
         * 
         * @param {array} $data from the database
         */
        private function _hydrate(array $data){
            /* for each attributs in the database */
            foreach($data as $key => $value){
                //get the setter name of the attributs
                $method = 'set'.ucfirst($key);
                //if the setter exist 
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
        public function setMusic_id($id)
        {
            $this->_id = $id;
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
        public function setMusic_name($name)
        {
            $this->_name = $name;
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
        public function setMusic_artists_names($artists)
        {
            $this->_artists = $artists;
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
        public function setMusic_genre($genre)
        {
            $this->_genre = $genre;
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
        public function setMusic_path($path)
        {
            $this->_path = $path;
        }

        /**
         * Get the value of _key
         */ 
        public function getKey()
        {
            return $this->_key;
        }

        /**
         * Set the value of _key
         */ 
        public function setMusic_key($key)
        {
            $this->_key = $key;
        }

        /**
         * Get the value of _length
         */ 
        public function getLength()
        {
            return $this->_length;
        }

        /**
         * Set the value of _length
         */ 
        public function setMusic_length($length)
        {
            $this->_length = $length;
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
        public function setMusic_bpm($bpm)
        {
            $this->_bpm = $bpm;
        }

        /**
         * Set the value of _userId
         *
         */ 
        public function setUser_id($userId)
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