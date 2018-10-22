<?php 
    
class db {
    /* attributs */
    private $_host; /* nom de l'host */
    private $_db; /* nom de la bdd */
    private $_user; /* nom de l'user */
    private $_pass; /* nom du mot de passe */
    private $_dbh; /* instance de connexion de la bdd */

    /* methodes  */

    /**
     * constructeur 
     */
    public function __construct($host,$db,$user,$pass){
        $this->_host = $host;
        $this->_db = $db;
        $this->_user = $user;
        $this->_pass = $pass;
    }

    /**
     * se connecte a la bdd a partir des attributs
     */
    public function connect(){
        try {
            $this->_dbh = new PDO('mysql:host='.$this->_host.';dbname='.$this->_db,$this->_user,$this->_pass);
            echo "connexion reussi";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * renvoie un tableaux contenant tous les elements d'une table
     * @return resultat tableau d'elements
     */
    public function selectAll($table){
        $requete = "SELECT * FROM $table";
        $result = array();
        foreach($this->_dbh->query($requete) as $raw){
           array_push($result,$raw);
        }
        return $result;
    }

    /**
     * renvoie un tableaux contenant tous les elements d'une table
     * @return resultat tableau d'elements
     */
    public function selectAllWhere($table,$element, $value){
        $requete = "SELECT * FROM $table WHERE $element ='$value'";
        $result = array();
        foreach($this->_dbh->query($requete) as $row){
            $result = $row;
        }
        return $result;
    }

    
}

?>