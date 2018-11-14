<?php 
    /**
     * scan recursively a directory and extract all the path files
     * return an array of all the paths
     * 
     * @param {string} $dir main directory of the library
     * @return {array} $files array of all the paths
     */
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
?>