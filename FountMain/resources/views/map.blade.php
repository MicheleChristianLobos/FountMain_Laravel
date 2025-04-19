<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Mappa Interattiva</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; }
    </style>
</head>
<body>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>

    // Inizializza la mappa
    var map = L.map('map').setView([44.8015, 10.3279], 13); 

    // Aggiungi il layer della mappa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    navigator.geolocation.getCurrentPosition(function(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    var raggioKm = 8; // Modifica il raggio di ricerca

    var latMin = lat - (raggioKm / 111);
    var latMax = lat + (raggioKm / 111);
    var lonMin = lon - (raggioKm / (111 * Math.cos(lat * Math.PI / 180)));
    var lonMax = lon + (raggioKm / (111 * Math.cos(lat * Math.PI / 180)));

    // Definisci l'icona personalizzata
    var userIcon = L.icon({
        iconUrl: 'https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg',
        iconSize: [15, 15],
        iconAnchor: [7, 7]
    });

    // Aggiungi il marker dell'utente sulla mappa (DENTRO la funzione)
    L.marker([lat, lon], { icon: userIcon }).addTo(map)
        .bindPopup("<b>La tua posizione</b>").openPopup();

    // Crea la query Overpass dinamica con il bounding box calcolato
    var query = `
        [out:json];
        node
        ["amenity"="drinking_water"]
        (${latMin},${lonMin},${latMax},${lonMax});
        out;
    `;

    var url = "https://overpass-api.de/api/interpreter?data=" + encodeURIComponent(query);

    fetch(url)
        .then(response => response.json())
        .then(data => {
            data.elements.forEach(el => {
                if (el.lat && el.lon) {
                    var marker = L.marker([el.lat, el.lon]).addTo(map)
                        .bindPopup(`<b>Fontana trovata!</b><br>Posizione: ${el.lat}, ${el.lon}`);
                }
            });
        })
        .catch(error => console.error("Errore nel caricamento dei dati:", error));
    });


    </script>

</body>
</html>
