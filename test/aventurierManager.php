<?php 
    /*
    function chargeClasse($classe){
        require $classe.'.php';
    }
    //On enregistre la fonction en autoload pour qu'elle 
    //soit appelée dès qu'on instanciera une classe non déclarée.
    spl_autoload_register('chargeClasse');

    chargeClasse("aventurier");
    */
    class AventurierManager {
        /* attributs */
        private $_host; /* nom de l'host */
        private $_db; /* nom de la bdd */
        private $_user; /* nom de l'user */
        private $_pass; /* nom du mot de passe */
        private $_dbh; /* instance de connexion de la bdd */

        public function __construct($host,$db,$user,$pass){
            $this->_host = $host;
            $this->_db = $db;
            $this->_user = $user;
            $this->_pass = $pass;
        }

        /**
         * ajoute un aventurier dans la bdd
         * @param Aventurier $aventurier 
         */
        public function ajouteAventurier($nom,$exp,$pv){
            $requete = "INSERT INTO `aventurier` 
            (`Id`, `Nom`, `Exp`, `Pv`) 
            VALUES (NULL, '$nom', $exp, $pv)";            
            $this->_dbh->exec($requete); 
        }

        /**
         * efface l'aventurier demandé dans la bdd
         * @param Aventurier $aventurier celui à effacer 
         */
        public function effaceAventurier(Aventurier $aventurier){
            $requete = "DELETE FROM `aventurier` WHERE `aventurier`.`Id` = ".$aventurier->getId();
            $this->_dbh->exec($requete);
        }

        /**
         * renvoie une nouvelle instance d'un Aventurier à partir d'un nom dans la bdd
         * @param STRING $nom nom de l'aventurier à crée
         */
        public function recupereAventurier($nom){
            $requete = "SELECT * FROM `aventurier` WHERE `aventurier`.`Nom` = '$nom' ";
            $result = array();
            foreach($this->_dbh->query($requete) as $raw){
               array_push($result,$raw);
            }
            return new Aventurier($result);
        }
        
        /**
         * update l'aventurier à partir de la bdd
         * @param Aventurier $aventurier celui à mettre à jour
         */
        public function updateAventurier(Aventurier $aventurier){
            $requete="UPDATE `aventurier` 
            SET `Id` = ".$aventurier->getId().", 
            `Nom` = '".$aventurier->getNom()."', 
            `Exp` = ".$aventurier->getExp().", 
            `Pv` = ".$aventurier->getPv().",
            WHERE `aventurier`.`Id` = ".$aventurier->getId();
            $this->_dbh->exec($requete);
        }
                
        /**
         * se connecte a la bdd a partir des attributs
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
    }
?>