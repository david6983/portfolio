<?php

class user {

    private $_id;
    private $_name;
    private $_isAdmin;
    private $_nbPlaylists;
    private $_nbMusic;
    private $_aPre;
    private $_lPath;
    private $_lName;

    public function __construct($id, $name, $mdp, $isAdmin, $nbPlaylists, $nbMusic, $apre, $lName, $lPath) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_isAdmin = $isAdmin;
        $this->_nbPlaylists = $nbPlaylists;
        $this->_nbMusic = $nbMusic;
        $this->_aPre = $apre;
        $this->_lName = $lName;
        $this->_lPath = $lPath;
    }
 public function get_idu($id) {
        $donnee = getU("user_id", $id, "user", "2key", "0");
        return $donnee;
    }

    public function get_nameu($name) {
        $donnee = getU("user_name", $name, "user", "2key", "3");
        return $donnee;
    }

    public function get_nbPlaylists($nbPlaylists) {
        $donnee = getU("user_nb_playlists", $nbPlaylists, "user", "2key", "1");
        return $donnee;
    }

    public function get_nbMusic($nbMusic) {
        $donnee = getU("user_nb_music", $nbMusic, "user", "2key", "2");
        return $donnee;
    }

    public function get_aPre($aPre) {
        $donnee = getU("user_analisysPrecision", $aPre, "user", "2key", "4");
        return $donnee;
    }

    public function get_lPath($lPath) {
        $donnee = getT("user_libraryPath", $lPath, "user", "2key", "7");
        return $donnee;
    }

    public function get_nPath($nPath) {
        $donnee = getT("user_libraryPath", $nPath, "user", "2key", "6");
        return $donnee;
    }

    public function getU($Nom_champ, $Valeur, $Table, $BDD, $place) {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $BDD . '', 'root', '');
        foreach ($dbh->query('SELECT * FROM ' . $Table . ' WHERE ' . $Nom_champ . '=' . $Valeur . '') as $row) {
            return $row[$place];
        }
    }

}

?>