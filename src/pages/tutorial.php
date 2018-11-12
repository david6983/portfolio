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
        <form metho="POST" action="userSettings.php">

            <div class="w3-card w3-margin">
                <div class="w3-container lightblue">
                    <h2 class="w3-tooltip">
                        About 2KEY
                    </h2>
                </div>
                <div class="w3-container w3-white">
                    <p>
                        <label class="w3-tooltip"><b>What is 2KEY ?</b> 2KEY is a website project to create a music's library manager.</label><br/>
                        <label class="w3-tooltip"><b>Who can use 2KEY ?</b> Everybody can use 2KEY, we have made a simple system. </label><br/>
                    </p>
                </div> 
            </div>

            <div class="w3-card w3-margin">
                <div class="w3-container lightblue">
                    <h2 class="w3-tooltip">
                        How to use 2KEY ?
                    </h2>
                </div>
                <div class="w3-container w3-white">
                    <p>
                        <b>Toolbar</b><br/>
                        <label class="w3-tooltip"><b>Collections :</b> In this page you can access to your collection of music.</label><br/>
                        <label class="w3-tooltip"><b>Tags :</b> In this page you can manage the Tags of your music.</label><br/>
                        <label class="w3-tooltip"><b>Settings :</b> In this page you can access to your settings of your account.</label><br/>
                        <label class="w3-tooltip"><b>Tutorial :</b> In this page you can access to your collection of music.</label><br/>
                    </p>

                    <p>
                        <b>Collection</b><br/>
                        <label class="w3-tooltip"><b>Analyse your track :</b> This button give you informations about your tracks (key, bpm ...)</label><br/>
                        <label class="w3-tooltip"><b>New collection :</b> This button is for create a new collection/playlist of musics.</label><br/>
                        <label class="w3-tooltip"><b>View all :</b> This button will show you all your collection.</label><br/>
                        <label class="w3-tooltip"><b>Export/Import :</b> You can export/import .json files.</label><br/>
                    </p>

                    <p>
                        <b>Settings</b><br/>
                        <label class="w3-tooltip"><b>About your library :</b> Here you can write the path to your virtualhost and library</label><br/>
                        <label class="w3-tooltip"><b>Analysis precision :</b> This button will change the precisions of "Analyse your track"</label><br/>
                        <label class="w3-tooltip"><b>Editable tag :</b> Here you can choose which you want to be shown.</label><br/>
                    </p>
                </div> 
            </div>

            <div class="w3-card w3-margin">
                <div class="w3-container lightblue">
                    <h2 class="w3-tooltip">
                        How to add your library for virtual host
                    </h2>
                </div>
                <div class="w3-container w3-white">
                    <p>
                        <label class="w3-tooltip"> </label><br/>

                    </p>
                </div> 
            </div>

            <div class="w3-card w3-margin">
                <div class="w3-container lightblue">
                    <h2 class="w3-tooltip">
                        How to get around of SOP Security
                    </h2>
                </div>
                <div class="w3-container w3-white">
                    <p>
                        <label class="w3-tooltip">-Click on your Wamp Application </label><br/>
                        <label class="w3-tooltip">-Click on "Apache" </label><br/>
                        <label class="w3-tooltip">-Click on "Apache Modules" </label><br/>
                        <label class="w3-tooltip">-Enable "headers_module" </label><br/>
                        <label class="w3-tooltip">-Then open "httpd.conf" in notepad </label><br/>
                        <label class="w3-tooltip">- Add this line : <IfModule mod_headers.c> Header set Access-Control-Allow-Origin: *</IfModule> </label><br/>


                    </p>
                </div> 
            </div>


        </form>
    </body>
</html>