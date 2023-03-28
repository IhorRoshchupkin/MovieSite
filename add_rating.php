<?php
  require_once("functions.php");

  if (isset($_POST['submit_rating'])) {
    $movie_id = $_POST['movie_id'];
    $rating_value = $_POST['rating'];
    $user_id = 1; // replace with the actual user ID

    add_rating($movie_id, $user_id, $rating_value);

    header("Location: movie.php?id=$movie_id");
    exit();
  }
?>