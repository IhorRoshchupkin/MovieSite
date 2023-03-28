<?php
require_once('functions.php');

if (isset($_POST['add_tag'])) {
  $movie_id = $_POST['id'];
  $tag = $_POST['tag'];
  if (isset($_COOKIE["userID"])) {
    $user_id = $_COOKIE["userID"];
  } else {
    $user_id = 1;
  }

  add_tag_to_movie($user_id, $movie_id, $tag);

  header("Location: movie.php?id=$movie_id");
  exit();
}
?>