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
    <!-- to display and close modals -->
    <script src="src/js/sidebar.js"></script>  
</head>
<body class="w3-blue">
    <header>
        <h1 class="w3-center w3-margin w3-padding">Welcome to 2KEY</h1>
    </header>
    <form class="connectForm w3-margin" method="POST" action="src/phpScripts/inscription.php">
        <div class="w3-card w3-margin">
            <div class="w3-container w3-center lightblue">
                <h2>Create a session</h2>
            </div>
            <div class="w3-container w3-white w3-center w3-padding">
                <input name="username" type="text" class="w3-input" placeholder="Enter a name" required>
            </div>
        </div>
        <div class="w3-card w3-margin">
            <div class="w3-container lightblue">
                <h2 class="w3-tooltip">About your library <span class="w3-text">(<em>hosted by WAMP server</em>)</span></h2>
            </div>
            <div class="w3-container w3-white">
                <p>
                    <label class="w3-tooltip">Name of the library <span class="w3-text">(<em>which contains your musics library !</em>)</span> :</label>
                    <input class="w3-input w3-border" type="text" name="virtualHostName" placeholder="Enter the name">
                </p>
                <p>
                    <label class="w3-tooltip">the local path to this library <span class="w3-text">(<em >the same as the virtualhost in WAMP !</em>)</span> :</label>
                    <input class="w3-input w3-border" type="text" name="virtualHostPath" placeholder="Enter the path">
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
        <div class="w3-card w3-margin">
            <div class="w3-container w3-center w3-xlarge w3-white w3-padding">
                <button class="w3-button w3-round-xlarge lightblue" ><a href="javascript: displayModal('help')" style="text-decoration: none;">Add my Library</a></button>     
                <button class="w3-button w3-round-xlarge lightblue" ><a href="index.php" style="text-decoration: none;">Cancel</a></button>     
                <input class="w3-button w3-round-xlarge lightblue" type="submit" value="Connect">
            </div>
        </div>
    </form>
    <div id="help" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-card">
                <div class="w3-container lightblue">
                    <h3>How to add your Library </h3>
                    <span onclick="closeModal('help')" class="w3-button w3-display-topright">&times;</span>
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
                        <label class="w3-tooltip">-Click on your Wamp Application </label><br/>
                        <label class="w3-tooltip">-Click on "Your VirtualHost" </label><br/>
                        <label class="w3-tooltip">-Click on "VirtualHost Management" </label><br/>
                        <img class="width100" id="VH1" src="../../assets/img/VH1.jpg" alt="Picture of the first step for the VirtualHost"><br/>
                        <label class="w3-tooltip">-Write the name of your virtualhost "2KEY" and create a folder for the path here "D:\2key" </label><br/>
                        <label class="w3-tooltip">-Do the same manipulation for your local music, writing "Musics" and the path of your local music</label><br/>
                        <img class="width100" id="VH2" src="../../assets/img/VH2.jpg" alt="Picture of the second step for the VirtualHost"><br/>
                        <label class="w3-tooltip">-Click on "Restart All Services" in your Wamp Application </label><br/>
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
                        <img class="width100" id="Tuto1" src="../../assets/img/tuto1.png" alt="Picture of the first step"><br/>
                        <label class="w3-tooltip">-Then open "httpd.conf" in notepad </label><br/>
                        <label class="w3-tooltip">- Add this line : <IfModule mod_headers.c> Header set Access-Control-Allow-Origin: *</IfModule> </label><br/>
                        <img class="width100" id="Tuto2" src="../../assets/img/tuto2.png" alt="Picture of the second step"><br/>
                    </p>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>