<?php   
    class UsersManager {
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

        public function addUser($name){
            $request = "INSERT INTO `user` (`user_id`, `user_nb_playlists`, `user_nb_music`, `user_name`, `user_analysisPrecision`, `user_libraryPath`, `user_libraryName`) 
            VALUES (NULL, 0, 0, , '$name', 0, '', '')";
            $this->_dbh->exec($request) or die(print_r($this->_dbh->errorInfo(), true));    
        }

        public function deleteUser($name){
            $request = "DELETE FROM `user` WHERE `user`.'user_name' = $name";
            $this->_dbh->exec($request);
        }

        public function getUser($name){
            $request = "SELECT * FROM `user` WHERE `user`.'user_name' = $name ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new User($result);           
        }

        public function updateUser(User $user){
            $request="UPDATE `user` 
            SET `user_name` = ".$user->getName().", 
            `user_nb_playlists` = '".$user->getNbPlaylists()."', 
            `user_nb_music` = ".$user->getNbMusic().", 
            `user_analysisPrecision` = ".$user->getAnalysisPresicion().",
            `user_libraryPath` = ".$user->getLibraryPath().",
            `user_libraryName` = ".$user->getLibraryName().",
            WHERE `user`.`user_id` = ".$user->getId();
            $this->_dbh->exec($request);
        }
    }
?>