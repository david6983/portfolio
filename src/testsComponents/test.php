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
        $sum=0;
        $dir = "D:\Documents\Musique\MUSIQUES\MUSIQUE LIBRARY WEI";
        // Sort in ascending order - this is default
        $a = scandir($dir); //the path to the library putted in settings     
        for($i=2; $i < count($a) ; $i++){
            $v = scandir($dir.'\\'.$a[$i]);
            for($j=2; $j < count($v) ; $j++){
                echo "<p>".utf8_encode($v[$j])."</p>";
                
            }
        }
    //be carefull with subdirectory :
    //-use while and is_dir()
    ?>
</body>
</html>