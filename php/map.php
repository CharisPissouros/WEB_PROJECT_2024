<?php


include 'functions.php' ;

?>

<!DOCTYPE html>
<html>
<head>

    
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>


<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>    


<style>#map { height: 350px; }
</style>
</head>

<body>
<div id="map"></div>
 <button id = "CheckTasksHistory" class = "buttons">Tasks History</button>


 <div id="map"></div>
 <script type="text/javascript" src="map.js"></script> 


<script> 
 var map = L.map('map').setView([38.246242, 21.7350847], 15);

 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
 }).addTo(map);   //  Add the tile layer to the map , is where the map is displayed from 
 
</script> 
<!-- 
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="map.js"></script> -->




</body>

</html>
