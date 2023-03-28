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
  <?php include("header.php") ?>
    <h1><?php echo $movie["title"]; ?></h1>
    <p>Genres:
      <?php
      $genres = explode("|", $movie["genres"]); // split genres into an array
      foreach ($genres as $genre) {
          echo "<a href='search.php?genre=$genre'>$genre</a> "; // create hyperlink for each genre
      }
      ?>
    </p>
    <p>Year: <?php echo substr($movie["title"], -5, 4); ?></p>

    <form method="POST" action="delete.php">
      <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
      <input type="submit" name="delete_movie" value="Delete movie">
    </form>
    <form method="POST" action="modify.php">
      <input type="hidden" name="id" value="<?php echo $movie_id; ?>">
      <input type="submit" name="modify_movie" value="Modify movie">
    </form>

    <p>Tags:
      <?php
        $tags = get_tags_by_movie_id($movie_id);
        foreach ($tags as $tag) {
          echo "$tag</a> "; 
        }
      ?>
    </p>

    <p>Ratings:
      <?php
        $ratings = get_ratings_by_movie_id($movie_id);
        $i = 0;
        $sum = 0;
        foreach ($ratings as $rating) {
          $sum += $rating;
          
          $i +=1;
        }
        echo color_rating($sum/$i);
      ?>
    </p>


  </body>
  <?php include("footer.php") ?>
</html>