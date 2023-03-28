<?php
include("header.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $title = $_POST['title'];
    $year = $_POST['year'];
    $genres = $_POST['genres'];
  
    if (empty($title) || empty($year) || empty($genres)) {
      echo ("Please fill in all fields");

    } elseif (!is_numeric($year) || $year < 1995 || $year > 2023) {
        echo ("Years must be between 1995 and 2023");
    }
     else {
      require_once("functions.php");
  
      if (insert_data($title, $year, $genres)) {
        header("Location: index.php");
        exit();
      } else {
        echo (" Data could not be inserted");
      }
    }
  }
include("footer.php");
  
?>
