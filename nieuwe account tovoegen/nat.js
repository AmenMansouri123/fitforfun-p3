// =========================
// Login pagina JS
// =========================

// Selecteer het formulier
const loginForm = document.querySelector("form");

// Voeg submit event listener toe
loginForm.addEventListener("submit", function(e) {
    // Haal waarden op
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Basis validatie
    if (email === "" || password === "") {
        e.preventDefault(); // voorkom submit
        alert("Vul zowel e-mail als wachtwoord in.");
        return;
    }

    // Optioneel: kan hier nog meer client-side checks doen
    // Bijvoorbeeld regex voor e-mail of minimum wachtwoordlengte
});