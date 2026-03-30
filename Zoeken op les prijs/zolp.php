<?php
// =========================
// Voorbeeld lessenlijst
// =========================
$lessons = [
    ["name" => "Yoga", "price" => 15, "description" => "Verbeter flexibiliteit en ontspanning."],
    ["name" => "Spinning", "price" => 20, "description" => "Intensieve cardio training."],
    ["name" => "Kickboksen", "price" => 25, "description" => "Verbeter kracht en conditie."],
    ["name" => "Pilates", "price" => 18, "description" => "Core en houding training."],
    ["name" => "Fitness", "price" => 30, "description" => "Volledige kracht en conditie."]
];

// =========================
// Haal min en max uit GET
// =========================
$min = isset($_GET['min']) ? (float)$_GET['min'] : 0;
$max = isset($_GET['max']) ? (float)$_GET['max'] : 0;

// =========================
// Filter lessen op prijs
// =========================
$filteredLessons = array_filter($lessons, function($lesson) use ($min, $max) {
    return $lesson['price'] >= $min && $lesson['price'] <= $max;
});
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Zoeken Resultaten | FitForFun</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1 class="logo">FitForFun</h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="lessen.html">Lessen</a>
        <a href="ZoekenOplesPrijs.html">Zoeken op les prijs</a>
    </nav>
</header>

<section class="form">
    <h1>Zoek resultaten</h1>

    <?php if(count($filteredLessons) > 0): ?>
        <!-- =========================
             Happy scenario: toon lessen
        ========================= -->
        <div class="cards">
            <?php foreach($filteredLessons as $lesson): ?>
                <div class="card">
                    <h3><?php echo $lesson['name']; ?></h3>
                    <p><?php echo $lesson['description']; ?></p>
                    <p>Prijs: €<?php echo $lesson['price']; ?></p>
                    <a class="btn" href="#">Bekijk les</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- =========================
             Unhappy scenario: geen resultaten
        ========================= -->
        <p class="error">Geen lessen gevonden binnen deze prijs. Pas de prijs aan.</p>
        <a class="btn" href="ZoekenOplesPrijs.html">Terug naar zoeken</a>
    <?php endif; ?>

</section>

</body>
</html>