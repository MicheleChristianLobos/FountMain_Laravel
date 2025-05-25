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


//Controlla lo stato del button del tema nella nav bar
document.getElementById("theme-toggle").addEventListener("click", function() {
    //Se il button per il tema nella nav bar è in light-mode, allora isLight conterrà True
    let isLight = document.body.classList.contains("light-mode");
    toggleMapTheme(isLight);
});

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
                    .bindPopup(`<b>Fountain coords:<br>Lat ${el.lat}<br>Lon ${el.lon}`);
            }
        });
    })
    .catch(error => console.error("Errore nel caricamento dei dati:", error));
});