<?php 
 
    require "src/phpClasses/user.php";
    require "src/phpClassesManagers/usersManager.php";
    
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

    function updateNbMusicUser($nb){
        $userMan = new usersManager("localhost","2key","root","");
        $userMan->connect();

        $user = $userMan->getUser($_SESSION["username"]);
        $user->setUser_nb_music($nb);

        $userMan->updateUser($user);
    }
?>