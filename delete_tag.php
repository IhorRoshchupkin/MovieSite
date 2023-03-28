<?php
require_once("functions.php");

if (isset($_POST["movie_id"])) {
  $movie_id = $_POST["movie_id"];
  $tag = $_POST["tag"];
  echo $movie_id;

  delete_tag($movie_id, $tag);

  header("Location: movie.php?id=$movie_id");
  exit();
}
  
?>