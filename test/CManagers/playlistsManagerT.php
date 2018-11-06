<?php

class playlist {

    private $_id;
    private $_name;
    private $_totalNumberOfTracks;
    private $_tracks;
    private $_dbh;
    private $_host;
    private $_db;
    private $_user;
    private $_pass;

    public function __construct($id, $name, $totalNumberOfTracks, $tracks, $host, $db, $user, $pass) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_totalNumberOfTracks = $totalNumberOfTracks;
        $this->_tracks = $tracks;
        $this->_host = $host;
        $this->_db = $db;
        $this->_user = $user;
        $this->_pass = $pass;
    }

    public function ajoutePlaylist($id, $name, $totalNumberOfTracks, $tracks) {
        $requete = "INSERT INTO `playlist` 
            (`id`, `name`, `totalNumberOfTracks`, `tracks`) 
            VALUES ($id,$name,$totalNumberOfTracks, $tracks)";
        $this->_dbh->exec($requete);
    }

    public function effacePlaylist(playlist $playlist) {
        $requete = "DELETE FROM `playlist` WHERE `playlist`.`Id` = " . $playlist->getId();
        $this->_dbh->exec($requete);
    }

    public function recuperePlaylist($name) {
        $requete = "SELECT * FROM `playlist` WHERE `playlist`.`Name` = '$name' ";
        $result = array();
        foreach ($this->_dbh->query($requete) as $raw) {
            array_push($result, $raw);
        }
        return new playlist($result);
    }

    public function updatePlaylist(playlist $playlist) {
        $requete = "UPDATE `playlist` 
            SET `Id` = " . $playlist->getId() . ", 
            `Name` = '" . $playlist->getName() . "', 
            `totalNumberOfTracks` = " . $playlist->gettotalNumberOfTracks() . ", 
            `tracks` = " . $playlist->gettracks() . ",
            WHERE `playlist`.`Id` = " . $playlist->getId();
        $this->_dbh->exec($requete);
    }

    public function connect() {
        try {
            $this->_dbh = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_db, $this->_user, $this->_pass);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    


}
?>