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

    public function __construct($id, $name, $artists, $genre, $path, $key, $lenght, $bpm, $host, $db, $user, $pass) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_artists = $artists;
        $this->_genre = $genre;
        $this->_key = $key;
        $this->_lenght = $lenght;
        $this->_path = $path;
        $this->_bpm = $bpm;
    }

    public function isAvailable() {
        
    }

    /**
     * Get the value of _id
     */
    public function get_idt($id) {
        $donnee = getT("music_id", $id, "music", "2key", "0");
        return $donnee;
    }

    /**
     * Get the value of _name
     */
    public function get_namet($name) {
        $donnee = getT("music_name", $name, "music", "2key", "1");
        return $donnee;
    }

    /**
     * Get the value of _artists
     */
    public function get_artists($artists) {
        $donnee = getT("music_artists_name", $artists, "music", "2key", "2");
        return $donnee;
    }

    /**
     * Get the value of _genre
     */
    public function get_genre($genre) {
        $donnee = getT("music_genre", $genre, "playlist", "2key", "4");
        return $donnee;
    }

    /**
     * Get the value of _path
     */
    public function get_path($path) {
        $donnee = getT("music_path", $path, "music", "2key", "3");
        return $donnee;
    }

    /**
     * Get the value of _key
     */
    public function get_key($key) {
        $donnee = getT("music_key", $key, "music", "2key", "5");
        return $donnee;
    }
    
    /**
     * Get the value of _lenght
     */
    public function get_lenght($lenght) {
        $donnee = getT("music_lenght", $lenght, "music", "2key", "7");
        return $donnee;
    }

    /**
     * Get the value of _bpm
     */
    public function get_bpm($bpm) {
        $donnee = getT("music_bpm", $bpm, "music", "2key", "6");
        return $donnee;
    }

    public function getT($Nom_champ, $Valeur, $Table, $BDD, $place) {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $BDD . '', 'root', '');
        foreach ($dbh->query('SELECT * FROM ' . $Table . ' WHERE ' . $Nom_champ . '=' . $Valeur . '') as $row) {
            return $row[$place];
        }
    }

}

?>