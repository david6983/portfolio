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
        <h1 class="w3-center w3-margin w3-padding">Welcome to 2KEY</h1>
    </header>
    <form class="connectForm" method="POST" action="main.php">
        <div class="w3-card w3-margin" >
            <div class="w3-container w3-center lightblue">
                <h2>Choose a session</h2>
            </div>
            <div class="w3-container w3-white w3-center">
                <input class="w3-input" type="text" value="Choose a name" name="sessionName">
            </div>
            <div class="w3-container w3-xlarge w3-white w3-padding w3-left">
                <input class="w3-button w3-round-xlarge lightblue" type="submit" value="Connect">
            </div>
            <div class="w3-container w3-xlarge w3-white w3-padding w3-right">
                <input class="w3-button w3-round-xlarge lightblue" type="submit" value="Connect">
            </div>
        </div>      
        
    </form>
</body>
</html>