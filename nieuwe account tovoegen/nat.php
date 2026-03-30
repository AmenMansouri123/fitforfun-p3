<?php
session_start();

// =========================
// Voorbeeld "database" van accounts
// =========================
$accounts = [
    ["email" => "test@example.com", "name" => "Test User", "password" => "1234"],
    ["email" => "user@example.com", "name" => "John Doe", "password" => "abcd"]
];

// =========================
// Haal POST-data op
// =========================
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// =========================
// Controleer login
// =========================
$loggedIn = false;
$userName = "";

foreach ($accounts as $acc) {
    if ($acc['email'] === $email && $acc['password'] === $password) {
        $loggedIn = true;
        $userName = $acc['name'];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login Resultaat | FitForFun</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1 class="logo">FitForFun</h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="register.html">Nieuwe account</a>
        <a href="ZoekenOplesPrijs.html">Zoeken op les prijs</a>
        <a href="lessen.html">Lessen</a>
    </nav>
</header>

<section class="form">
    <?php if ($loggedIn): ?>
        <!-- =========================
             Happy scenario: succesvolle login
        ========================= -->
        <p class="success">Welkom, <?php echo htmlspecialchars($userName); ?>! Je bent ingelogd.</p>
        <a class="btn" href="index.html">Ga naar Home</a>
    <?php else: ?>
        <!-- =========================
             Unhappy scenario: verkeerde login
        ========================= -->
        <p class="error">Ongeldige e-mail of wachtwoord. Probeer het opnieuw.</p>
        <a class="btn" href="login.html">Terug naar Inloggen</a>
    <?php endif; ?>
</section>

</body>
</html>