<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2KEY</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="src/css/index.css">
    <script type="text/javascript" src="src/js/collapseMenuBar.js"></script>
    <script type="text/javascript" src="src/js/sidebar.js"></script>  
</head>
<body>
    <!-- navigation bar on top -->
    <div class="w3-top">
        <nav class="w3-bar w3-blue">
            <!-- collapse sidebar button -->
            <button class="w3-button w3-left w3-xlarge w3-hide-large" onclick="openSideBar()">
                <img src="assets/icons/playlist.png" id="playlistIcon" alt="acces to playlists"></img>
            </button>
            <!-- Logo -->
            <div class="w3-bar-item w3-left mainLogo">2KEY</div>
            <!-- icon displayed on the mobile version -->
            <a href="javascript:void(0)" class="w3-bar-item w3-xlarge w3-button w3-right w3-hide-large w3-hide-medium" onclick="collapseMenuBar()">&#9776;</a>
            <!-- Buttons -->
            <div id="navItems" class="w3-hide-small">
                <!-- navigation buttons : modify,settings, ... -->
                <a href="#" class="w3-bar-item w3-button w3-mobile navMiddleButton">Collections</a>
                <a href="#" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tags</a>
                <a href="#" class="w3-bar-item w3-button w3-mobile navMiddleButton">Settings</a>
                <a href="#" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tutorial</a>
                <!-- search and user profile icons -->
                <a href="#" class="w3-bar-item w3-button w3-mobile w3-right"><img src="assets/icons/user.png" class="navleftIcon" alt="userProfile"></img></a>
                <a href="#" class="w3-bar-item w3-button w3-mobile w3-right"><img src="assets/icons/search.png" class="navleftIcon" alt="toggle search bar"></img></a>
            </div>                       
        </nav>
    </div>
    <div id="sidebar" class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left">

    </div>
</body>
</html>