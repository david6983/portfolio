<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2KEY</title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="src/css/index.css">
    <script src="src/js/collapseMenuBar.js"></script>
    <script src="src/js/sidebar.js"></script>  
    <script src="src/js/tagsEditable.js"></script> 
    <script src="src/js/searchBar.js"></script>
</head>
<body class="w3-blue">
    <header>
        <h1>Welcome to 2KEY</h1>
    </header>
    <form class="connectForm" method="POST" action="index.php">
        <div class="w3-card w3-margin">
            <div class="w3-container lightblue">
                <h2>Choose a session</h2>
            </div>
            <div class="w3-container w3-white">
                <select name="username" class="w3-select" name="option">
                    <option value="0" disabled selected>Choose your session</option>
                    <option value="dev">dev</option>
                </select>
            </div>
            <div class="w3-container w3-white">
                <input class="w3-button w3-round-xlarge lightblue" type="submit" value="Connect">
            </div>
        </div>      
        
    </form>
    <p><?php echo $_POST["username"]; ?> </p>
</body>
</html>