<!-- filepath: /c:/xampp/htdocs/3BHWII/Projekt/register.php -->
<?php
session_start();

if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])) {
    $_SESSION['err'] = "Registration: Email or password is empty";
    header("Location: errorRegister.php");
    exit();
}

$email = $_REQUEST['email'];
$passwd = $_REQUEST['password'];

if (empty($email) || empty($passwd)) {
    $_SESSION['err'] = "Registration: Email or password is empty";
    header("Location: errorRegister.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    $_SESSION['err'] = $conn->connect_error;
    header("Location: errorRegister.php");
    exit();
}

$sql = "INSERT INTO login (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $passwd);
$stmt->execute();

if ($stmt->error) {
    $_SESSION['err'] = $stmt->error;
    header("Location: errorRegister.php");
    $conn->close();
    exit();
}

$_SESSION['email'] = $email;
header("Location: successRegister.php");

$stmt->close();
$conn->close();
?>