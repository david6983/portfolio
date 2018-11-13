<?php   
    class TracksManager {
        private $_host; 
        private $_db; 
        private $_user; 
        private $_pass; 
        private $_dbh;

        public function __construct($host,$db,$user,$pass){
            $this->_host = $host;
            $this->_db = $db;
            $this->_user = $user;
            $this->_pass = $pass;
        }

        public function connect(){
            try {
                $this->_dbh = new PDO('mysql:host='.$this->_host.';dbname='.$this->_db,$this->_user,$this->_pass);
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function addTrack($path,$userId){
            $request = "INSERT INTO music (`music_id`, `music_name`, `music_artists_names`, `music_path`, `music_genre`, `music_key`, `music_bpm`, `music_length`, `user_id`) 
            VALUES (NULL, '', '',\"$path\", '', '', 0, NULL,'$userId')";
            $this->_dbh->exec($request) or die(print_r($this->_dbh->errorInfo(), true));
        }

        public function deleteTrack($name){
            $request = "DELETE FROM music WHERE music_name= '$name' ";
            $this->_dbh->exec($request);
        }

        public function deleteTrackById($id){
            $request = "DELETE FROM music WHERE music_id= '$id' ";
            $this->_dbh->exec($request);
        }

        public function getTrack($name){
            $request = "SELECT * FROM music WHERE music_name= \"$name\" ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Track($result);
        }
        public function getTrackById($id){
            $request = "SELECT * FROM music WHERE music_id= '$id' ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Track($result);
        }
        public function getTrackByPath($path){
            $request = "SELECT * FROM music WHERE music_path= \"$path\" ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Track($result);
        }

        public function updateTrack(Track $music){
            $request="UPDATE music 
            SET music_id = \"".$music->getId()."\", 
            music_name = \"".$music->getName()."\", 
            music_artists_names = \"".$music->getArtists()."\",  
            music_path = \"".$music->getPath()."\",
            music_genre = \"".$music->getGenre()."\",
            music_key = \"".$music->getKey()."\",
            music_bpm = ".$music->getBpm().",
            music_length = \"".$music->getLength()."\"
            WHERE music_id = \"".$music->getId()."\"";
            $this->_dbh->exec($request);
        }
    }
?>