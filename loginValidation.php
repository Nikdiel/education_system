<?php
    session_start();
    require_once "connect.php";

    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Ошибка: ".$connection->connect_errno . "<br>";
        echo "Описание: " . $connection->connect_error;
    }
    else{
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        
        if($result = $connection->query($sql)){
            $usersCount = $result->num_rows;
            if($usersCount>0){
                $_SESSION['logged-in'] = true;
                $row = $result->fetch_assoc();
                $user = $row['login'];
                $role = $row['role'];
                
                $result->free_result();
                
                $_SESSION['users'] = $user;
                $_SESSION['role'] = $role;

                if($role == 'Студент'){
                    unset($_SESSION['loginError']);
                    header('Location: student.php');
                }
                
                if($role =='Преподаватель'){
                    unset($_SESSION['loginError']);
                    header('Location: teacher.php');
                }

                
            }
            else{
                echo $_SESSION['loginError'] . ' = <span class="error-msg">Неправильный ввод.</span>';
                header('Location: login.php');
            }
        }
        $connection->close();
    }
?>