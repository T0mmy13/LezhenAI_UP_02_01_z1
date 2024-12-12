<?php
header('Content-Type: text/html; charset=utf-8');
// auth.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Qwerty"; // Обновленное имя базы данных

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM Авторизация WHERE Логин = '$login' AND Пароль = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Пользователь найден
    header("Location: search.html");
} else {
    echo "Неверный логин или пароль.";
}

$conn->close();
?>