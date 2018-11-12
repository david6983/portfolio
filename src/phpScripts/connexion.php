<?php 
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user");
    chargeClasse("../phpClassesManagers/usersManager");

    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();
    
    session_start();

    $_SESSION["username"] = $_POST["username"];
    $user = $userMan->getUser($_SESSION["username"]);
    $_SESSION["user_id"] = $user->getId();
    $_SESSION["addTracks"] = false;

    header("location: ../../main.php");
?>