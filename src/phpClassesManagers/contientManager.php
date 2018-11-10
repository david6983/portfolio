<?php   
    class contientManager {
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

        public function addTrackToPlaylist($idTrack,$idPlaylist){
            $request="INSERT INTO `contient` (`playlist_id`, `music_id`) VALUES ($idPlaylist,$idTrack)";
        }

        public function selectTracksFromPlaylist($idPlaylist){
            $request = "SELECT 'music_id' FROM 'contient' WHERE 'playlist_id' == $idPlaylist ";
            $arrayOfTracks = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($arrayOfTracks,$raw);
            }
            return $arrayOfTracks; 
        }
    }
?>