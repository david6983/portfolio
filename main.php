<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2KEY</title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="src/css/index.css">
    <script src="src/tools/xmlhttprequest.js"></script>
    <script src="src/js/collapseMenuBar.js"></script>
    <script src="src/js/sidebar.js"></script>  
    <script src="src/js/tagsEditable.js"></script> 
    <script src="src/js/searchBar.js"></script>
    <script src="src/js/playerDisplay.js"></script>
    <script src="src/js/createPlaylist.js"></script>
    <script src="src/jsClasses/PlaylistsList.js"></script>
    <script src="src/jsClasses/player.js"></script>
    <script src="src/jsClasses/track.js"></script>
    <script src="src/jsClasses/Playlist.js"></script>
    <script src="src/js/viewAll.js"></script>
    <script src="src/js/search.js"></script>
</head>
<body>
    <header>
        <!-- top navbar -->
        <nav class="w3-bar w3-blue">
            <!-- collapse sidebar button -->
            <button class="w3-button w3-left w3-xlarge w3-hide-large" onclick="openSideBar()">
                <img src="assets/icons/playlist.png" id="playlistIcon" alt="acces to playlists">
            </button>
            <!-- Logo -->
            <div class="w3-bar-item w3-left mainLogo">2KEY</div>
            <!-- icon displayed on the mobile version -->
            <a href="javascript:void(0)" class="w3-bar-item w3-xlarge w3-button w3-right w3-hide-large w3-hide-medium" onclick="collapseMenuBar()">&#9776;</a>
            <!-- Buttons -->
            <div id="navItems" class="w3-hide-small">
                <!-- navigation buttons : modify,settings, ... -->
                <div onclick="tagsEditableFalse()" class="w3-bar-item w3-button w3-mobile navMiddleButton">Collections</div>
                <div onclick="tagsEditableTrue()" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tags</div>
                <a href="src/pages/settings.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Settings</a>
                <a href="src/pages/tutorial.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tutorial</a>
                <!-- search and user profile icons -->
                <div onclick="collapseSearchInput()" class="w3-bar-item w3-button w3-mobile navLeftElement"><img src="assets/icons/search.png" class="navleftIcon" alt="toggle search bar"></div>
                <div class="w3-button w3-bar-item w3-mobile navleftIcon" onclick="displayModal('sessionMenu')">
                    <img src="assets/icons/user.png" class="navleftIcon" alt="userProfile">
                </div>
                <!-- session menu (modal) -->
                <div id="sessionMenu" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-card">
                            <div class="w3-container lightblue">
                                <h3>Your session </h3>
                                <span onclick="closeModal('sessionMenu')" class="w3-button w3-display-topright">&times;</span>
                            </div>
                            <div class="w3-container">
                                <h4 style="color: rgb(0, 194, 255);">
                                    <?php 
                                        echo "<p>Session name : ".$_SESSION["username"]."</p>";
                                        if(isset($_SESSION["libraryName"])){
                                            echo "<p>Library name : ".$_SESSION["libraryName"]."</p>";
                                        }
                                        if(isset($_SESSION["libraryPath"])){
                                            echo "<p>Library path : ".$_SESSION["libraryPath"]."</p>";
                                        }
                                        if(isset($_SESSION["analysisPrecision"])){
                                            echo "<p>Analysis Precision : ".$_SESSION["analysisPrecision"]."</p>";
                                        }
                                    ?>
                                </h4>
                            </div>
                            <div class="w3-container w3-center">
                                <a href="src/phpScripts/deconnexion.php" class="w3-bar-item w3-center w3-button w3-mobile w3-blue w3-round-xlarge">Change session</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- showControl -->
            </div>                       
        </nav>
        
    </header>
    <!-- sidebar on the left -->
    <div id="sidebar" class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left">
        <img id="camelotImg" src="assets/img/camalote-wheel-logo.png" alt="camalote wheel of keys">
        <button class="w3-button w3-round-xlarge lightblue sidebarElement">Analyze your tracks</button>
        <button id="importButton" class="w3-button w3-round-xlarge lightblue sidebarElement" onclick="displayModal('importMenu')" >
            <img class="ioIcons" src="assets/icons/import.png" alt="importIcon">
            Import
        </button>
        <button id="exportButton" class="w3-button w3-round-xlarge lightblue sidebarElement" onclick="displayModal('exportMenu')" >
            <img class="ioIcons" src="assets/icons/export.png" alt="exportIcon">
            Export
        </button>
        <p class="textSideBar textSideBarMargin">ANALYSIS QUEUE 
            <span id="numberOfMusicToAnalyse" class="sidebarButtonElementRight">
                <?php 
                    require "src/phpScripts/getAllFilesInDir.php";
                    $array = getAllFilesInDir($_SESSION["libraryPath"]);
                    if(count($array) == 0){
                        echo "EMPTY";
                    }else{
                        $_SESSION["numberOfMusics"] = count($array);
                        echo $_SESSION["numberOfMusics"];
                    }  
                    updateNbMusicUser($_SESSION["numberOfMusics"]);
                ?>
            </span>
        </p>
        <p class="textSideBar textSideBarMargin">
            NEW COLLECTION 
            <button class="w3-button w3-round-xlarge lightblue marginLeft32p sidebarButtonElementRight" onclick="displayModal('newCollectionMenu') ">
                <img class="navleftIcon" src="assets/icons/add.png" alt="plusIcon">
            </button>
        </p>
        <p class="textSideBar textSideBarMargin w3-large">VIEW ALL 
        <button id="totalNumberOfMusic" onclick="requestAllFilesInDir(viewAll);" class="w3-button w3-round-xlarge lightblue sidebarButtonElementRight"><?php 
            echo $_SESSION["numberOfMusics"];
            ?></button></p>
        <div id="playlistNameContainer" style="overflow:auto;">
            <script>
                var list = new PlaylistsList();
            </script>
        </div>
    </div>
    <div class="mainContent">
        <!-- new collection menu (modal) -->
        <div id="newCollectionMenu" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-card">
                    <div class="w3-container lightblue">
                        <h3>New Collection</h3>
                        <span onclick="closeModal('newCollectionMenu')" class="w3-button w3-display-topright sidebarButtonElementRight">&times;</span>
                    </div>
                    <div class="w3-container w3-white">
                        <div class="w3-container w3-white">
                            <p><input id="playlistNameInput" class="w3-input w3-border" type="text" placeholder="Name of your Playlist" required></p>
                            <p><button class="w3-button w3-round-xlarge lightblue" onclick="requestNewCollection(document.getElementById('playlistNameInput').value);">Create</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- import menu (modal) -->
        <div id="importMenu" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-card">
                    <div class="w3-container lightblue">
                        <h3>Import collections from</h3>
                        <span onclick="closeModal('importMenu')" class="w3-button w3-display-topright">&times;</span>
                    </div>
                    <div class="w3-container w3-white">
                        <form method="POST" action="">
                            <div class="w3-container w3-white">
                                <p><input class="w3-input w3-border" type="file"></p>
                                <p><input class="w3-button w3-round-xlarge lightblue" type="submit" value="Import"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- export menu (modal) -->
        <div id="exportMenu" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-card">
                    <div class="w3-container lightblue">
                        <h3>Export your collections </h3>
                        <span onclick="closeModal('exportMenu')" class="w3-button w3-display-topright">&times;</span>
                    </div>
                    <div class="w3-container w3-white">
                        <form method="POST" action="">
                            <div class="w3-container w3-white">
                                <button class="w3-button w3-blue w3-round-xlarge" id="exportCollectionButton">Download the file</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- hiden  search input -->
        <div class="w3-card w3-margin w3-white">
            <input class="w3-input w3-border w3-hide" type="text" placeholder="Search for a song name.." id="searchInput" onkeyup="search()">
        </div>
        <!-- player -->
        <div class="w3-card w3-margin w3-white Player">
            <!-- js code for the player -->
            <div id="waveform" class="w3-container">
                
            </div>
            <!-- player buttons -->
            <div class="w3-container controlPlayer">        
                <button class="w3-button">
                    <img src="assets\icons\previous.png" alt="previous logo">
                </button>
                <button class="w3-button w3-blue w3-circle" onclick="pauseToPlayImg()">
                    <img id="playpauseImg" src="assets\icons\pause.png" alt="pause logo">
                </button>
                <button class="w3-button">
                    <img class="rotate180" src="assets\icons\previous.png" alt="next logo">
                </button>              
            </div>
            <!-- song attributs -->
            <div class="w3-container">
                <!-- display a table with all the track's attributs -->
            </div>
        </div>
        <!-- table -->
        <div class="w3-card w3-margin w3-white">
            <!-- php code for the table or js code with ajax -->
            <table id="renderedPlaylist" class="w3-table w3-striped w3-bordered tableOfSongs">
            </table>
        </div>
    </div>
</body>
</html>