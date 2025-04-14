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
        // Inizializza la mappa centrata su una posizione
        var map = L.map('map').setView([44.8015, 10.3279], 13); // Parma, Italia

        // Aggiungi il layer della mappa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Aggiungi un marker
        L.marker([44.8015, 10.3279]).addTo(map)
            .bindPopup("Parma, Italia! 🌍")
            .openPopup();
    </script>

</body>
</html>
