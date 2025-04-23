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
            padding-top: 60px;
        }
    </style>
</head>
<body>

    <!--NavBar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="./welcome.blade.php" style="color:gray">FountMain</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="#">Interactive map</a>
                    </li>
                    <li class="nav-item">
                        <!--Il target="_blank" permette di aprire una nuova finestra con il link indicato e non sostituire la propria pagina con un'altra-->
                        <a class="nav-link" href="https://github.com/MicheleChristianLobos/FountMain_Laravel.git" target="_blank">GitHub</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="Altre pagine" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Other pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./registration.blade.php">Registration</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">More info</a></li>
                        </ul>
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
            .bindPopup("<b>You are here</b>").openPopup();

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
                            .bindPopup(`<b>Fountain coords:<br>Lat ${el.lat}<br>Lon ${el.lon}`);
                    }
                });
            })
            .catch(error => console.error("Errore nel caricamento dei dati:", error));
        });
    </script>

</body>
</html>
