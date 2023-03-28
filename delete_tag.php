<?php
require_once("functions.php");

if ($_SERVER["submit"] == "POST") {
  $movie_id = $_POST["movie_id"];
  $tag = $_POST["tag"];

  delete_tag($movie_id, $tag);
}

header("Location: movie.php?id=$movie_id");
exit();
?>