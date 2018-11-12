<?php   
    /**
     * manage the 'playlist' table in the database
     */
    class playlistsManager {
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
         * add a playlist in the database
         * 
         * @param {string} $name name of your playlist
         * @param {integer} $user the user to whom the playlist belongs
         */
        public function addPlaylist($name,$user){
            $requete = "INSERT INTO playlist (`playlist_id`, `playlist_name`, `playlist_nb_music`, `user_id`) 
            VALUES (NULL, '$name', 0, '$user')";
            /* exec the request or print the error message */
            $this->_dbh->exec($requete) or die(print_r($this->_dbh->errorInfo(), true));
        }

        public function deletePlaylist($name){
            $requete = "DELETE FROM playlist WHERE playlist_name = '$name' ";
            $this->_dbh->exec($requete);
        }

        public function getPlaylist($name){
            $request = "SELECT * FROM playlist WHERE playlist_name = '$name' ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Playlist($result); 
        }

        public function updatePlaylist(Playlist $playlist){
            $request="UPDATE `playlist` 
            SET playlist_id = '".$playlist->getId()."', 
            playlist_name = '".$playlist->getName()."', 
            playlist_nb_music = '".$playlist->getTotalNumberOfTracks()."', 
            playlist_userId = '".$playlist->getUserId()."'
            WHERE playlist_name = '".$playlist->getId()."'";
            $this->_dbh->exec($request);
        }
        public function getPlaylistNames($user_id){
            $request = "SELECT playlist_name,playlist_nb_music FROM playlist WHERE user_id = '$user_id' ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return json_encode($result); 
        }
    }
?>