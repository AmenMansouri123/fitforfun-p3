<?php
// =========================
// Simpele "database" (array)
// =========================
$accounts = [
    ["email" => "test@example.com", "password" => "1234", "name" => "Test User"],
    ["email" => "user@example.com", "password" => "abcd", "name" => "John Doe"]
];

// =========================
// Data ophalen van formulier
// =========================
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$found = false;
$userName = "";

// =========================
// Controle login gegevens
// =========================
foreach ($accounts as $acc) {

    // Check of email + wachtwoord kloppen
    if ($acc['email'] === $email && $acc['password'] === $password) {
        $found = true;
        $userName = $acc['name'];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login Resultaat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1 class="logo">FitForFun</h1>
</header>

<section class="form">

<?php if ($found): ?>
    <!-- =========================
         Happy scenario
    ========================= -->
    <p class="success">
        Welkom <?php echo htmlspecialchars($userName); ?>! Je bent ingelogd.
    </p>

    <a href="index.html" class="btn">Ga naar Home</a>

<?php else: ?>
    <!-- =========================
         Unhappy scenario
    ========================= -->
    <p class="error">
        Ongeldige e-mail of wachtwoord.
    </p>

    <a href="login.html" class="btn">Probeer opnieuw</a>

<?php endif; ?>

</section>

</body>
</html>