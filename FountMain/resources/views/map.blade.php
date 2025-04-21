<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <style>
        #map { height: 500px; width: 800px;}
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <!--NavBar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./welcome.blade.php">FountMain</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!--Titolo-->
    <h1 style="text-align: center;">The FountMain Map</h1>

    <div class="centered">
        <div id="map" ></div>
    </div>

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

        map.setView([lat, lon], 13);

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
                            .bindPopup(`<b>Fontana nelle coordinate:<br>${el.lat}(Latitudine)<br> ${el.lon}(Longitudine)`);
                    }
                });
            })
            .catch(error => console.error("Errore nel caricamento dei dati:", error));
        });
    </script>

</body>
</html>
