<?php
session_start();
include("get_from_database.php");//connect with db to know who is logged in
include("functions.php");
if($_SESSION['role'] != "user" && $_SESSION['role'] != "admin" && $_SESSION['role'] != "diasostis")
{
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" 
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" 
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" 
            crossorigin=""></script>
    <style>
        html, body, #map {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .buttons {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
        }
    </style>

</head>
<body>
<div id="map"></div>
<button id="CheckTasksHistory" class="buttons">Tasks History</button>
 <script type="text/javascript" src="../javascript/map.js"></script>
<!-- 
<script> 
    var map = L.map('map').setView([38.246242, 21.7350847], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);   //  Add the tile layer to the map, is where the map is displayed from 
</script> -->
</body>
</html>
