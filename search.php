<?php
// search.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Qwerty"; // Обновленное имя базы данных

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$book_name = $_POST['book_name'];

$sql = "SELECT * FROM Книги WHERE Наименование LIKE '%$book_name%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Номер: " . $row["Номер"] . "<br>";
        echo "Наименование: " . $row["Наименование"] . "<br>";
        echo "Автор: " . $row["Автор"] . "<br>";
        echo "Жанр: " . $row["Жанр"] . "<br>";
        echo "Год издания: " . $row["Год_издания"] . "<br>";
        echo "Издательство: " . $row["Издательство"] . "<br><br>";
    }
} else {
    echo "Книга не найдена.";
}

// Добавляем кнопку "Назад на авторизацию"
echo "<button onclick=\"window.location.href='index.html';\">Назад на авторизацию</button>";

$conn->close();
?>