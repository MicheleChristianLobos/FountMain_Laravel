//Gestione del tema scuro/chiaro

const toggleButton = document.getElementById("theme-toggle");
const body = document.body;
const logo = document.getElementById("logo");
const barraScorrimento = document.getElementById("::-webkit-scrollbar-thumb");

// Controlla il tema salvato e il logo corrispondente
if (localStorage.getItem("theme") === "light") {
    body.classList.add("light-mode");
    toggleButton.textContent = "Dark Theme";
    if(logo)//Se il logo è presente nella pagina
        logo.src = "./img/FountMainLogo.png"; // Logo chiaro
}

// Cambia tema e aggiorna il logo
toggleButton.addEventListener("click", function() {
    body.classList.toggle("light-mode");

    if (body.classList.contains("light-mode")) {
        localStorage.setItem("theme", "light");
        toggleButton.textContent = "Dark Theme";    //Testo del pulsante in "Dark Theme"
        if(logo)//Se il logo è presente nella pagina
            logo.src = "./img/FountMainLogo.png"; //Cambiamento del logo in stile chiaro
    } else {
        localStorage.setItem("theme", "dark");
        toggleButton.textContent = "Light Theme";   //Testo del pulsante in "Light Theme"
        if(logo)    //Se il logo è presente nella pagina
            logo.src = "./img/FountMainLogo2.png"; //Cambiamento del logo in stile scuro
    }
});
