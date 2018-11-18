<?php 
    /**
     * load all classes for user management
     */
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user");
    chargeClasse("../phpClassesManagers/usersManager");

    /** new manager */
    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();

    //delete the user requested
    $userMan->deleteUser($_POST["username"]);
    //redirect to connexion
    header("location: ../../index.php");
?>