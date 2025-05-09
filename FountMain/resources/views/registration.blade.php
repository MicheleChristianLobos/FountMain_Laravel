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
    

    <!--Importazione script per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="../js/theme.js"></script>


    <!-- Footer -->
    <footer class="bg-dark py-4">
        <container>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h5>FountMain</h5>
                        <p>© 2025 FountMain. All rights reserved.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Features</a></li>
                            <li><a href="#" class="text-white text-decoration-none">Pricing</a></li>
                            <li><a href="#" class="text-white text-decoration-none">FAQs</a></li>
                            <li><a href="#" class="text-white text-decoration-none">About</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Follow Us</h5>
                        <ul class="list-unstyled">
                            <li><a href="https://github.com/MicheleChristianLobos/FountMain_Laravel.git" class="text-white text-decoration-none" target="_blank">GitHub</a></li>
                            <li><a href="./map.blade.php" class="text-white text-decoration-none">Map</a></li>
                            <li><a href="./info.blade.php" class="text-white text-decoration-none">More Info</a></li>
                        </ul>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="mb-0">Built with <a href="https://getbootstrap.com/" class="text-white text-decoration-none" target="_blank">Bootstrap</a></p>
                </div>
            </div>
        </container>
    </footer>
</body>
</html>