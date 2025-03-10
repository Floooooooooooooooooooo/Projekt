<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center">Error</h1>
        <?php
        if (isset($_SESSION['err'])) {
            echo "<p class='text-danger text-center'>Error: " . $_SESSION['err'] . "</p>";
            unset($_SESSION['err']);
        }
        ?>
        <div class="text-center">
            <a href="logoutNewsletter.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>
</body>
</html>
