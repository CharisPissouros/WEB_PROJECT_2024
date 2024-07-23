var map = L.map('map').setView([38.246242, 21.7350847], 16);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);   //  Add the tile layer to the map , is where the map is displayed from 
//add and include session to check who is logged in and what role they have.
include ('fuctions.php');
include ('get_from_database.php');



var resuerIcon = L.icon({
  iconUrl: 'rescuer.jpg',  
    iconSize: [25, 45], // size of the icon
    iconAnchor: [25, 64]
})
var offerIcon = L.icon({
    iconUrl: 'offer.png',  
      iconSize: [25, 45], // size of the icon
      iconAnchor: [25, 64]    
  })
  var requestIcon = L.icon({
    iconUrl: 'request.png',  
      iconSize: [25, 45], // size of the icon
      iconAnchor: [25, 64]    
  })
  var baseIcon = L.icon({
  iconUrl: 'base.png',  
    iconSize: [25, 45], // size of the icon
    iconAnchor: [25, 64]  
  })

// var map = L.map('map').setView([51.505, -0.09], 13);

// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(map);

// L.marker([51.5, -0.09]).addTo(map)
//     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
//     .openPopup();



 if (amdin == true ){
    //admin is able to add the base marker 
    var Bmarker =  L.marker([51.5, -0.09] , {draggable : true}).addTo(map)
    Bmarker = setIcon(baseIcon);
    Bmarker.on('dragend', function (event) { //when the marker is dragged , the event is called to change the data of the marker.
        var Bmarker = event.target; // the marker that was dragged
        var position = Bmarker.getLatLng(); // the position of the marker is saved in the variable position
        console.log(position); // You can save the marker position to your database here
        alert('Marker position: ' + position.toString()); // an alert of a string form of the position
 })

} else if (civilian == true){
    var Cmarker = L.marker([51.5, -0.09], {draggable : false}).addTo(map)
    Cmarker = setIcon(offerIcon);
 
}else if (rescuer == true){
    var Rmarker = L.marker([51.5, -0.09], {draggable : false}).addTo(map)
    Rmarker = setIcon(requestIcon);
 } else{

     alert("invalid role");
 }
// // Prompt the user to select their role (civilian or rescuer)
// var role = prompt("Are you a civilian or a rescuer?"); // check by their credentials

// // Check the role and display the appropriate message
// if (role === "civilian") {
//     var offerOrRequest = prompt("Do you want to make an offer or a request?");

//     if (offerOrRequest === "offer") {
//         var offerMarker = L.marker([51.51, -0.1]).addTo(map)
//             .bindPopup('This is an offer marker.')
//             .openPopup();
//     } else if (offerOrRequest === "request") {
//         var requestMarker = L.marker([51.52, -0.1]).addTo(map)
//             .bindPopup('This is a request marker.')
//             .openPopup();
//     } else {
//         alert("Invalid choice. Please try again.");
//     }

// } else if (role === "rescuer") {
//     //alert("You are a rescuer. You can create pop-up requests.");
//     // Add code here to handle rescuer pop-up requests
// } else {
//     alert("Invalid role. Please try again.");
// }
// alert("Your not allowed to add the base marker");



