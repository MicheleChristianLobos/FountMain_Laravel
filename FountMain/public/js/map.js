//Gestione della mappa (LeafLet)

// Inizializza la mappa
var map = L.map('map').setView([44.8015, 10.3279], 13); 


//Tema chiaro
var lightTiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
});

//Tema scuro
var darkTiles = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; CartoDB'
});

//Controllo del tema al caricamento della pagina
if (localStorage.getItem("theme") === "light") {
    lightTiles.addTo(map);
} else {
    darkTiles.addTo(map);
}

//Funzione di gestione del tema della mappa
function toggleMapTheme(isLight) {
    if (isLight) {
        map.removeLayer(lightTiles);
        darkTiles.addTo(map);
    } else {
        map.removeLayer(darkTiles);
        lightTiles.addTo(map);
    }
}


//Per aggiungere la fontana al database
function aggiungiFontana(lat, lon) {
    fetch('/FountMain/FountMain/public/fontane', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            nome: 'Fontana',
            lat: lat,
            lon: lon,
            img: ''
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'added') {
            alert('Fontana aggiunta al database!');
        } else if (data.status === 'already_exists') {
            alert('Fontana già presente nel database!');
        } else {
            alert('Errore: ' + (data.message || 'Impossibile aggiungere la fontana.'));
        }
    })
    .catch(error => alert('Errore di rete: ' + error));
}


//Rinomina fontana
function rinominaFontana(lat, lon) {
    const nuovoNome = prompt("Inserisci il nuovo nome della fontana:");
    if (!nuovoNome) return;

    fetch('/FountMain/FountMain/public/fontane/rinomina', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            lat: lat,
            lon: lon,
            nome: nuovoNome
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'ok') {
            alert('Fontana rinominata!');
        } else {
            alert('Errore: ' + (data.message || 'Impossibile rinominare la fontana.'));
        }
    })
    .catch(error => alert('Errore di rete: ' + error));
}


//Controlla lo stato del button del tema nella nav bar
document.getElementById("theme-toggle").addEventListener("click", function() {
    //Se il button per il tema nella nav bar è in light-mode, allora isLight conterrà True
    let isLight = document.body.classList.contains("light-mode");
    toggleMapTheme(isLight);
});

navigator.geolocation.getCurrentPosition(function(position) {
    
var lat = 44.8015;
var lon = 10.3279;

// var lat = position.coords.latitude;
// var lon = position.coords.longitude;

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

fetch('/FountMain/FountMain/public/fontane/list')
    .then(response => response.json())
    .then(fontaneDb => {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                data.elements.forEach(el => {
                    if (el.lat && el.lon) {
                        //Arrotondamento delle coordinate (By Copilot) così da non avere problemi di precisione per il confronto
                        const fontanaDb = fontaneDb.find(f =>
                            Math.round(f.lat * 1e6) === Math.round(el.lat * 1e6) &&
                            Math.round(f.lon * 1e6) === Math.round(el.lon * 1e6)
                        );
                        //Se il nome della fontana è presente nel database, lo utilizza, altrimenti lascia vuoto
                        const nomeFontana = fontanaDb ? fontanaDb.nome : '';
                        L.marker([el.lat, el.lon]).addTo(map)
                            .bindPopup(`
                                <b>${nomeFontana}</b><br>
                                lat:${el.lat}<br>lon:${el.lon}<br>
                                <img id="img-${el.lat}-${el.lon}" src="${fontanaDb && fontanaDb.img ? fontanaDb.img : 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Fontana_022.jpg/500px-Fontana_022.jpg'}" style="width:100%;"><br>
                                <input type="file" accept="image/*" onchange="caricaImmagine(event, ${el.lat}, ${el.lon})"><br>
                                <button onclick="rinominaFontana(${el.lat}, ${el.lon})">Rinomina fontana</button>
                                <br><br>
                                <button>salva</button>
                                <button onclick="aggiungiFontana(${el.lat}, ${el.lon})">Aggiungi al Database</button>
                            `);
                    }
                });
            });
    });
})

function caricaImmagine(event, lat, lon) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        // Mostra subito l'immagine nel popup
        document.getElementById(`img-${lat}-${lon}`).src = e.target.result;

        // Invia l'immagine al backend (come base64)
        fetch('/FountMain/FountMain/public/fontane/immagine', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                lat: lat,
                lon: lon,
                img: e.target.result // base64
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'ok') {
                alert('Immagine aggiornata!');
            } else {
                alert('Errore: ' + (data.message || 'Impossibile aggiornare l\'immagine.'));
            }
        })
        .catch(error => alert('Errore di rete: ' + error));
    };
    reader.readAsDataURL(file);
}