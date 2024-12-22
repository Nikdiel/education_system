<?php

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'ru';

// Русский язык
$translations_ru = [
    'title' => 'Учебное заведение',
    'student' => 'Студент',
    'teacher' => 'Преподаватель',
    'welcome' => 'Добро пожаловать!',
    'description' => 'Это учебное веб-приложение для управления расписанием и оценками студентов.',
    'student_welcome' => 'Привет, студент!',
    'teacher_welcome' => 'Привет, преподаватель!',
    'add_student' => 'Добавить студента',
    'view_schedule' => 'Посмотреть расписание',
    'schedule_title' => 'Расписание группы:',
    'view_grades' => 'Посмотреть оценки',
    'grades_title' => 'Название группы',
    'add_grade_button' => 'Добавить оценку',
    'add_schedule_button' => 'Добавить расписание',
    'add_student_button' => 'Добавить студента',
    'student_name' => 'Имя студента',
    'student_dob' => 'Дата рождения студента',
    'course_name' => 'Название курса',
    'day_of_week' => 'День недели',
    'grade_course_name' => 'Название курса для оценки',
    'student_grade' => 'Оценка студента',
    'logout' => 'Выйти',
];

// Казахский язык
$translations_kk = [
    'title' => 'Оқу орны',
    'student' => 'Студент',
    'teacher' => 'Оқытушы',
    'welcome' => 'Қош келдіңіз!',
    'description' => 'Бұл студенттердің сабақ кестесі мен бағаларын басқаруға арналған оқу веб-қосымшасы.',
    'student_welcome' => 'Сәлем студент!',
    'teacher_welcome' => 'Сәлем оқытушы!',
    'add_student' => 'Студент қосу',
    'view_schedule' => 'Кестені көру',
    'schedule_title' => 'Расписание группы:',
    'grades_title' => 'Название группы:',
    'view_grades' => 'Бағаларды көру',
    'add_grade_button' => 'Бағаларды қосу',
    'add_schedule_button' => 'Кестені қосу',
    'add_student_button' => 'Студент қосу',
    'student_name' => 'Студенттің аты',
    'student_dob' => 'Студенттің туған күні',
    'course_name' => 'Курс атауы',
    'day_of_week' => 'Апта күні',
    'grade_course_name' => 'Баға курсы атауы',
    'student_grade' => 'Студенттің бағасы',
    'logout' => 'Шығу',
];

// Выбор языка
$translations = $lang == 'kk' ? $translations_kk : $translations_ru;
?>
