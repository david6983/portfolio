<?php   

    class Playlist {
        private $_id;
        private $_name;
        private $_totalNumberOfTracks;
        private $_userId;
        //private $_tracks; //array of track objects

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
            $this->_name = $_name;
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
            $this->_totalNumberOfTracks = $_totalNumberOfTracks;
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