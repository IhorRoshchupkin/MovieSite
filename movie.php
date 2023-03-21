<?php
require_once("functions.php");

if (isset($_GET["id"])) {
  $movie_id = $_GET["id"];
  $movie = get_movie_by_id($movie_id);
}

if (empty($movie)) {
  // If no movie is found with the given ID, display an error message
  echo "Error: Movie not found.";
  exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $movie["title"]; ?></title>
  </head>
  <body>
    <h1><?php echo $movie["title"]; ?></h1>
    <p>Genres: <?php echo $movie["genres"]; ?></p>
    <p>Year: <?php echo substr($movie["title"], -5, 4); ?></p>
  </body>
</html>