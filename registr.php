<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/.css">
</head>
<body>
    <h1>Регистрация</h1>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    <form method="POST" action="registrHandler.php">

        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login" required><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="name">ФИО:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="role">Роль:</label><br>
        <div class="role">
            <label for=""><input type="radio" id="student" name="role" value="student">Студент</label><br>
            <label for=""><input type="radio" id="teacher" name="role" value="teacher">Учитель</label><br><br>
        </div>
        
        

        <button type="submit">Войти</button>
    </form>
</body>
</html>
