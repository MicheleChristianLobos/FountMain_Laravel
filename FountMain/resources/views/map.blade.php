<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    
    <!--Per il tema della pagina (e non solo)-->
    <link rel="stylesheet" href="../css/theme.css" >
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

            <!--Pulsante di cambio tema-->
            <div>
                <button id="theme-toggle" type="button" class="btn btn-outline-secondary">Light Theme</button>
            </div>
        </div>
    </nav>

    <!--Titolo-->
    <h1 style="text-align: center;padding-top: 1%;font-family:fantasy;font-size:100px">The FountMain Map</h1>

    <div class="centered" style="padding-bottom:5%">
        <div id="map" ></div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!--Importazione script per la mappa e per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="../js/map.js"></script>
    <script src="../js/theme.js"></script>

</body>
</html>
