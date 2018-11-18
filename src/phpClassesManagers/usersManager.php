<?php   
    /**
     * manage the 'user' table in the database
     */
    class usersManager {
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
                $this->_dbh = new PDO('mysql:host='.$this->_host.';dbname='.$this->_db,$this->_user,$this->_pass);
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        /**
         * add a user
         * 
         * @param {string} name
         */
        public function addUser($name){
            $request = "INSERT INTO user (`user_id`, `user_nb_playlists`, `user_nb_music`, `user_name`, `user_analysisPrecision`, `user_libraryPath`, `user_libraryName`) 
            VALUES (NULL, 0, 0, '$name', 0, '', '')";
            $this->_dbh->exec($request) or die(print_r($this->_dbh->errorInfo(), true));    
        }
        /**
         * delete a user 
         * 
         * @param {string} name
         */
        public function deleteUser($name){
            $request = "DELETE FROM user WHERE user_name = '$name' ";
            $this->_dbh->exec($request);
        }
        /**
         * delete a user by id
         * 
         * @param {string} id
         */
        public function deleteUserById($id){
            $request = "DELETE FROM user WHERE user_id = '$id' ";
            $this->_dbh->exec($request);
        }
        /**
         * get a user 
         * 
         * @param {string} name
         * @return {object} user
         */
        public function getUser($name){
            $request = "SELECT * FROM user WHERE user_name = '$name'";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            $u = new User($result);
            return new User($result);           
        }
        /**
         * get a user by id
         * 
         * @param {string} id
         * @return {object} user
         */
        public function getUserById($id){
            $request = "SELECT * FROM user WHERE user_id = '$id'";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            $u = new User($result);
            return new User($result);           
        }
        /**
         * update a user
         * 
         * @param {object} user 
         */
        public function updateUser(User $user){
            $request="UPDATE user 
            SET user_nb_playlists = '".$user->getNbPlaylists()."', 
            user_nb_music = '".$user->getNbMusic()."', 
            user_name = '".$user->getName()."',  
            user_analysisPrecision = '".$user->getAnalysisPrecision()."',
            user_libraryPath = '".str_replace("\\","\\\\",$user->getLibraryPath())."',
            user_libraryName = '".$user->getLibraryName()."'
            WHERE user_name = '".$user->getName()."'";
            $this->_dbh->exec($request);
        }
        /**
         * create option from the user name
         */
        public function createOptionFromUserName(){
            $request="SELECT user_name FROM user ";
            foreach($this->_dbh->query($request) as $raw){
               echo "<option value=\"$raw[0]\">$raw[0]</option>";
            }
        }
        /**
         * export a user
         * 
         * @param {string} name
         * @return {array} attributes
         */
        public function exportUser($name){
            $request="SELECT * FROM user WHERE user_name = '$name'";
            $stmt = $this->_dbh->prepare($request);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0];
        }
    }
?>