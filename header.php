<?php 

$title = $translations['title'];
$role = $row['role'];
$fname = $row['name'];
$add_std = $translations['add_student'];
$view_schedule = $translations['view_schedule'];
$view_grades = $translations['view_grades'];
$logout = $translations['logout'];

// Get the current script name
$current_page = basename($_SERVER['PHP_SELF']);

?>

<header>
    <h1><?= $title ?> <p><?= $role ?>: <?= $fname ?></p></h1>
    <nav>
        <?php if ($current_page === 'teacher.php'): ?>
            <a href="teacher.php?lang=<?= $lang ?>"><?= $add_std ?></a>
            <a href="teacher.php?lang=<?= $lang ?>#viewSchedule"><?= $view_schedule ?></a>
            <a href="teacher.php?lang=<?= $lang ?>#viewGrades"><?= $view_grades ?></a>
        <?php elseif ($current_page === 'student.php'): ?>
            <a href="student.php?lang=<?= $lang ?>#viewSchedule"><?= $view_schedule ?></a>
            <a href="student.php?lang=<?= $lang ?>#viewGrades"><?= $view_grades ?></a>
        <?php endif; ?>
        
        <a href="logout.php"><?= $logout ?></a>

        <ul class="lang">
            <li>
                <?= 'Язык: ' . $lang ?>
                <ul>
                    <li><a href="?lang=ru">Русский</a></li>
                    <li><a href="?lang=kk">Казахский</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
