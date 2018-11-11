<?php 
    session_start();

    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user");
    chargeClasse("../phpClassesManagers/usersManager");


    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();

    $user = $userMan->getUser($_SESSION["username"]);
    $user->setUser_libraryPath($_POST["virtualHostPath"]);
    $user->setUser_libraryName($_POST["virtualHostName"]);
    $user->setUser_analysisPrecision($_POST["analysisPrecision"]);

    $_SESSION["libraryName"] = $user->getLibraryName();
    $_SESSION["libraryPath"] = $user->getLibraryPath();
    $_SESSION["analysisPrecision"] = $user->getAnalysisPrecision();

    $userMan->updateUser($user);

    header("location: ../../main.php");
?>