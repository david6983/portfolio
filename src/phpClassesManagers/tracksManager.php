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
            $requete = "INSERT INTO music (`music_id`, `music_name`, `music_artists_names`, `music_path`, `music_genre`, `music_key`, `music_bpm`, `music_lenght`, `user_id`) 
            VALUES (NULL, '', '',\"$path\", '', '', NULL, NULL,'$userId')";
            $this->_dbh->exec($requete) or die(print_r($this->_dbh->errorInfo(), true));
        }

        public function deleteTrack($name){
            $requete = "DELETE FROM music WHERE music_name= '$name' ";
            $this->_dbh->exec($requete);
        }

        public function getTrack($name){
            $requete = "SELECT * FROM music WHERE music_name= '$name' ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Track($result);
        }

        public function updateTrack(Track $music){
            $request="UPDATE `music 
            SET music_id = '".$music->getId()."', 
            music_name = '".$music->getName()."', 
            music_artists_name = '".$music->getArtists()."', 
            music_path = '".$music->getPath()."', 
            music_genre = '".$music->getGenre()."', 
            music_key = '".$music->getKey()."', 
            music_bpm = '".$music->getBpm()."', 
            music_lenght = '".$music->getLenght()."', 
            user_id = '".$music->getUserId()."'
            WHERE `music`.`music_id` = ".$music->getId()."'";
            $this->_dbh->exec($request);
            
        }
    }
?>