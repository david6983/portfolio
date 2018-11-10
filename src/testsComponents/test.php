<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        $dir = "D:\Documents\Musique\MUSIQUES\MUSIQUE LIBRARY WEI";
        


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
</body>
</html>