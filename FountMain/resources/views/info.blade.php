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
                            <li><a class="dropdown-item" href="./registration.blade.php">Registration</a></li>
                            <li><a class="dropdown-item" href="./login.blade.php">Login</a></li>
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

                <!-- Ripeti per ogni progetto -->
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

                <!-- Aggiungi altre idee -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">3. Web App per la Gestione di Progetti di Classe</h5>
                            <p class="card-text">Gestione Team semplificato per organizzare i lavori di gruppo con task, scadenze e file.</p>
                            <span class="badge bg-primary">CodeIgniter</span>
                            <span class="badge bg-secondary">Firebase</span>
                            <span class="badge bg-secondary">Drag & Drop API</span>
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
                                <strong>Questo progetto è stato realizzato sfruttando funzionalità prese dal framework Laravel</strong><br>
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
                                <strong>Le pagine (quindi lato view) sono state formate grazie a bootstrap e un pizzico di copilot (più per il CSS)</strong><br>
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
                                <strong>Questo progetto è stato realizzato sfruttando funzionalità prese dal framework Laravel</strong><br>
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
                                <strong>Questo progetto è stato realizzato sfruttando funzionalità prese dal framework Laravel</strong><br>
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
                                <strong>Questo progetto è stato realizzato sfruttando funzionalità prese dal framework Laravel</strong><br>
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
                                <strong>Questo progetto è stato realizzato sfruttando funzionalità prese dal framework Laravel</strong><br>
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
    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    
    <!--Importazione script per la mappa e per il tema della pagina (+ qualche altro punto grafico a parte in theme.js)-->
    <script src="../js/map.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>
