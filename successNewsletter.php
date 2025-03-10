<?php
// Start the session: must be the first command
session_start();
// Umleitung zum Login-Formular, wenn der User nicht angemeldet ist
if (!isset($_SESSION['email'])) {
    $_SESSION['err']="Login required";
    header("Location: formular2Newsletter.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center">Sie sind angemeldet!</h1>
        <p class="text-center">Herzlich Willkommen: <?php echo $_SESSION['email']; ?></p>
        <div class="text-center">
            <a href="logoutNewsletter.php" class="btn btn-secondary">Logout</a>
            <a href="Homepage.html" class="btn btn-primary">Homepage</a>
        </div>
    </div>
</body>
</html>