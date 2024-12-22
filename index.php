<?php
session_start();


// Если пользователь не авторизован, перенаправляем на страницу логина
if (!(isset($_SESSION['logged-in']))) {
    header('Location: login.php');
    exit();
}

require_once "connect.php";
 
$connection = new mysqli($host, $db_user, $db_password, $db_name);

// Проверка подключения
if($connection->connect_errno != 0){
    echo "Ошибка: " . $connection->connect_errno . "<br>";
    echo "Описание: " . $connection->connect_error;
    exit();
}

// Запрос на получение списка студентов
$sql = "SELECT * FROM students";
$result = $connection->query($sql);
// Для хеширования пароля при регистрации

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Список студентов</h1>
    
    <div class="user-info">
        <?php echo 'Вы вошли как <strong>' . $_SESSION['users'] . '</strong> <a href="logout.php">[выйти]</a>'; ?>
    </div>

    <div class="students-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Возраст</th>
                    <th>Группа</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['first_name']) . "</td>
                            <td>" . htmlspecialchars($row['last_name']) . "</td>
                            <td>" . htmlspecialchars($row['age']) . "</td>
                            <td>" . htmlspecialchars($row['group']) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Нет студентов в базе данных.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="app.js"></script>
</body>
</html>



<?php $connection->close(); ?>
