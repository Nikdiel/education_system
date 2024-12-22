<?php

require_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $name = trim($_POST['name']);
    $role = trim($_POST['role']);

    // Проверка на заполнение
    if (empty($login) || empty($password ||  empty($name))) {
        die("Пожалуйста, заполните все поля.");
    }

    // Подключение к базе данных
    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    if ($connection->connect_error) {
        die("Ошибка подключения: " . $connection->connect_error );
    }

    // Вставка в базу данных
    $stmt = $connection->prepare("INSERT INTO users (login, password, name, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param( 'siss', $login, $password, $name, $role);

    if ($stmt->execute()) {
        header('Location: login.php');
        exit();
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}
?>
