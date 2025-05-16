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
    <style>
        .form-container {
            max-width: 800px;
        }

        /*carosello*/
        .carousel-container {
            width: 443px;
            height: 443px;
            overflow: hidden;
            position: relative;
        }

        .carousel-vertical {
            display: flex;
            flex-direction: column;
            animation: scrollVertical 12s linear infinite;
        }

        .carousel-item {
            flex: 0 0 300px; /* Altezza fissa per ogni immagine */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Animazione verticale */
        @keyframes scrollVertical {
            0% {
                transform: translateY(0);
            }
            33% {
                transform: translateY(-300px);
            }
            66% {
                transform: translateY(-600px);
            }
            100% {
                transform: translateY(0);
            }
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
                            <li><a class="dropdown-item" href="./info.blade.php">More info</a></li>
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
    

    <div class="row">
        <!-- Colonna del form -->
        <div class="col-md-6" style="max-width: 400px;">
            <h2 class="mb-4">Registrazione</h2>
            <form action="/register" method="POST">
                <!-- Nome -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il tuo nome" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Inserisci la tua email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Inserisci la tua password" required>
                </div>

                <!-- Conferma Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Conferma la tua password" required>
                </div>

                <!-- Pulsante di invio -->
                <button type="submit" class="btn btn-primary w-100">Registrati</button>
            </form>
        </div>

        <!-- Colonna per il carosello -->
        <div class="col-md-6 d-flex align-items-center justify-content-center" style="margin-left: 30px;">
            <div class="carousel-container">
                <div class="carousel-vertical">
                    <div class="carousel-item">
                        <img src="https://molfettadiscute.altervista.org/wp-content/uploads/2021/06/Fontanella-Molfetta-Front.-Ph.-Dario-Lazzaro-Palombella-2.jpg" alt="Immagine 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.amam.it/wp-content/uploads/2024/05/fontanella-sin-1.png" alt="Immagine 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://formedacqua.com/wp-content/uploads/2022/07/blog_risparmio2.jpg" alt="Immagine 3">
                    </div>
                </div>
            </div>
            <div class="carousel-container">
                <div class="carousel-vertical">
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMRNAPyymBk65SRm_nB41xIs6aOZ4PXh3NRw&s" alt="Immagine 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ899dUpNoC2vCodTn_eSSAHHWYJouEWodanQ&s" alt="Immagine 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNGrthLgCM6NFkW1sWZ_1sETHAccqaR457uA&s" alt="Immagine 3">
                    </div>
                </div>
            </div>
        </div>

    <script>
        document.querySelector('.carousel-container').addEventListener('mouseover', function () {
            document.querySelector('.carousel-vertical').style.animationPlayState = 'paused';
        });

        document.querySelector('.carousel-container').addEventListener('mouseout', function () {
            document.querySelector('.carousel-vertical').style.animationPlayState = 'running';
        });
    </script>

    <!--Importazione script per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="../js/theme.js"></script>


    <!-- Footer -->
    <footer class="bg-dark py-4 text-white">
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