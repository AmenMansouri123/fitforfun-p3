// Wacht tot pagina geladen is
document.addEventListener("DOMContentLoaded", function () {

    // Pak formulier en inputs
    const form = document.querySelector(".search-form");
    const minInput = document.querySelector("input[name='min']");
    const maxInput = document.querySelector("input[name='max']");

    // Maak foutmelding element
    const error = document.createElement("p");
    error.classList.add("error");
    form.appendChild(error);

    // Wanneer gebruiker op zoeken klikt
    form.addEventListener("submit", function (e) {

        const min = parseInt(minInput.value);
        const max = parseInt(maxInput.value);

        // Reset foutmelding
        error.textContent = "";

        // ❌ Unhappy scenario (frontend)
        if (min > max) {
            e.preventDefault(); // stop form

            error.textContent = "Min prijs mag niet groter zijn dan max prijs";
        }

        if (min < 0 || max < 0) {
            e.preventDefault();

            error.textContent = "Prijs mag niet negatief zijn";
        }

    });

});