<?php session_start() ?>
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
                <a href="../../main.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Collections</a>
                <a href="../../main.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tags</a>
                <a href="" class="w3-bar-item w3-button w3-mobile navMiddleButton">Settings</a>
                <a href="tutorial.php" class="w3-bar-item w3-button w3-mobile navMiddleButton">Tutorial</a>
                <div class="w3-button w3-bar-item w3-mobile navleftIcon" onclick="displayModal('sessionMenu')">
                    <img src="../../assets/icons/user.png" class="navleftIcon" alt="userProfile">
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
                                <h4 style="color: blue;">
                                    <?php 
                                        if(isset($_SESSION["user_name"])){
                                            echo "<p>Session name : ".$_SESSION["user_name"]."</p>";
                                        }
                                        if(isset($_SESSION["user_libraryName"])){
                                            echo "<p>Library name : ".$_SESSION["user_libraryName"]."</p>";
                                        }
                                        if(isset($_SESSION["user_libraryPath"])){
                                            echo "<p>Library path : ".$_SESSION["user_libraryPath"]."</p>";
                                        }
                                        if(isset($_SESSION["user_analysisPrecision"])){
                                            echo "<p>Analysis Precision : ".$_SESSION["user_analysisPrecision"]."</p>";
                                        }
                                    ?>
                                </h4>
                            </div>
                            <div class="w3-container">
                                <a href="../phpScripts/deconnexion.php" class="w3-bar-item w3-center w3-button w3-mobile w3-blue w3-round-xlarge">Change session</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                       
        </nav>
        
    </header>
    <form method="POST" action="../phpScripts/userSettings.php">
        <div class="w3-card w3-margin">
            <div class="w3-container lightblue">
                <h2 class="w3-tooltip">About your library <span class="w3-text">(<em>hosted by WAMP server</em>)</span></h2>
            </div>
            <div class="w3-container w3-white">
                <p>
                    <label class="w3-tooltip">Name of the virtualHost <span class="w3-text">(<em>which contains your musics library !</em>)</span> :</label>
                    <input class="w3-input w3-border" type="text" name="virtualHostName" placeholder="<?php 
                            if(isset($_SESSION["libraryName"])){
                                echo $_SESSION["libraryName"];
                            }
                        ?>
                    ">
                </p>
                <p>
                    <label class="w3-tooltip">the local path to this library <span class="w3-text">(<em >the same as the virtualhost in WAMP !</em>)</span> :</label>
                    <input class="w3-input w3-border" type="text" name="virtualHostPath" placeholder="<?php 
                            if(isset($_SESSION["libraryPath"])){
                                echo $_SESSION["libraryPath"];
                            }
                        ?>
                    ">
                </p>
            </div>
        </div>
        <div class="w3-card w3-margin">
            <div class="w3-container lightblue">
                <h2 class="w3-tooltip">Analysis precision
                    <span class="w3-text">(<em>for the BPM precision especialy</em>)</span>
                </h2>
            </div>
            <div class="w3-container w3-white">
                <p>
                    <input class="w3-radio" type="radio" name="analysisPrecision" value="0" checked>
                    <label>Standard</label>
                </p>
                <p>
                    <input class="w3-radio" type="radio"  name="analysisPrecision" value="1">
                    <label>Optimised</label>
                </p>

            </div>
        </div>
        <!--
        <div class="w3-card w3-margin">
            <div class="w3-container lightblue">
                <h2 class="w3-tooltip">Editable tags
                    <span class="w3-text">(<em>which tags are editable for your tracks ?</em>)</span>
                </h2>
            </div>
            <div class="w3-container w3-white">
                <p>
                    <input class="w3-check" type="checkbox" checked="checked">
                    <label>Name</label>
                </p>
                <p>
                    <input class="w3-check" type="checkbox" checked="checked">
                    <label>Artist names</label>
                </p>
                <p>
                    <input class="w3-check" type="checkbox" checked="checked">
                    <label>BPM</label>
                </p>
                <p>
                    <input class="w3-check" type="checkbox" checked="checked">
                    <label>Lenght</label>
                </p>
                <p>
                    <input class="w3-check" type="checkbox" checked="checked">
                    <label>Genre</label>
                </p>
                <p>
                    <input class="w3-check" type="checkbox" checked="checked">
                    <label>Path</label>
                </p>
                <p>
                </p>
            </div>
        </div>
        -->
        <div class="w3-container">
            <input class="w3-button w3-round-xlarge lightblue" type="submit" value="Save">
        </div>
    </form>
</body>
</html>