// =========================
// Voorbeeld lessenlijst met prijzen
// =========================
const lessons = [
    { name: "Yoga", price: 15, description: "Verbeter flexibiliteit en ontspanning." },
    { name: "Spinning", price: 20, description: "Intensieve cardio training." },
    { name: "Kickboksen", price: 25, description: "Verbeter kracht en conditie." },
    { name: "Pilates", price: 18, description: "Core en houding training." },
    { name: "Fitness", price: 30, description: "Volledige kracht en conditie." }
];

// =========================
// Selecteer form en container
// =========================
const form = document.querySelector(".search-form");
const errorEl = document.getElementById("error");

// Maak een container voor resultaten
let resultsContainer = document.createElement("div");
resultsContainer.classList.add("cards");
form.parentNode.appendChild(resultsContainer);

// =========================
// Functie om resultaten te tonen
// =========================
function displayResults(filteredLessons) {
    resultsContainer.innerHTML = ""; // leeg eerst
    errorEl.textContent = "";        // reset foutmelding

    if (filteredLessons.length === 0) {
        // =========================
        // Unhappy scenario: geen resultaten
        // =========================
        errorEl.textContent = "Geen lessen gevonden binnen deze prijs. Pas de prijs aan.";
        return;
    }

    // =========================
    // Happy scenario: toon lessen als cards
    // =========================
    filteredLessons.forEach(lesson => {
        const card = document.createElement("div");
        card.classList.add("card");
        card.innerHTML = `
            <h3>${lesson.name}</h3>
            <p>${lesson.description}</p>
            <p>Prijs: €${lesson.price}</p>
            <button onclick="alert('Meer info over ${lesson.name}')">Bekijk les</button>
        `;
        resultsContainer.appendChild(card);
    });
}

// =========================
// Event listener form submit
// =========================
form.addEventListener("submit", function(e){
    e.preventDefault(); // voorkom pagina reload

    const min = parseFloat(form.min.value);
    const max = parseFloat(form.max.value);

    // Basisvalidatie
    if (min > max) {
        errorEl.textContent = "Min prijs mag niet groter zijn dan max prijs.";
        resultsContainer.innerHTML = "";
        return;
    }

    // Filter lessen
    const filteredLessons = lessons.filter(lesson => lesson.price >= min && lesson.price <= max);

    // Toon resultaten
    displayResults(filteredLessons);
});