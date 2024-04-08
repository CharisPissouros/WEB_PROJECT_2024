function isAdmin(){

    //check if the user is an admin with the credentials.
    return true;

}

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

// var map = L.map('map').setView([51.505, -0.09], 13);

// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(map);

// L.marker([51.5, -0.09]).addTo(map)
//     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
//     .openPopup();



 if (amdin == true ){
    //admin is able to add the base marker 
    var marker =  L.marker([51.5, -0.09] , {draggable : true}).addTo(map)
    marker.on('dragend', function (event) { //when the marker is dragged , the event is called to change the data of the marker.
        var marker = event.target; // the marker that was dragged
        var position = marker.getLatLng(); // the position of the marker is saved in the variable position
        console.log(position); // You can save the marker position to your database here
        alert('Marker position: ' + position.toString()); // an alert of a string form of the position
 })
} else {

    alert("Your not allowed to add the base marker");

 }
// Prompt the user to select their role (civilian or rescuer)
var role = prompt("Are you a civilian or a rescuer?"); // check by their credentials

// Check the role and display the appropriate message
if (role === "civilian") {
    var offerOrRequest = prompt("Do you want to make an offer or a request?");

    if (offerOrRequest === "offer") {
        var offerMarker = L.marker([51.51, -0.1]).addTo(map)
            .bindPopup('This is an offer marker.')
            .openPopup();
    } else if (offerOrRequest === "request") {
        var requestMarker = L.marker([51.52, -0.1]).addTo(map)
            .bindPopup('This is a request marker.')
            .openPopup();
    } else {
        alert("Invalid choice. Please try again.");
    }

} else if (role === "rescuer") {
    //alert("You are a rescuer. You can create pop-up requests.");
    // Add code here to handle rescuer pop-up requests
} else {
    alert("Invalid role. Please try again.");
}