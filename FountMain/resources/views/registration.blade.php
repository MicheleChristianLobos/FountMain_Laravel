<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    
    <!--API LeafLet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    
    <!--Per il tema della pagina (e non solo)-->
    <link rel="stylesheet" href="../css/theme.css" >
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
                        <a class="nav-link disabled" aria-current="page" href="#">Sign-in page</a>
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
    

    <!--Importazione script per la mappa e per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="../js/map.js"></script>
    <script src="../js/theme.js"></script>
</body>



<!--Footer-->
<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-4 py-2 border-top">
    <div class="col mb-3">
        <a href="/" class="d-flex align-items-center mb-3 text-decoration-none">
            <svg class="bi me-2" width="40" height="32" aria-hidden="true">
                <use xlink:href="#bootstrap"></use>
            </svg>
        </a>
        <p class="text-body-secondary">FountMain© 2025</p>
    </div>

    <div class="col mb-3">
        <h5>Navigation</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">About</a></li>
        </ul>
    </div>

    <div class="col mb-3">
        <h5>Resources</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="https://github.com/MicheleChristianLobos/FountMain_Laravel.git" class="nav-link p-0" target="_blank">GitHub</a></li>
            <li class="nav-item mb-2"><a href="./map.blade.php" class="nav-link p-0">Map</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">More info</a></li>
        </ul>
    </div>
</footer>
</html>