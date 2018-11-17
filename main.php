<?php session_start() ?>
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
    <script src="https://unpkg.com/wavesurfer.js"></script>
    <script src="src/tools/xmlhttprequest.js"></script>
    <script src="src/js/collapseMenuBar.js"></script>
    <script src="src/js/sidebar.js"></script>  
    <script src="src/js/tagsEditable.js"></script> 
    <script src="src/js/searchBar.js"></script>
    <script src="src/js/playerDisplay.js"></script>
    <script src="src/js/createPlaylist.js"></script>
    <script src="src/jsClasses/PlaylistsList.js"></script>
    <script src="src/jsClasses/track.js"></script>
    <script src="src/jsClasses/tagVerifier.js"></script>
    <script src="src/jsClasses/Playlist.js"></script>
    <script src="src/jsClasses/PlaylistSelect.js"></script>
    <script src="src/js/controls.js"></script>
    <script src="src/js/viewAll.js"></script>
    <script src="src/js/addToPlaylist.js"></script>
    <script src="src/js/displayPlaylistFromNavbar.js"></script>
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
                <div onclick="tagsEditableTrue(); displayControlBar();" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tags</div>
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
                                        echo "<p>Session name : ".$_SESSION["user_name"]."</p>";
                                        if(isset($_SESSION["user_libraryName"])){
                                            echo "<p>Library name : ".$_SESSION["user_libraryName"]."</p>";
                                        }
                                        if(isset($_SESSION["user_libraryPath"])){
                                            echo "<p>Library path : ".$_SESSION["user_libraryPath"]."</p>";
                                        }
                                        if(isset($_SESSION["user_analysisPrecision"])){
                                            echo "<p>Analysis Precision : ".$_SESSION["user_analysisPrecision"]."</p>";
                                        }
                                        if(isset($_SESSION["user_id"])){
                                            echo "<p>Session n°".$_SESSION["user_id"]."</p>";
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
        <img onclick="showControl();" id="camelotImg" src="assets/img/camalote-wheel-logo.png" alt="camalote wheel of keys">
        <button class="w3-button w3-round-xlarge lightblue sidebarElement">Analyze your tracks</button>
        <button id="importButton" class="w3-button w3-round-xlarge lightblue sidebarElement" onclick="displayModal('importMenu')" >
            <img class="ioIcons" src="assets/icons/import.png" alt="importIcon">
            Import
        </button>
        <button id="exportButton" class="w3-button w3-round-xlarge lightblue sidebarElement" onclick="displayModal('exportMenu'); exportPlaylists();" >
            <img class="ioIcons" src="assets/icons/export.png" alt="exportIcon">
            Export
        </button>
        <p class="textSideBar textSideBarMargin">ANALYSIS QUEUE 
            <span id="numberOfMusicToAnalyse" class="sidebarButtonElementRight">
                <?php 
                    /* if the session variable for the number of musics exist */
                    if(isset($_SESSION["nb_music_to_analyze"])) {
                        /* the number is not 0 */
                        if( $_SESSION["nb_music_to_analyze"] != 0 ){
                            echo $_SESSION["nb_music_to_analyze"];
                        }else{
                            echo "EMPTY";
                        }
                    }  
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
        <button id="totalNumberOfMusic" onclick="requestViewAll(viewAll); hidePlaylistOption();" class="w3-button w3-round-xlarge lightblue sidebarButtonElementRight"><?php 
            if(isset($_SESSION["user_nb_music"])){
                echo $_SESSION["user_nb_music"];
            }else{
                echo 0;
            }
            ?></button></p>
        <div id="playlistNameContainer">
            <script>
                var list = new PlaylistsList("playlistNameContainer");
                list.requestPlaylistsNames(list);
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
                            <p><input id="playlistNameInput" onfocus="this.value=''" class="w3-input w3-border" type="text" placeholder="Name of your Playlist" required></p>
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
                        <div class="w3-container w3-white">
                            <button class="w3-button w3-blue w3-round-xlarge" id="exportCollectionButton"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add To Playlist modal-->
        <div id="addToPlaylistModal" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-card">
                    <div class="w3-container lightblue">
                        <h3>Add track n°<span id="idTrackModal"></span> to : </h3>
                        <span onclick="closeModal('addToPlaylistModal')" class="w3-button w3-display-topright">&times;</span>
                    </div>
                    <div class="w3-container w3-white">
                        <div class="w3-container w3-white">
                            <p>
                                <select id="playlistSelected" name="playlistSelected" class="w3-select w3-margin">         
                                </select>
                            </p>
                            <p><button onclick="addToPlaylist()" class="w3-button w3-round-xlarge lightblue">Add</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hiden  search input -->
        <div class="w3-card w3-margin w3-white">
            <input class="w3-input w3-border w3-hide" type="text" placeholder="Search for a song name.." id="searchInput" onkeyup="filter()">
        </div>
        <!-- player -->
        <div id="player" class="w3-card w3-margin w3-white Player" style="display: none;">
            <!-- js code for the player -->
            <div id="waveform" class="w3-container">
                <script>
                    var wavesurfer = WaveSurfer.create({
                        container: '#waveform',
                        waveColor: 'lightblue',
                        barWidth: 3, /* looks like the soundcloud player */
                        scrollParent: false
                    });
                    wavesurfer.on('ready',function(){
                        wavesurfer.play();
                    });
                    document.getElementById("waveform").children[1].setAttribute("style",
                        "display: block; position: relative; user-select: none; height: 128px; width: 100%; overflow: hidden; z-index: 0;"                 
                    );
                </script>
            </div>
            <!-- player buttons -->
            <div class="w3-container controlPlayer">        
                <button id="previousButton" class="w3-button" onclick="wavesurfer.skipBackward()">
                    <img src="assets\icons\previous.png" alt="previous logo">
                </button>
                <button id="playButton" class="w3-button w3-blue w3-circle" onclick="pauseToPlayImg(); wavesurfer.playPause();">
                    <img id="playpauseImg" src="assets\icons\pause.png" alt="pause logo">
                </button>
                <button id="nextButton" class="w3-button" onclick="wavesurfer.skipForward()">
                    <img class="rotate180" src="assets\icons\previous.png" alt="next logo">
                </button>     
                <!-- song attributs -->    
                <table style="display: inline;">
                    <tr id="playerTrackContent">
                        <th>Name</th>
                        <th>-</th>
                        <th>Artists</th>
                        <th>-</th>
                        <th>Genre</th>
                        <th>-</th>
                        <th>Key</th>
                        <th>-</th>
                        <th>BPM</th>
                        <th>-</th>
                        <th>Length</th>
                    </tr>
                    <tr id="playerTrackValues">
                        <td id="playerValueForName" ></td>
                        <th> </th>
                        <td id="playerValueForArtists" ></td>
                        <th> </th>
                        <td id="playerValueForGenre" ></td>
                        <th> </th>
                        <td id="playerValueForKey" ></td>
                        <th> </th>
                        <td id="playerValueForBPM" ></td>
                        <th> </th>
                        <td id="playerValueForLength" ></td>
                    </tr>
                </table>     
            </div>   
        </div>
        <!-- hiden control bar -->
        <div id="controlBar" class="w3-card w3-margin w3-white" style="display: none;">
            <div class="w3-container w3-center w3-blue">
                <h2 id="controlStatus"></h2>
            </div>
            <div class="w3-container w3-blue checkBar">
                <button class="w3-button w3-round-xlarge cancelCheck" onclick="uncheck();">
                    <img src="..\..\..\assets\icons\checklist.png" alt="cancel check" style="width: 25px;">
                    <p>Cancel</p>
                </button> 
                <button class="w3-button w3-round-xlarge checkAll" onclick="check();">
                    <img src="..\..\..\assets\icons\checkAll.png" alt="check all" style="width: 25px;">
                    <p>Select all</p>
                </button>
                <button id="ActiontoolbarButton" class="w3-button w3-round-xlarge addTo" onclick="controlAddSelectedTo();">
                    <img id="ActiontoolbarButtonImg" src="..\..\..\assets\icons\add.png" alt="add" style="width: 25px;">
                    <p id="ActiontoolbarButtonText">Add Selected to</p>
                </button> 
                <div id="addAllToPlaylistModal" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-card">
                            <div class="w3-container lightblue">
                                <h3>Add All tracks selected to :</h3>
                                <span onclick="closeModal('addAllToPlaylistModal')" class="w3-button w3-display-topright">&times;</span>
                            </div>
                            <div class="w3-container w3-white">
                                <div class="w3-container w3-white">
                                    <p>
                                        <select id="playlistSelectedAll" name="playlistSelectedAll" class="w3-select w3-margin">         
                                        </select>
                                    </p>
                                    <p><button onclick="addSelectedToPlaylist()" class="w3-button w3-round-xlarge lightblue">Add All</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="hidePlayer" class="w3-button w3-round-xlarge addTo" onclick="hidePlayer()">
                    <img src="..\..\..\assets\icons\vlc.png" alt="player icon" style="width: 25px;">
                    <p>Player</p>
                </button>
                <button id="playlistOption" class="w3-button w3-round-xlarge addTo" onclick="displayModal('playlistOptionModal')">
                    <img src="..\..\..\assets\icons\playlist_option.png" alt="playlist options" style="width: 25px;">
                    <p>Playlist Options</p>
                </button>
                <div id="playlistOptionModal" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-card">
                            <div class="w3-container lightblue">
                                <h3>Playlist Options :</h3>
                                <span onclick="closeModal('playlistOptionModal')" class="w3-button w3-display-topright">&times;</span>
                            </div>
                            <div class="w3-container w3-white">
                                <div class="w3-container w3-white w3-margin">
                                    <input id="playlistNewName" onfocus="this.value=''" class="w3-input" name="playlist_new_name" placeholder="New name" >
                                </div>
                                <div class="w3-container w3-white w3-margin w3-center">
                                    <button onclick="changePlaylistName();" class="w3-button w3-round-xlarge lightblue">Change name</button>
                                    <button onclick="deletePlaylist();" class="w3-button w3-round-xlarge lightblue">Delete the playlist</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="helpTag" class="w3-button w3-round-xlarge addTo" onclick="displayModal('helpTagModal')">
                    <img src="..\..\..\assets\icons\help.png" alt="help for tags" style="width: 25px;">
                    <p>Help for Tags</p>
                </button>
                <div id="helpTagModal" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-card">
                            <div class="w3-container lightblue">
                                <h3>How to edit your tags ?</h3>
                                <span onclick="closeModal('helpTagModal')" class="w3-button w3-display-topright">&times;</span>
                            </div>
                            <div class="w3-container w3-white w3-center">
                                <h4 style="color: red;">you can modify all the tags except the id and the path !</h4>
                                <p>each tag has his proper syntax in order to be save :</p>
                            </div>
                            <div class="w3-container w3-white">
                                <div class="w3-card w3-margin">
                                    <table class="w3-table">
                                        <tr class="w3-blue">
                                            <th>Name</th>
                                            <th>artists</th>
                                            <th>genre</th>
                                            <th>bpm</th>
                                            <th>key</th>
                                            <th>length</th>
                                        </tr>
                                        <tr>
                                            <td>simple string</td>
                                            <td>simple string</td>
                                            <td>simple string</td>
                                            <td>an integer number</td>
                                            <td>a key like the wheel in the sidebar</td>
                                            <td>in the form of mm:ss only</td>
                                        </tr>
                                        <tr>
                                            <td>200 characters max</td>
                                            <td>200 characters maxn</td>
                                            <td>40 characters max</td>
                                            <td>between 60 and 200 bpm</td>
                                            <td>ex : 12B</td>
                                            <td>02:21</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="w3-container w3-white">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <button class="w3-button w3-round-xlarge addTo">
                    <h4 id="controlMessage" style="color: black; font-weight: bolder;">Tags edition disabled (click on TAGS to enable) !</h4>
                </button>
            </div>
        </div>
        <!-- add to modal -->

        <!-- table -->
        <div class="w3-card w3-margin w3-white">
            <!-- php code for the table or js code with ajax -->
            <table id="renderedPlaylist" class="w3-table w3-striped w3-bordered tableOfSongs">
            </table>
        </div>
    </div>
</body>
</html>