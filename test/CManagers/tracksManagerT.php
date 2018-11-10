<?php

class track {

    private $_id;
    private $_name;
    private $_artists;
    private $_genre;
    private $_path;
    private $_key;
    private $_lenght;
    private $_bpm;
    private $_host;
    private $_db;
    private $_user;
    private $_pass;

    public function __construct($id, $name, $artists, $genre, $path, $key, $lenght, $bpm, $host, $db, $user, $pass) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_artists = $artists;
        $this->_genre = $genre;
        $this->_key = $key;
        $this->_lenght = $lenght;
        $this->_path = $path;
        $this->_bpm = $bpm;

        $this->_host = $host;
        $this->_db = $db;
        $this->_user = $user;
        $this->_pass = $pass;
    }
    
        public function connect() {
        try {
            $this->_dbh = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_db . '', $this->_user, $this->_pass);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function ajouteTracks() {
        $requete = "INSERT INTO `music` (`music_id`, `music_name`, `music_artists_name`, `music_path`, `music_genre`, `music_key`, `music_bpm`, `music_lenght`, `id_user`) 
            VALUES (NULL, '$this->_name', '$this->_artists', , '$this->_genre', '$this->_key', '$this->_lenght', '$this->_path', $this->_bpm,$this->_iduser)";
        $this->_dbh->exec($requete) or die(print_r($this->_dbh->errorInfo(), true));
    }

    public function recupereTracks($valeur) {
        $requete = 'SELECT * FROM `music` WHERE `music_id`=' . $valeur . '';
        foreach ($this->_dbh->query($requete) as $raw) {
            return $raw;
        }
    }
    
        /*public function updatePlaylist() {
        $requete = "UPDATE `playlist` 
            SET `Id` = " . $this->get_id($this->_id) . ", 
            `Name` = '" . $this->get_name($this->_name) . "', 
            `totalNumberOfTracks` = " . $this->get_totalNumberOfTracks($this->_totalNumberOfTracks) . ", 
            WHERE `playlist`.`Id` = " . $this->getId();
        $this->_dbh->exec($requete);
    }*/

    public function effaceTracks($valeur) {
        $requete = 'DELETE FROM `music` WHERE `music_id`=' . $valeur . '';
        $this->_dbh->exec($requete);
    }

}

?>