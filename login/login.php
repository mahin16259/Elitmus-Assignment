<?php
session_start();
include_once('../db/db_config.php');

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['email']) && empty($_POST['password'])) {
        echo "<script>alert('Please Fill email and Password');</script>";
        exit;
    } elseif (empty($_POST['password'])) {
        echo "<script>alert('Please Fill Password');</script>";
        exit;
    } elseif (empty($_POST['email'])) {
        echo "<script>alert('Please Fill email);</script>";
        exit;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];


            if ($email == $email && $password == $password) {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location:../game_levels/dashboard.php');
            }
        } else {
            echo "<script>alert('Invalid email or Password');</script>";
            exit;
        }
    }

}
