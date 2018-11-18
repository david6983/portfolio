<?php   
    /**
     * manage the 'music' table in the database
     */
    class TracksManager {
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
         * add a track to the BDD
         * 
         * @param {string} $path
         * @param {string} $userId
         */
        public function addTrack($path,$userId){
            $path2 = str_replace("\\","\\\\",$path);
            $request = "INSERT INTO music (`music_id`, `music_name`, `music_artists_names`, `music_path`, `music_genre`, `music_key`, `music_bpm`, `music_length`, `user_id`) 
            VALUES (NULL, '', '',\"$path2\", '', '', 0, NULL,'$userId')";
            $this->_dbh->exec($request) or die(print_r($this->_dbh->errorInfo(), true));
        }
        /**
         * delete a track from the BDD
         * 
         * @param {string} $name
         */
        public function deleteTrack($name){
            $request = "DELETE FROM music WHERE music_name= '$name' ";
            $this->_dbh->exec($request);
        }
        /**
         * delete a track by it id
         * 
         * @param {string} $id
         */
        public function deleteTrackById($id){
            $request = "DELETE FROM music WHERE music_id= '$id' ";
            $this->_dbh->exec($request);
        }
        /**
         * get a track by name
         * 
         * @param {string} $name
         * @return {object} new track
         */
        public function getTrack($name){
            $request = "SELECT * FROM music WHERE music_name= \"$name\" ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Track($result);
        }
        /**
         * get a track by id
         * 
         * @param {string}
         * @return {object}
         */
        public function getTrackById($id){
            $request = "SELECT * FROM music WHERE music_id= '$id' ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Track($result);
        }
        /**
         * get a track by it path
         * 
         * @param {string} $path
         * @return {object} new track
         */
        public function getTrackByPath($path){
            $path2 = str_replace("\\","\\\\",$path);
            $request = "SELECT * FROM music WHERE music_path= \"$path2\" ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return new Track($result);
        }
        /**
         * update a track
         * 
         * @param {object} track
         */
        public function updateTrack(Track $music){
            $path2 = str_replace("\\","\\\\",$music->getPath());
            $request="UPDATE music 
            SET music_id = \"".$music->getId()."\", 
            music_name = \"".$music->getName()."\", 
            music_artists_names = \"".$music->getArtists()."\",  
            music_path = \"".$path2."\",
            music_genre = \"".$music->getGenre()."\",
            music_key = \"".$music->getKey()."\",
            music_bpm = ".$music->getBpm().",
            music_length = \"".$music->getLength()."\"
            WHERE music_id = \"".$music->getId()."\"";
            $this->_dbh->exec($request);
        }
        /**
         * get all track of the user 
         * 
         * @param {string} user id
         * @return {json} json string 
         */
        public function getAllTrackFromUser($user_id){
            $request = "SELECT * FROM music WHERE user_id= \"$user_id\" ";
            $result = array();
            foreach($this->_dbh->query($request) as $raw){
               array_push($result,$raw);
            }
            return json_encode($result);
        }
        
    }
?>