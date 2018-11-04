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
                <div class="w3-dropdown-hover w3-bar-item w3-button w3-mobile navleftIcon">
                    <button class="w3-button" style="padding: 0;">
                        <img src="assets/icons/user.png" class="navleftIcon" alt="userProfile">
                    </button>
                    <div class="w3-dropdown-content w3-bar-block">
                        <div class="w3-container">
                            <p>Session name : <?php echo $_POST["username"]; ?> </p>
                        </div>
                    </div>
                </div>
            </div>                       
        </nav>
        
    </header>
    <!-- sidebar on the left -->
    <div id="sidebar" class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left">
        <img id="camelotImg" src="assets/img/camalote-wheel-logo.png" alt="camalote wheel of keys">
        <button class="w3-button w3-round-xlarge lightblue sidebarElement">Analyze your tracks</button>
        <p class="textSideBar textSideBarMargin">ANALYSIS QUEUE <span id="numberOfMusicToAnalyse">EMPTY</span></p>
        <p class="textSideBar textSideBarMargin">
            NEW COLLECTION 
            <button class="w3-button w3-round-xlarge lightblue marginLeft32p" onclick="displayModal('newCollectionMenu') ">
                <img class="navleftIcon" src="assets/icons/add.png" alt="plusIcon">
            </button>
        </p>
        <p class="textSideBar textSideBarMargin w3-large">VIEW ALL <button id="totalNumberOfMusic" class="w3-button w3-round-xlarge lightblue">0</button></p>
        <!-- here is the code to generate a menu scrollable with overflow css property
        for the playlists thanks to either ajax or php
        -->
        <button id="importButton" class="w3-button w3-round-xlarge lightblue sidebarElement" onclick="displayModal('importMenu')" >
            <img class="ioIcons" src="assets/icons/import.png" alt="importIcon">
            Import
        </button>
        <button id="exportButton" class="w3-button w3-round-xlarge lightblue sidebarElement" onclick="displayModal('exportMenu')" >
            <img class="ioIcons" src="assets/icons/export.png" alt="exportIcon">
            Export
        </button>
    </div>
    <div class="mainContent">
        <!-- new collection menu (modal) -->
        <div id="newCollectionMenu" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-card">
                    <div class="w3-container lightblue">
                        <h3>New Collection</h3>
                        <span onclick="closeModal('newCollectionMenu')" class="w3-button w3-display-topright">&times;</span>
                    </div>
                    <div class="w3-container w3-white">
                        <form method="POST" action="">
                            <div class="w3-container w3-white">
                                <p><input class="w3-input w3-border" type="text" placeholder="Name of your Playlist"></p>
                                <p><input class="w3-button w3-round-xlarge lightblue" type="submit" value="Create"></p>
                            </div>
                        </form>
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
            <input class="w3-input w3-border w3-hide" type="text" placeholder="Search for a song.." id="searchInput" onkeyup="">
        </div>
        <!-- player -->
        <div class="w3-card w3-margin w3-white">
            <!-- js code for the player -->
        </div>
        <!-- table -->
        <div class="w3-card w3-margin w3-white">
            <!-- php code for the table or js code with ajax -->
            <div contenteditable="false">test</div>
        </div>
    </div>
</body>
</html>