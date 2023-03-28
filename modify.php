<!DOCTYPE html>
<html>
<head>
	<title>Modify Movie</title>
</head>
<body>
<?php include("header.php") ?>
	<h1>Modify Movie</h1>

	<?php
		require_once("functions.php");

        if(isset($_POST["id"])) {
          $movie_id = $_POST["id"];
          $movie_data = get_movie_by_id($movie_id);
                  
          if($movie_data) {
            $title = $movie_data["title"];
            preg_match('/\((\d{4})\)/', $title, $matches);
            $year = trim($matches[1]);
          
            $title = trim(preg_replace('/\(\d{4}\)/', '', $title));
            $genres = explode("|", $movie_data["genres"]);
            $genres = implode(", ", $genres);
          } else {
            echo "Error: Invalid movie ID.";
            exit();
          }
        }
          
        
          
	?>

	<form method="post" action="modify_process.php">
		<input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
		<label for="title">Title:</label>
		<input type="text" name="title" id="title" value="<?php echo $title; ?>" required><br>
		<label for="year">Year:</label>
		<input type="text" name="year" id="year" value="<?php echo $year; ?>" required><br>
		<label for="genres">Genres:</label>
		<input type="text" name="genres" id="genres" value="<?php echo $genres; ?>" required><br>
		<input type="submit" name="modify_movie" value="Modify Movie">
	</form>
  <?php include("footer.php") ?>
</body>
</html>
