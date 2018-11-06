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
        
        public function __construct($id,$name,$artists,$genre,$path,$key,$lenght,$bpm){
            $this->_id = $id;
            $this->_name = $name;
            $this->_artists = $artists;
            $this->_genre = $genre;
            $this->_key = $key;
            $this->_lenght = $lenght;
            $this->_path = $path;
            $this->_bpm = $bpm;
        }
    }
?>