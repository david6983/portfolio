<?php   
    class track {
        private $_id;
        private $_name;
        private $_artists;
        private $_genre;
        private $_path; 
        private $_key;
        private $_lenght;
        private $_bpm;

        /**
         * check if a file isAvailable in the library 
         * 
         * @return bool isAvailable or not
         */
        public function isAvailable(){
            if( file_exists($this->get_path()) ){
                return true;
            }else{
                return false;
            }
        }
      
        /**
         * Get the value of _id
         */ 
        public function get_id()
        {
            return $this->_id;
        }

        /**
         * Set the value of _id
         */ 
        public function set_id($_id)
        {
            $this->_id = $_id;
        }

        /**
         * Get the value of _name
         */ 
        public function get_name()
        {
            return $this->_name;
        }

        /**
         * Set the value of _name
         */ 
        public function set_name($name)
        {
            $this->_name = $_name;
        }

        /**
         * Get the value of _artists
         */ 
        public function get_artists()
        {
            return $this->_artists;
        }

        /**
         * Set the value of _artists
         */ 
        public function set_artists($artists)
        {
            $this->_artists = $_artists;
        }

        /**
         * Get the value of _genre
         */ 
        public function get_genre()
        {
            return $this->_genre;
        }

        /**
         * Set the value of _genre
         */ 
        public function set_genre($genre)
        {
            $this->_genre = $_genre;
        }

        /**
         * Get the value of _path
         */ 
        public function get_path()
        {
            return $this->_path;
        }

        /**
         * Set the value of _path
         */ 
        public function set_path($path)
        {
            $this->_path = $_path;
        }

        /**
         * Get the value of _key
         */ 
        public function get_key()
        {
            return $this->_key;
        }

        /**
         * Set the value of _key
         */ 
        public function set_key($key)
        {
            $this->_key = $_key;
        }

        /**
         * Get the value of _lenght
         */ 
        public function get_lenght()
        {
            return $this->_lenght;
        }



        /**
         * Get the value of _bpm
         */ 
        public function get_bpm()
        {
            return $this->_bpm;
        }


    }
?>