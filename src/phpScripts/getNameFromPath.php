<?php 
    /**
     * from a path like D:\dir\foo.mp3 extract the name foo between "\" and ".extension"
     */
    function getNameFromPath($path){
        /* explode the string separated by "\" */
        $split = explode("\\",$path);
        /* get the last string in split and explode it (separated by ".") */
        $name = explode(".",$split[count($split)-1]); /* cout($split)-1 is the last index of $split */
        /* if there are no "." before the last string like "foo.mp3" */
        if(count($name) == 2){
            return $name[0]; /* return the first string */
        /* or add the two parts separated by a "." before ".mp3" or ".extension" */
        }else if(count($name) > 2){
            return $name[0].$name[1];
        }
    }
?>