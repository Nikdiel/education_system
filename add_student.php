<?php
include 'db.php'; // Подключение к базе данных

// Проверка, если форма была отправлена
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];

    // SQL-запрос для добавления студента
    $sql = "INSERT INTO students (name, dob) VALUES (:name, :dob)";
    $stmt = $pdo->prepare($sql);

    // Привязка параметров
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':dob', $dob);

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "Студент добавлен!";
    } else {
        echo "Ошибка добавления студента.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить студента</title>
</head>
<body>
    <h1>Добавить студента</h1>
    <form method="POST" action="add_student.php">
        <label for="name">Имя студента:</label>
        <input type="text" name="name" required><br>

        <label for="dob">Дата рождения:</label>
        <input type="date" name="dob" required><br>

        <button type="submit">Добавить</button>
    </form>
</body>
</html>
