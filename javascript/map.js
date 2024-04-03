function isAdmin(){

    //check if the user is an admin with the credentials.
    return true;

}


var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('A pretty CSS popup.<br> Easily customizable.')
    .openPopup();



 if (amdin == true ){
    //admin is able to add the base marker 
    var marker =  L.marker([51.5, -0.09] , {draggable : true}).addTo(map)
    marker.on('dragend', function (event) {
        var marker = event.target;
        var position = marker.getLatLng();
        console.log(position); // You can save the marker position to your database here
        alert('Marker position: ' + position.toString());
 })
} else {

    alert("Your not allowed to add the base marker");

 }
// Prompt the user to select their role (civilian or rescuer)
var role = prompt("Are you a civilian or a rescuer?"); // check by their credentials

// Check the role and display the appropriate message
if (role === "civilian") {
    //alert("You are a civilian. You can create pop-up requests.");
    // Add code here to handle civilian pop-up requests
} else if (role === "rescuer") {
    //alert("You are a rescuer. You can create pop-up requests.");
    // Add code here to handle rescuer pop-up requests
} else {
    alert("Invalid role. Please try again.");
}