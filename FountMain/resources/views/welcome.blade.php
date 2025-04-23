<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <style>
        #map { height: 300px; }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 60px; /* Aumenta la dimensione */
            height: 60px;
        }
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .centered img {
            margin-bottom: 0;
            height: 220px;
            width: 480px;
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
            <a class="nav-link disabled" aria-current="page" href="#">Home page</a>
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
                <li><a class="dropdown-item" href="./map.blade.php">Map</a></li>
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
    <!--<h1 style="text-align: center;">Welcome</h1>-->
    <div class="centered">
        <img src="../img/FountMainLogo.png" ></img>
    </div>

    <div class="container mt-4">
    <div class="row justify-content-center"> <!-- Centra le carte -->
        <div class="col-md-4">
            <div style="text-align: center;">
                <div class="card" style="width: 18rem; text-align: center;">
                    <div id="map"></div>
                    <div class="card-body">
                        <h5 class="card-title">Mappa</h5>
                        <p class="card-text">In questa mappa è possibile trovare le fontane nel raggio di 8 Km dal punto in cui ti trovi.</p>
                        <a href="./map.blade.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-md-4">
            <div class="card" style="width:300px">
                <img style = "heigth:300px; width:300px" src="https://www.mrw.it/wp-content/uploads/2019/12/crea-account-scaled.jpg" class="card-img-top" alt="Immagine">
                <div class="card-body">
                    <h5 class="card-title">Registrazione</h5>
                    <p class="card-text">Puoi registrarti se ti va. In questo modo puoi salvare le fontane che vuoi e coomentarle.</p>
                    <a href="#" class="btn btn-primary">Scopri di più</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="width:300px">
                <img style = "heigth:300px; width:300px" src="data:image/jpeg;base64,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" class="card-img-top" alt="Immagine">
                <div class="card-body">
                    <h5 class="card-title">Helo</h5>
                    <p class="card-text">Questa è la pagina principale del sito FountMain</p>
                    <a href="#" class="btn btn-primary">Benvenuto :></a>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--<div id="map"></div>-->

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
                        .bindPopup(`<b>Coords fountain:<br>Lat ${el.lat}<br>Lon ${el.lon}`);
                }
            });
        })
        .catch(error => console.error("Errore nel caricamento dei dati:", error));
    });


    </script>

</body>
</html>
