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
    <!-- W3.css framework -->
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- own css -->
    <link rel="stylesheet" type="text/css" href="src/css/index.css">
</head>
<body class="w3-blue">
    <!-- title -->
    <header>
        <h1 class="w3-center w3-margin w3-padding">Welcome to 2KEY</h1>
    </header>
    <!-- Connexion form -->
    <form class="connectForm w3-margin" method="POST" action="src/phpScripts/connexion.php">
        <div class="w3-container w3-center lightblue">
            <h2>Choose a session</h2>
        </div>
        <div class="w3-container w3-white w3-center">
            <select name="user_name" class="w3-select w3-margin" name="option">
                <option value="0" disabled selected>Choose your session</option>
                <!-- call to the PHP script to generate the option from the BDD -->
                <?php include("src/phpScripts/displayConnexionOptions.php"); ?>
            </select>
        </div>
        <div class="w3-container w3-center w3-xlarge w3-white w3-padding">
            <!-- submit button -->
            <input class="w3-button w3-round-xlarge lightblue" type="submit" value="Connect">
        </div>    
    </form>
    <!-- buttons to creata a new session or delete a session -->
    <div class="w3-container w3-center w3-xlarge w3-white w3-padding w3-margin">
        <button class="w3-button w3-round-xlarge lightblue" ><a href="inscription.php" style="text-decoration: none;">New session</a></button>
        <button class="w3-button w3-round-xlarge lightblue" ><a href="delete.php" style="text-decoration: none;">Delete</a></button>
    </div> 
</body>
</html>