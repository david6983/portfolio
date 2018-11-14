<?php   
    /**
     * manage the 'contient' table in the database
     */
    class contientManager {
        private $_host; 
        private $_db; 
        private $_user; 
        private $_pass; 
        private $_dbh; 

        /**
         * set all the attribute
         * @param {string} $host name of the host for the database
         * @param {string} $db name of the database
         * @param {string} $user username
         * @param {string} $pass password
         */
        public function __construct($host,$db,$user,$pass){
            $this->_host = $host;
            $this->_db = $db;
            $this->_user = $user;
            $this->_pass = $pass;
        }

        /**
         * connection to the data base by using the PDO object
         */
        public function connect(){
            try {
                /* try to create a new PDO from the attributs given */
                $this->_dbh = new PDO('mysql:host='.$this->_host.';dbname='.$this->_db,$this->_user,$this->_pass);
            }
            catch(PDOException $e)
            {
                /* on failed , echo an error message */
                echo "Connection failed: " . $e->getMessage();
            }
        }

        /**
         * add a track to a playlist based on the 'contient' table
         * 
         * @param {integer} $idTrack
         * @param {integer} $idPlaylist
         */
        public function addTrackToPlaylist($idTrack,$idPlaylist){
            /* new SQL request */
            $request="INSERT INTO `contient` (`playlist_id`, `music_id`) VALUES ($idPlaylist,$idTrack)";
            /* execute the request */
            $this->_dbh->exec($request);
        }

        /**
         * return an array of all the music_id in a playlist
         * 
         * @param {integer} $idPlaylist id of the playlist
         * @return {array} $arrayOfTracks
         */
        public function selectTracksFromPlaylist($idPlaylist){
            $request = "SELECT 'music_id' FROM 'contient' WHERE 'playlist_id' == $idPlaylist ";
            $arrayOfTracks = array(); /* output array */
            /* for each track finded */
            foreach($this->_dbh->query($request) as $raw){
                /* add it to the output array */
                array_push($arrayOfTracks,$raw);
            }
            return $arrayOfTracks; 
        }

        public function getNumberOfTrackOfPlaylist($idPlaylist){
            $request = "SELECT count(*) FROM contient WHERE playlist_id = '$idPlaylist'";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
                array_push($result,$raw);
            }
            return intval($result[0][0]);
        }
    }
?>