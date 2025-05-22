<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
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
            background-color: #fff;
        }

        /*carosello*/
        .carousel-container {
            width: 100%;
            height: 100vh;
            overflow: hidden;
            position: relative;
            border: none; /* Rimosso bordo */
            border-radius: 0; /* Rimosso bordo arrotondato */
        }

        .carousel-vertical {
            display: flex;
            flex-direction: column;
            animation: scrollVertical 30s linear infinite; /* 30s = 5s per immagine, puoi regolare */
            height: 100vh;
        }

        .carousel-item {
            flex: 0 0 100vh; /* Altezza fissa per ogni immagine */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-item img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
            border-radius: 0;
        }

        /* Animazione verticale */
        @keyframes scrollVertical {
            0%   { transform: translateY(0); }
            16.66% { transform: translateY(-100vh); }
            33.33% { transform: translateY(-200vh); }
            50%    { transform: translateY(-300vh); }
            66.66% { transform: translateY(-400vh); }
            83.33% { transform: translateY(-500vh); }
            100%   { transform: translateY(0); }
        }

        /* Layout a due colonne full height */
        .main-row {
            height: 100vh;
        }
        .carousel-col {
            padding: 0;
        }
        .form-col {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
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
                            <li><a class="dropdown-item disabled" href=""><strong>> Registration</strong></a></li>
                            <li><a class="dropdown-item" href="./login.blade.php">Login</a></li>
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

    <div class="row main-row">
        <!-- Colonna per il carosello (sinistra) -->
        <div class="col-md-6 carousel-col">
            <div class="carousel-container">
                <div class="carousel-vertical">
                    <!-- Immagine 1 -->
                    <div class="carousel-item">
                        <img src="https://molfettadiscute.altervista.org/wp-content/uploads/2021/06/Fontanella-Molfetta-Front.-Ph.-Dario-Lazzaro-Palombella-2.jpg" alt="Immagine 1">
                    </div>
                    <!-- Immagine 2 -->
                    <div class="carousel-item">
                        <img src="https://www.amam.it/wp-content/uploads/2024/05/fontanella-sin-1.png" alt="Immagine 2">
                    </div>
                    <!-- Immagine 3 -->
                    <div class="carousel-item">
                        <img src="https://formedacqua.com/wp-content/uploads/2022/07/blog_risparmio2.jpg" alt="Immagine 3">
                    </div>
                    <!-- Immagine 4 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8goabj2DQYnOIUhvh7SjNprmWUfUsgEuDGA&s" alt="Immagine 3">
                    </div>
                    <!-- Immagine 5 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa2daWMQkzNkmohIpUbUeFkltBlkDSOZapTg&s" alt="Immagine 3">
                    </div>
                    <!-- Immagine 6 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWXEBs0LDMXUTK4K2oL7pYov94L48hZ62W3A&s" alt="Immagine 3">
                    </div>
                </div>
            </div>
        </div>
        <!-- Colonna del form (destra) -->
        <div class="col-md-6 form-col">
            <div style="max-width: 400px; width: 100%;">
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


    <!--Footer-->
    <footer class="copyrights text-white text-center py-3 fixed-bottom">
        <p>2025 FountMain - Tutti i diritti riservati.</p>
    </footer>
    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    
    <!--Importazione script per la mappa e per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="../js/map.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>
