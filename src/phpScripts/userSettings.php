<?php 
    /**
     * this script update the settings for the user
     */
    /* start the session to get the session variables */
    session_start();

    /* require user and usersManager classes */
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user");
    chargeClasse("../phpClassesManagers/usersManager");

    /* new usersManager */
    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();

    /* get the inforamtions from the database */
    $user = $userMan->getUser($_SESSION["user_name"]);
    /* set the new inforamtions from the form */
    if(empty($_POST["virtualHostPath"])){
        /* if empty get the session variable */
        $user->setUser_libraryPath($_SESSION["user_libraryPath"]);
    }else{
        /* if not empty we can update */
        $user->setUser_libraryPath($_POST["virtualHostPath"]);
    }

    if(empty($_POST["virtualHostName"])){
        /* if empty  */
        $user->setUser_libraryName($_SESSION["user_libraryName"]);
    }else{
        /* if not empty we can update */
        $user->setUser_libraryName($_POST["virtualHostName"]);
    }
    /* one is always checked */
    $user->setUser_analysisPrecision($_POST["analysisPrecision"]);

    /* update session variables */
    $_SESSION["user_libraryName"] = $user->getLibraryName();
    $_SESSION["user_libraryPath"] = $user->getLibraryPath();
    $_SESSION["user_analysisPrecision"] = $user->getAnalysisPrecision();

    /* update the database */
    $userMan->updateUser($user);

    /* redirect to the main app */
    header("location: ../../main.php");
?>