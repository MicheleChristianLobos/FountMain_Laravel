//Gestione del tema scuro e chiaro

const toggleButton = document.getElementById("theme-toggle");
const body = document.body;
const logo = document.getElementById("logo");

// Controlla il tema salvato e il logo corrispondente
if (localStorage.getItem("theme") === "light") {
    body.classList.add("light-mode");
    toggleButton.textContent = "Dark Theme";
    logo.src = "../img/FountMainLogo.png"; // Logo chiaro
}

// Cambia tema e aggiorna il logo
toggleButton.addEventListener("click", function() {
    body.classList.toggle("light-mode");

    if (body.classList.contains("light-mode")) {
        localStorage.setItem("theme", "light");
        toggleButton.textContent = "Dark Theme";
        logo.src = "../img/FountMainLogo.png"; // Cambia al logo chiaro
    } else {
        localStorage.setItem("theme", "dark");
        toggleButton.textContent = "Light Theme";
        logo.src = "../img/FountMainLogo2.png"; // Cambia al logo scuro
    }
});
