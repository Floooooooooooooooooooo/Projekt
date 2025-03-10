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
        <?php
        if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])) {
            $_SESSION['err'] = "Login: Email or password is empty";
            header("Location: errorNewsletter.php");
            exit();
        }

        $email = $_REQUEST['email'];
        $passwd = $_REQUEST['password'];

        if (empty($email) || empty($passwd)) {
            $_SESSION['err'] = "Login: Email or password is empty";
            header("Location: errorNewsletter.php");
            exit();
        }

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "login";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            $_SESSION['err'] = $conn->connect_error;
            header("Location: errorNewsletter.php");
            exit();
        }

        $sql = "SELECT email, password FROM login WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $passwd);
        $stmt->execute();
        if ($stmt->error) {
            $_SESSION['err'] = $stmt->error;
            header("Location: errorNewsletter.php");
            $conn->close();
            exit();
        }

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("Location: successNewsletter.php");
        } else {
            $_SESSION['err'] = "Login failed";
            header("Location: formular2Newsletter.php");
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>