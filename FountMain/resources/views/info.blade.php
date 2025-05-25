<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    
    <!--Per il tema della pagina (e non solo)-->
    <link rel="stylesheet" href="{{ asset('/css/theme.css') }}" >

</head>
<body>
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ asset('/') }}" style="color:gray">FountMain</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page">Home page</a>
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
                            <li><a class="dropdown-item" href="{{ asset('/login') }}">Login</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item disabled" href=""><strong>> More info</strong></a></li>
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
    <h1 style="text-align: center;padding-top: 1%;font-family:fantasy;font-size:100px;">Project Info</h1>
    
    <div style="padding-top:4%">
        <!-- Lista delle idee -->
        <div class="container" >
            <div class="row">
                <!-- Esempio di progetto -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Laravel</h5>
                            <p class="card-text">Un framework per gestire alcune funzioni più da lato server che client.</p>
                            <span class="badge bg-primary">Server</span>
                            <span class="badge bg-secondary">Database</span>
                            <span class="badge bg-secondary">MySQL</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">XAMPP</h5>
                            <p class="card-text">XAMPP è una piattaforma software multipiattaforma e libera costituita da Apache HTTP Server, il DBMS MariaDB e tutti gli strumenti necessari per utilizzare i linguaggi di programmazione PHP e Perl.</p>
                            <span class="badge bg-primary">Apache</span>
                            <span class="badge bg-secondary">MariaDB</span>
                            <span class="badge bg-secondary">PHP/Perl</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Apache</h5>
                            <p class="card-text">Apache è il server WEB, Open-Source, utilizzato da XAMPP (Fondamentale per questo progetto visto che è una Web Application)</p>
                            <span class="badge bg-primary">Apache</span>
                            <span class="badge bg-secondary">HTTP</span>
                            <span class="badge bg-secondary">Server Web</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">MariaDB</h5>
                            <p class="card-text">Inizialmente XAMPP utilizzava MySQL, ora invece è stato sostituito con MariaDB.<br>MariaDB è il database Open-Source contenente (in questo progetto) le tabelle degli utenti, fontane, ecc. Grazie a XAMPP, c'è una visualizzazione grafica WEB per la gestione del database in modo da agevolare i programmatori.</p>
                            <span class="badge bg-primary">XAMPP</span>
                            <span class="badge bg-secondary">Server Web</span>
                            <span class="badge bg-secondary">MySQL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Descrizione richiesta-->
    <div style="padding-bottom: 3%;">
        <div class="accordion accordion-flush bg-dark text-light mt-5 mb-5" id="accordionFlushExample">
            <!-- Esempi di Progetti -->
            <div class="accordion-item bg-dark border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    🔹Creare una web application con framework php codeigniter (accettato anche laravel)
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-light">
                                Questo progetto è stato realizzato sfruttando funzionalità prese dal framework <strong>Laravel</strong><br>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-1" aria-expanded="false" aria-controls="flush-collapseTwo-1">
                    🔹L'applicazione dev'essere bella, funzionante e consistente
                    </button>
                </h2>
                <div id="flush-collapseTwo-1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-light">
                                Le pagine (lato view) sono state formate grazie a <strong>bootstrap</strong> e un pizzico di <strong>copilot</strong> (più per il CSS)<br>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-2" aria-expanded="false" aria-controls="flush-collapseTwo-2">
                    🔹Consentiti gruppi max 2 persone che si specializzino ma abbiano sempre la consapevolezza dell'intero progetto
                    </button>
                </h2>
                <div id="flush-collapseTwo-2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-light">
                               Programmatori:  <strong><br>Michele Christian Lobos <br>Nicola Schianchi.</strong><br>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-3" aria-expanded="false" aria-controls="flush-collapseTwo-3">
                    🔹Consegna a maggio 2025 in data da definire
                    </button>
                </h2>
                <div id="flush-collapseTwo-3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-light">
                                Preferibilmente questo progetto verrà presentato il <strong>30/05/2025</strong><br>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-4" aria-expanded="false" aria-controls="flush-collapseTwo-4">
                    🔹Ogni tot lezioni verrà richiesto ad ogni progetto di presentare lo stato attuale
                    </button>
                </h2>
                <div id="flush-collapseTwo-4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-light">
                                ...
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-5" aria-expanded="false" aria-controls="flush-collapseTwo-5">
                    🔹Venerdì 28/03 proporre Chi/CheCosa Esempi e tecnologie di web application
                    </button>
                </h2>
                <div id="flush-collapseTwo-5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-light">
                                ...
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer class="copyrights text-white text-center py-3 fixed-bottom">
        <p>2025 FountMain - Tutti i diritti riservati.</p>
    </footer>
    
    <!--per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="{{ asset('/js/theme.js') }}"></script>
</body>
</html>
