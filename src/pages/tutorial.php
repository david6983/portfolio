<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2KEY</title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <script src="../js/collapseMenuBar.js"></script>
    <script src="../js/sidebar.js"></script>  
    <script src="../js/tagsEditable.js"></script> 
</head>
<body>
    <header>
        <!-- top navbar -->
        <nav class="w3-bar w3-blue">
            <!-- collapse sidebar button -->
            <button class="w3-button w3-left w3-xlarge w3-hide-large" onclick="openSideBar()">
                <img src="../../assets/icons/playlist.png" id="playlistIcon" alt="acces to playlists">
            </button>
            <!-- Logo -->
            <div class="w3-bar-item w3-left mainLogo">2KEY</div>
            <!-- icon displayed on the mobile version -->
            <a href="javascript:void(0)" class="w3-bar-item w3-xlarge w3-button w3-right w3-hide-large w3-hide-medium" onclick="collapseMenuBar()">&#9776;</a>
            <!-- Buttons -->
            <div id="navItems" class="w3-hide-small">
                <!-- navigation buttons : modify,settings, ... -->
                <a href="../../index.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Collections</a>
                <a href="../../index.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tags</a>
                <a href="" class="w3-bar-item w3-button w3-mobile navMiddleButton">Settings</a>
                <a href="tutorial.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tutorial</a>
                <!-- search and user profile icons -->
                <div class="w3-bar-item w3-button w3-mobile w3-right"><img src="../../assets/icons/user.png" class="navleftIcon" alt="userProfile"></div>
                <div class="w3-bar-item w3-button w3-mobile w3-right"><img src="../../assets/icons/search.png" class="navleftIcon" alt="toggle search bar"></div>
            </div>                       
        </nav>
        
    </header>
    
    <div>
        <div class="w3-card w3-margin">
            
        </div>
        
    </div>
</body>
</html>