<!-- filepath: /c:/xampp/htdocs/3BHWII/Projekt/successRegister.php -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center">Registration Successful!</h1>
        <p class="text-center">Welcome, <?php echo $_SESSION['email']; ?>!</p>
        <div class="text-center">
            <a href="Homepage.html" class="btn btn-primary">Go to Homepage</a>
        </div>
    </div>
</body>
</html>