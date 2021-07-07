<?php
    include_once('index.html');
    require 'config.php';

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $data = mysqli_fetch_array($result);

        $row = mysqli_fetch_assoc($result);

        if ($data) {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];

            header('location:/tokobuku/dashboard.php');
        } else {
            echo "
            <script type='text/javascript'>
            alert('Username atau Password anda salah!')
            window.location='/tokobuku';
            </script>";
        }
    }
?>
