<?php

$host="localhost";
$user="";
$password="";
$dbname="";

$con=  mysqli_connect($host, $user, $password, $dbname);

if (mysqli_connect_errno())
{
    echo "Error al conectarse a Mysql". mysqli_error();
}
