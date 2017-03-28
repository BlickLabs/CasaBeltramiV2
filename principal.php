<?php
    include "config.php";
    error_reporting(E_ALL);
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: admin.php");
    }       
    $mail = $_SESSION['user_name'];
    $query3 = "SELECT nombre FROM Users WHERE user='$mail'";
    $res3 = mysqli_query($mysqli3, $query3);
    $mysqli3->close(); //cerramos la conexió
    $num_row3 = mysqli_num_rows($res3);
    $row3 = mysqli_fetch_array($res3);
    $myuser=$row3['nombre'];
    header("Location: images.php");
?>
