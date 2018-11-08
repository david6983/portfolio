<?php

class user {

    private $_id;
    private $_name;
    private $_mdp;
    private $_isAdmin;
    private $_nbPlaylists;
    private $_nbMusic;
    private $_aPre;
    private $_lPath;
    private $_lName;
    private $_host;
    private $_db;
    private $_user;
    private $_pass;

    public function __construct($id, $name, $mdp, $isAdmin, $nbPlaylists, $nbMusic, $apre, $lName, $lPath, $host, $db, $user, $pass) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_mdp = $mdp;
        $this->_isAdmin = $isAdmin;
        $this->_nbPlaylists = $nbPlaylists;
        $this->_nbMusic = $nbMusic;
        $this->_aPre = $apre;
        $this->_lName = $lName;
        $this->_lPath = $lPath;

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

    public function ajouteUser() {
        $requete = "INSERT INTO `user` (`user_id`, `user_nb_playlists`, `user_nb_music`, `user_name`, `user_analysisPrecision`, `user_libraryPath`, `user_libraryName`) 
            VALUES (NULL, $this->_nbPlaylists, $this->_nbMusic, , '$this->_name', $this->_aPre, '$this->_lPath', '$this->_lName')";
        $this->_dbh->exec($requete) or die(print_r($this->_dbh->errorInfo(), true));
    }

    public function recupereUser($valeur) {
        $requete = 'SELECT * FROM `user` WHERE `user_id`=' . $valeur . '';
        foreach ($this->_dbh->query($requete) as $raw) {
            return $raw;
        }
    }

    public function effaceUser($valeur) {
        $requete = 'DELETE FROM `user` WHERE `user_id`=' . $valeur . '';
        $this->_dbh->exec($requete);
    }

}

?>