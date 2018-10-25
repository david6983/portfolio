<?php   

    class playlist {
        private $_id;
        private $_name;
        private $_totalNumberOfTracks;
        private $_tracks; //array of track objects

        public function __construct($data){
             
        }

        private function _hydrate(array $data){

        }

        /**
         * return a bootstrap array with all the music in the playlist
         * from the database
         */
        public function display(db $db){

        }

        /**
         * Get the value of _id
         */ 
        public function get_id()
        {
            return $this->_id;
        }


        /**
         * Get the value of _name
         */ 
        public function get_name()
        {
            return $this->_name;
        }

        /**
         * Get the value of _totalNumberOfTracks
         */ 
        public function get_totalNumberOfTracks()
        {
            return $this->_totalNumberOfTracks;
        }


        /**
         * Set the value of _name
         *
         */ 
        public function set_name($name)
        {
            $this->_name = $_name;
        }

        /**
         * Set the value of _totalNumberOfTracks
         *
         */ 
        public function set_totalNumberOfTracks($totalNumberOfTracks)
        {
            $this->_totalNumberOfTracks = $_totalNumberOfTracks;
        }
    }

?>