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

        /**
         * se connecte a la bdd a partir des attributs
         */
        public function connect(){
            try {
                $this->_dbh = new PDO('mysql:host='.$this->_host.';dbname='.$this->_db,$this->_user,$this->_pass);
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function addUser(){

        }

        public function deleteUser(){

        }

        public function getUser(){
        
        }

        public function updateUser(){
            
        }
    }
?>