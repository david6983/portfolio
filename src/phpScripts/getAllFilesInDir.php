<?php 
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("src/phpClasses/user");
    chargeClasse("src/phpClassesManagers/usersManager");
    
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