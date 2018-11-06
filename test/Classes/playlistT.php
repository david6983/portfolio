<?php

class playlist {

    private $_host;
    private $_db;
    private $_user;
    private $_pass;
    private $_dbh;
    private $_id;
    private $_name;
    private $_totalNumberOfTracks;
    private $_tracks; //array of track objects

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

    private function _hydrate(array $data) {
        
    }

    /**
     * return a bootstrap array with all the music in the playlist
     * from the database
     */
    public function display(db $db) {
        
    }

    /**
     * Get the value of _id
     */
    public function get_id($id) {
        $donnee = get("playlist_id", $id, "playlist", "2key", "0");
        return $donnee;
    }

    /**
     * Get the value of _name
     */
    public function get_name($name) {
        $donnee = get("playlist_name", $name, "playlist", "2key", "1");
        return $donnee;
    }

    /**
     * Get the value of _totalNumberOfTracks
     */
    public function get_totalNumberOfTracks($totalNumberOfTracks) {
        $donnee = get("playlist_nb_music", $totalNumberOfTracks, "playlist", "2key", "2");
        return $donnee;
    }

    /**
     * Set the value of _name
     *
     */
    public function set_name($name) {
        $this->_name = $_name;
    }

    /**
     * Set the value of _totalNumberOfTracks
     *
     */
    public function set_totalNumberOfTracks($totalNumberOfTracks) {
        $this->_totalNumberOfTracks = $_totalNumberOfTracks;
    }

    public function get($Nom_champ, $Valeur, $Table, $BDD, $place) {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $BDD . '', 'root', '');
        foreach ($dbh->query('SELECT * FROM ' . $Table . ' WHERE ' . $Nom_champ . '=' . $Valeur . '') as $row) {
            return $row[$place];
        }
    }
  
}

?>