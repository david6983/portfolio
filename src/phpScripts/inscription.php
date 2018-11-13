<?php 
    /**
     * this script add a user to the data base based on the caracteristics given
     * and if the library path given in the form exist , we can analyse all the files in the directory
     * and complete the database : that is to say update the total number of tracks of the user
     * and fill up the 'music' table
     */

    /* loading the appropriate classes */
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user"); 
    chargeClasse("../phpClassesManagers/usersManager");
    chargeClasse("../phpClasses/track");
    chargeClasse("../phpClassesManagers/tracksManager");

    /* get the script to get all files in a directory */
    include("getAllFilesInDir.php");
    /* get the script to compute the name based on the path  */
    include("getNameFromPath.php");
    /* concerning the user , creation of a manager */
    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();

    /* add the new user */
    $userMan->addUser($_POST["username"]);
    /* creata a new user to store the informations given in the form */
    $user = $userMan->getUser($_POST["username"]);
    /* update the new attributs */
    $user->setUser_libraryName($_POST["virtualHostName"]);
    $user->setUser_libraryPath($_POST["virtualHostPath"]);
    $user->setUser_analysisPrecision($_POST["analysisPrecision"]);

    if(is_dir($_POST["virtualHostPath"])){
        $user->setUser_libraryPath($_POST["virtualHostPath"]);
        /* analyse the library */
        $tracksPathArray = getAllFilesInDir($_POST["virtualHostPath"]);
        /* update the number of tracks of the user */
        $user->setUser_nb_music(count($tracksPathArray));
        /* for each tracks in the array $tracksPathArray , add a new track to the database
        for the name of the track we can take the the name after the last '\'  */
        $tracksMan = new TracksManager("localhost","2key","root","");
        $tracksMan->connect();
        /* for each path in $tracksPathArray */
        for($i=0;$i < count($tracksPathArray) ; $i++){
            $tracksMan->addTrack($tracksPathArray[$i],$user->getId());
            /* get the track from the DB */
            $track = $tracksMan->getTrackByPath($tracksPathArray[$i]); /* the auto_increment start before */
            /* get the track name from the path */
            $track->setMusic_name(getNameFromPath($tracksPathArray[$i]));
            /* update the track to the database */
            $tracksMan->updateTrack($track);
        }
    }
    /* update to the database */
    $userMan->updateUser($user);
    /* redirect to the connection pannel */
    header("location: ../../index.php")
?>