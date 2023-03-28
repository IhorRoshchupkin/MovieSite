<?php
require_once("functions.php");

if(isset($_POST["modify_movie"])) {
    $movie_id = $_POST["movie_id"];
    $title = $_POST["title"];
    $year = $_POST["year"];
    $genres = $_POST["genres"];

    modify_data($movie_id, $title, $year, $genres);
} else {
    echo "Error: Invalid form submission.";
}
?>
