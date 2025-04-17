<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в систему</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Вход в систему</h1>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    <form method="POST" action="loginValidation.php">
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login" required><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Войти</button>
        <a href="registr.php">Зарегестрироваться</a>
    </form>
</body>
</html>
