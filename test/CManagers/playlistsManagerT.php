<?php

class playlist {

    private $_id;
    private $_name;
    private $_totalNumberOfTracks;
    private $_iduser;
    private $_dbh;
    private $_host;
    private $_db;
    private $_user;
    private $_pass;

    public function __construct($name, $totalNumberOfTracks, $iduser, $host, $db, $user, $pass) {
        $this->_name = $name;
        $this->_totalNumberOfTracks = $totalNumberOfTracks;
        $this->_iduser = $iduser;

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

    public function ajoutePlaylist() {
        $requete = "INSERT INTO `playlist` (`playlist_id`, `playlist_name`, `playlist_nb_music`, `user_id`) 
            VALUES (NULL, '$this->_name', $this->_totalNumberOfTracks, $this->_iduser)";
        $this->_dbh->exec($requete) or die(print_r($this->_dbh->errorInfo(), true));
    }

    public function recuperePlaylist($valeur) {
        $requete = 'SELECT * FROM `playlist` WHERE `playlist_id`=' . $valeur . '';
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

    public function effacePlaylist($valeur) {
        $requete = 'DELETE FROM `playlist` WHERE `playlist_id`=' . $valeur . '';
        $this->_dbh->exec($requete);
    }

}

?>