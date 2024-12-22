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


    $sql = 'SELECT name FROM users WHERE id=?';
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
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $translations['title']; ?> - Преподаватель</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <h1><?php echo $translations['title'] ." <p>Преподаватель: " . $row['name'] . " </p>"?></h1>
        <nav>
            <a href="teacher.php"><?php echo $translations['add_student']; ?></a>
            <a href="teacher.php#viewSchedule"><?php echo $translations['view_schedule']; ?></a>
            <a href="teacher.php#viewGrades"><?php echo $translations['view_grades']; ?></a>
            <a href="logout.php"><?php echo $translations['logout']; ?></a>
            
            <a href="">
                <ul class="lang">
                    <li>
                        <?php echo 'Язык: ' . $lang; ?>
                        <ul>
                        <a href="?lang=ru"><li>Русский</li></a>
                        <a href="?lang=kk"><li>Казахский</li></a>
                        </ul>
                    </li>
                </ul>
            </a>
        </nav>
    </header>

    <main>
        <section id="addStudent">
            <h2><?php echo $translations['add_student']; ?></h2>
            <form id="studentForm">
                <input type="text" id="studentName" placeholder="<?php echo $translations['student_name']; ?>" required>
                <input type="date" id="studentDob" placeholder="<?php echo $translations['student_dob']; ?>" required>
                <button type="submit"><?php echo $translations['add_student_button']; ?></button>
            </form>
        </section>

        <section id="viewSchedule">
            <h2><?php echo $translations['view_schedule']; ?></h2>
            <ul id="scheduleList"></ul>
            <form id="addScheduleForm">
                <input type="text" id="courseName" placeholder="<?php echo $translations['grades_title']; ?>" required>
                <input type="text" id="dayOfWeek" placeholder="<?php echo $translations['day_of_week']; ?>" required>
                <input type="time" id="startTime" required>
                <input type="time" id="endTime" required>
                <button type="submit"><?php echo $translations['add_schedule_button']; ?></button>
            </form>
        </section>

        <section id="viewGrades">
            <h2><?php echo $translations['view_grades']; ?></h2>
            <ul id="gradeList"></ul>
            <form id="addGradeForm">
                <input type="text" id="gradeCourseName" placeholder="<?php echo $translations['grades_title']; ?>" required>
                <input type="text" id="studentGrade" placeholder="<?php echo $translations['student_grade']; ?>" required>
                <button type="submit"><?php echo $translations['add_grade_button']; ?></button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 <?php echo $translations['title']; ?></p>
    </footer>

    <script src="app.js"></script>
</body>
</html>
