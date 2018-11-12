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
    
    header("content-type: application/json");
    echo json_encode(getAllFilesInDir($_SESSION["libraryPath"]));
?>