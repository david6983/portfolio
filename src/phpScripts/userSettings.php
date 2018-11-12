<?php 
    session_start();

    function getAllFilesInDir($dir){
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
        $files = array(); 
        foreach ($rii as $file) {
            if ($file->isDir()){ 
                continue;
            }
            $files[] = utf8_encode($file->getPathname()); 
        }
        return $files;
    }

    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user");
    chargeClasse("../phpClassesManagers/usersManager");
    chargeClasse("../phpCLasses/track");
    chargeClasse("../phpCLasses/tracksManager");

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