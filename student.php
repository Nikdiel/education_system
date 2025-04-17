<?php
session_start();


require_once "connect.php";

$connection = new mysqli($host, $db_user, $db_password, $db_name);


// Проверка подключения
if($connection->connect_errno != 0){
    echo "Ошибка: " . $connection->connect_errno . "<br>";
    echo "Описание: " . $connection->connect_error;
    exit();
}


if (isset($_SESSION['logged-in'])) {

    $user_login = $_SESSION['users'];

    $user_id = 'SELECT id FROM users WHERE login = ?';
    $stmt_id = $connection->prepare($user_id);
    $stmt_id->bind_param('s', $user_login);
    $stmt_id->execute();

    $result_id = $stmt_id->get_result();
    $row_id = $result_id->fetch_assoc();


    $sql = 'SELECT * FROM users WHERE id=?';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i', $row_id['id']);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    $stmt->close();

}
// Если пользователь не авторизован, перенаправляем на страницу логина 
else {
    header('Location: login.php');
    echo 'пользователь не найден';
    exit();
}

$connection->close();

?>

<?php include 'lang.php'; ?>

<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница студента</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php"?>

    <main>
        
        <section id="viewGrades">

            <h2><?php echo $translations['grades_title']; ?></h2>
            <input type="text">
           
            <ul id="gradeList"></ul>

        </section>

        <section id="viewSchedule">
            <h2><?php echo $translations['schedule_title']?></h2>
            <ul id="scheduleList"></ul>
        </section>

        
    </main>

    <?php include "footer.html"?>

    <script src="app.js"></script>
</body>
</html>


