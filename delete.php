<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="a free alternative to mixed in key">
    <meta name="keywords" content="dj, music, camelot wheel">
    <meta name="author" content="David Haioum, Bonnaric Nicolas">
    <title>2KEY</title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="src/css/index.css">
</head>
<body class="w3-blue">
    <header>
        <h1 class="w3-center w3-margin w3-padding">Welcome to 2KEY</h1>
    </header>
    <form class="connectForm w3-margin" method="POST" action="src/phpScripts/deleteUser.php">
        <div class="w3-container w3-center lightblue">
            <h2>Delete a session</h2>
        </div>
        <div class="w3-container w3-white w3-center">
            <select name="username" class="w3-select w3-margin" name="option">
                <option value="0" disabled selected>Choose your session</option>
                <?php 
                    function chargeClasse($classe){
                        require $classe.'.php';
                    }
                    spl_autoload_register('chargeClasse');  
                    chargeClasse("src/phpClasses/User");
                    chargeClasse("src/phpClassesManagers/usersManager");

                    $userMan = new usersManager("localhost","2key","root","");
                    $userMan->connect();
                    $userMan->createOptionFromUserName();
                ?>
            </select>
        </div>
        <div class="w3-container w3-center w3-xlarge w3-white w3-padding">
            <input class="w3-button w3-round-xlarge lightblue" type="submit" value="Delete">
            <button class="w3-button w3-round-xlarge lightblue" ><a href="inscription.php" style="text-decoration: none;">New session</a></button>
            <button class="w3-button w3-round-xlarge lightblue" ><a href="index.php" style="text-decoration: none;">Connexion</a></button>
        </div>      
    </form>
</body>
</html>