<?php   
    /**
     * describe a playlist
     */
    class Playlist {
        private $_id;
        private $_name;
        private $_totalNumberOfTracks;
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
         * Get the value of _name
         */ 
        public function getName()
        {
            return $this->_name;
        }
        

        /**
         * Get the value of _totalNumberOfTracks
         */ 
        public function getTotalNumberOfTracks()
        {
            return $this->_totalNumberOfTracks;
        }

        /**
         * Set the value of _name
         *
         */ 
        public function setPlaylist_name($name)
        {
            $this->_name = $name;
        }

        /**
         * Set the value of _id
         *
         */ 
        public function setPlaylist_id($id)
        {
            $this->_id = $id;
        }

        /**
         * Set the value of _totalNumberOfTracks
         *
         */ 
        public function setPlaylist_nb_music($totalNumberOfTracks)
        {
            $this->_totalNumberOfTracks = $totalNumberOfTracks;
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