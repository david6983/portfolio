<?php

class playlist {

    private $_name;
    private $_totalNumberOfTracks;
    private $_tracks; //array of track objects

    public function __construct($name, $totalNumberOfTracks, $tracks) {
        $this->_name = $name;
        $this->_totalNumberOfTracks = $totalNumberOfTracks;
        $this->_tracks = $tracks;
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
        $donnee = getP("playlist_id", $id, "playlist", "2key", "0");
        return $donnee;
    }

    /**
     * Get the value of _name
     */
    public function get_name($name) {
        $donnee = getP("playlist_name", $name, "playlist", "2key", "1");
        return $donnee;
    }

    /**
     * Get the value of _totalNumberOfTracks
     */
    public function get_totalNumberOfTracks($totalNumberOfTracks) {
        $donnee = getP("playlist_nb_music", $totalNumberOfTracks, "playlist", "2key", "2");
        return $donnee;
    }

    public function getP($Nom_champ, $Valeur, $Table, $BDD, $place) {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $BDD . '', 'root', '');
        foreach ($dbh->query('SELECT * FROM ' . $Table . ' WHERE ' . $Nom_champ . '=' . $Valeur . '') as $row) {
            return $row[$place];
        }
    }
  
}

?>