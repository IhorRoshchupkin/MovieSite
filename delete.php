<?php
include("header.php");
require_once("functions.php");

if (isset($_POST["movie_id"])) {
  $movie_id = $_POST["movie_id"];
  $success = delete_movie_by_id($movie_id);

  if ($success) {
    echo "Movie deleted successfully.";
  } else {
    echo "Error deleting movie.";
  }
  
  header('Location: index.php');
  exit();
} else {
  echo "Invalid request.";
}
include("footer.php");
?>