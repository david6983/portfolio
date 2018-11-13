<?php 
    /**
     * this script request the data from the database for the user
     * create session variables of the user_name and user_id
     * to get at any moment all the caracteristics of the user
     */

    /* load all the classes */
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user");
    chargeClasse("../phpClassesManagers/usersManager");

    /* new user manager */
    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();
    
    session_start(); /* starting a session */

    /* creata a new user object */
    $user = $userMan->getUser($_POST["user_name"]);

    /* save a user in session variables */
    $_SESSION["user_name"] = $_POST["user_name"];
    $_SESSION["user_nb_playlists"] = $user->getId();
    $_SESSION["user_nb_music"] = $user->getNbMusic();
    $_SESSION["user_analysisPrecision"] = $user->getAnalysisPrecision();
    $_SESSION["user_libraryPath"] = $user->getLibraryPath();
    $_SESSION["user_libraryName"] = $user->getLibraryName();

    /* redirect the user to the main application */
    header("location: ../../main.php");
?>