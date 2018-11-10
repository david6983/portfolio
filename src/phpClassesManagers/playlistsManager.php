<?php   
    class PlaylistsManager {
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

        public function addPlaylist($name,$user){
            $requete = "INSERT INTO `playlist` (`playlist_id`, `playlist_name`, `playlist_nb_music`, `user_id`) 
            VALUES (NULL, '$name', 0, $user)";
            $this->_dbh->exec($requete) or die(print_r($this->_dbh->errorInfo(), true));
        }

        public function deletePlaylist($id){
            $requete = 'DELETE FROM `playlist` WHERE `playlist_id`=' . $id . '';
            $this->_dbh->exec($requete);
        }

        public function getPlaylist($id){
            $request = "SELECT * FROM `playlist` WHERE `playlist`.'playlist_id' = $id ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Playlist($result); 
        }

        public function updatePlaylist(Playlist $playlist){
            $request="UPDATE `playlist` 
            SET `playlist_id` = ".$playlist->getId().", 
            `playlist_name` = '".$playlist->getName()."', 
            `playlist_nb_music` = ".$playlist->getTotalNumberOfTracks().", 
            `playlist_userId` = ".$playlist->getUserId().",
            WHERE `playlist`.`playlist_id` = ".$playlist->getId();
            $this->_dbh->exec($request);
        }
    }
?>