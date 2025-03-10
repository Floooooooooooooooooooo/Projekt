<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
        <?php
        if (isset($_SESSION['err'])) {
            echo "<p class='text-danger text-center'>Login error: " . $_SESSION['err'] . "</p>";
            unset($_SESSION['err']);
        }
        ?>
        <form action="login.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
                <input type="reset" value="Reset" class="btn btn-secondary">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="registerNewsletter.php" class="text-primary">Register here</a></p>
    </div>
</body>
</html>