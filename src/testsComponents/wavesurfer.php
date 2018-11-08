<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test wavesurfer js</title>
    <script src="https://unpkg.com/wavesurfer.js"></script>
</head>
<body style="background-color: rgb(255,255,255);">
    
    <div id="waveform"></div>
    <script>
        let wavesurfer = WaveSurfer.create({
            container: '#waveform',
            waveColor: 'lightblue',
            barWidth: 3 /* more like soundcloud player */
        });
        wavesurfer.load("http://musiques/BIG ROOM/Dimitri%20Vegas,%20Martin%20Garrix,%20Like%20Mike%20-%20Tremor%20(Official%20Music%20Video)_(360p).mp3");
        
    </script>
    
    
    <!-- 
        warning : you need to :
        -set a virtual host called musiques for instance and modify the link above
        if you want to load your own song
        -then you need to follow this tutorial to enable cross platform request due to SOP security :
        https://medium.com/@tanviranik/how-to-resolve-the-error-in-wampserver-no-access-control-allow-origin-header-is-present-on-the-486705cb1659
    -->
</body>
</html>