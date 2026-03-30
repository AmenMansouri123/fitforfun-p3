// =========================
// Login validatie (frontend)
// =========================

// Selecteer formulier en error veld
const form = document.querySelector("form");
const error = document.getElementById("error");

// Luister naar submit
form.addEventListener("submit", function(e) {

    // Haal waarden op
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Reset foutmelding
    error.textContent = "";

    // =========================
    // Unhappy scenario (frontend)
    // =========================
    if (email === "" || password === "") {
        e.preventDefault(); // stopt form submit
        error.textContent = "Vul alle velden in.";
        return;
    }

    if (password.length < 3) {
        e.preventDefault();
        error.textContent = "Wachtwoord is te kort.";
        return;
    }

    // =========================
    // Happy scenario
    // Form gaat door naar PHP
    // =========================
});