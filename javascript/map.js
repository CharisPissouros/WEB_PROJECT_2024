
// Check if the map is already initialized
if (typeof map === 'undefined') {
    var map = L.map('map').setView([38.246242, 21.7350847], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map); // Add the tile layer to the map, this is where the map is displayed from
}

// Add and include session to check who is logged in and what role they have.

let marker, circle, zoomed;

navigator.geolocation.watchPosition(success, error);

function success(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var accuracy = position.coords.accuracy;

    if (marker) { // Check if the marker is already on the map
        map.removeLayer(marker); // Remove the marker from the map
        map.removeLayer(circle); // Remove the circle from the map
    }

    marker = L.marker([latitude, longitude]).addTo(map); // Add the marker to the map
    circle = L.circle([latitude, longitude], { radius: accuracy }).addTo(map); // Add the circle to the map

    if (!zoomed) { // Check if the map is zoomed in, adjust the zoom level only one time
        zoomed = map.fitBounds(circle.getBounds()); // Fit the map to the circle
    }

    map.setView([latitude, longitude]); // Set the view of the map to the current location
}

function error(err) {
    if (err.code === 1) {
        alert("Unable to retrieve your location");
    } else {
        alert("Unable to retrieve your location via a technical problem: " + err.message);
    }
}

var rescuerIcon = L.icon({
    iconUrl: 'rescuer.jpg',
    iconSize: [25, 45], // Size of the icon
    iconAnchor: [25, 64]
});

var offerIcon = L.icon({
    iconUrl: 'offer.png',
    iconSize: [25, 45], // Size of the icon
    iconAnchor: [25, 64]
});

var requestIcon = L.icon({
    iconUrl: 'request.png',
    iconSize: [25, 45], // Size of the icon
    iconAnchor: [25, 64]
});

var baseIcon = L.icon({
    iconUrl: 'base.png',
    iconSize: [25, 45], // Size of the icon
    iconAnchor: [25, 64]
});

if (admin === true) {
    // Admin is able to add the base marker
    var Bmarker = L.marker([51.5, -0.09], { draggable: true }).addTo(map);
    Bmarker.setIcon(baseIcon);
    Bmarker.on('dragend', function (event) { // When the marker is dragged, the event is called to change the data of the marker.
        var Bmarker = event.target; // The marker that was dragged
        var position = Bmarker.getLatLng(); // The position of the marker is saved in the variable position
        console.log(position); // You can save the marker position to your database here
        alert('Marker position: ' + position.toString()); // An alert of a string form of the position
    });
} else if (civilian === true) {
    var Cmarker = L.marker([51.5, -0.09], { draggable: false }).addTo(map)
                   .bindPopup( )
                   .openPopup();
    Cmarker.setIcon(offerIcon);
    
} else if (rescuer === true) {
    var Rmarker = L.marker([51.5, -0.09], { draggable: false }).addTo(map);
    Rmarker.setIcon(requestIcon);
} else {
    alert("Invalid role");
}


// L.marker([51.5, -0.09]).addTo(map)
//     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
//     .openPopup();

// setLatLng(<LatLng> latlng) //Sets the geographical point where the overlay will open.

