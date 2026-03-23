<?php

// Maak verbinding met database
$conn = new mysqli("localhost", "root", "", "lessen_db");

// Check of verbinding werkt
if ($conn->connect_error) {
    die("Connectie mislukt");
}

// Haal ingevulde prijs op uit formulier
$min = $_GET['min'];
$max = $_GET['max'];

// SQL query om lessen binnen prijs te zoeken
$sql = "SELECT * FROM lessen WHERE prijs BETWEEN $min AND $max";

// Voer query uit
$result = $conn->query($sql);

// Check of er resultaten zijn (happy of unhappy scenario)
if ($result->num_rows > 0) {

    // Loop door alle gevonden lessen
    while ($row = $result->fetch_assoc()) {
        echo $row['titel'];
    }

} else {

    // Geen resultaten gevonden (unhappy scenario)
    echo "Geen lessen gevonden binnen deze prijs";
}

?>