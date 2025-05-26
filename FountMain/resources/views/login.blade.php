<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <title>Log in</title>
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    
    <!--Per il tema della pagina (e non solo)-->
    <link rel="stylesheet" href="{{ asset('/css/theme.css') }}" >
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
            position: relative; /* Necessario per posizionare l'overlay */
            border: none;
            border-radius: 0;
        }

        .carousel-vertical {
            display: flex;
            flex-direction: column;
            animation: scrollVertical 30s linear infinite;
            height: 100vh;
        }

        .carousel-item {
            flex: 0 0 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-item img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        /* Overlay semitrasparente */
        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(36, 28, 49, 0.38); /* Colore nero con opacità 50% */
            backdrop-filter: blur(5px); /* Effetto ovattato */
            z-index: 1; /* Sopra il carosello */
            pointer-events: none; /* Permette di interagire con gli elementi sottostanti */
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
    <nav class="navbar navbar-expand-lg" style="z-index: 2;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ asset('/') }}" style="color:gray">FountMain</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page">Sign-in page</a>
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
                            <li><a class="dropdown-item" href="{{ asset('/map') }}">Map</a></li>
                            <li><a class="dropdown-item" href="{{ asset('/signin') }}">Registration</a></li>
                            <li><a class="dropdown-item disabled" href=""><strong>> Login</strong></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ asset('/info') }}">More info</a></li>
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

    <div class="row main-row" style="z-index: 1;">
        <!-- Colonna per il carosello (sinistra) -->
        <div class="col-md-6 carousel-col">
            <div class="carousel-container">
                <div class="carousel-overlay"></div>
                <div class="carousel-vertical">
                    <!-- Immagine 1 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtYqdscREayz1-VcrlmM5PF5up5FFEEY_w0g&s" alt="Immagine 1">
                    </div>
                    <!-- Immagine 2 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTR8VPr9Ry4YDJuZmneki03KM7ZGB7AP7UmSA&s" alt="Immagine 2">
                    </div>
                    <!-- Immagine 3 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThoqLzqI9wlkORpHKwX7iebh6cm3YgFlojzQ&s" alt="Immagine 3">
                    </div>
                    <!-- Immagine 4 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4gd0v-xGQC2HRR_vWNuEGISP_4py9YeP0Lw&s" alt="Immagine 3">
                    </div>
                    <!-- Immagine 5 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4T41nAGmWlhR8cmcFv1gRxMaqyt6vDfLqhA&s" alt="Immagine 3">
                    </div>
                    <!-- Immagine 6 -->
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0jgQS-OEqYOgNpZNh-kme3QzAq8HxnYRh_Q&s" alt="Immagine 3">
                    </div>
                </div>
            </div>
        </div>
        <!-- Colonna del form (destra) -->
        <div class="col-md-6 form-col" style="z-index: 3;">
            <div style="max-width: 400px; width: 100%;">
                <h2 class="mb-4">login</h2>
                <form action="/register" method="POST">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="enter your Email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="enter your Password" required>
                    </div>

                    <!-- Pulsante di invio -->
                    <button type="submit" class="btn btn-primary w-100">Log-in</button>
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
    
    <!--per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="{{ asset('/js/theme.js') }}"></script>
</body>
</html>
