<?php
    $address = "localhost";
    $username = "root";
    $password = "";
    $database_name = "assignment";
    $conn = mysqli_connect($address,$username,$password,$database_name);


    if(!$conn)
{
    die("I was unable to connect to the database.");
}

?>  