<?php
include 'db.php'; // Подключение к базе данных

// Проверка, если форма была отправлена
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL-запрос для получения данных преподавателя
    $sql = "SELECT * FROM teachers WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $teacher = $stmt->fetch(PDO::FETCH_ASSOC);

    // Проверка пароля
    if ($teacher && password_verify($password, $teacher['password'])) {
        session_start();
        $_SESSION['teacher_logged_in'] = true;
        $_SESSION['teacher_id'] = $teacher['teacher_id'];
        header('Location: teacher.php');
        exit();
    } else {
        echo "Неверный email или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход преподавателя</title>
</head>
<body>
    <h1>Вход для преподавателя</h1>
    <form method="POST" action="login_teacher.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Войти</button>
    </form>
</body>
</html>
