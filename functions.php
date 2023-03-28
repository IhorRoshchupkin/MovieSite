  <?php

  require_once 'db_connection.php';
  global $conn;



  function get_all_data($offset, $limit) {
      global $conn;
      $query = "SELECT * FROM movies LIMIT $offset, $limit";
      $result = mysqli_query($conn, $query);
      if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
              // ...
          }
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  }


  function insert_data($title, $year, $genres) {
      #require_once 'db_connection.php';

      global $conn;

      $fullTitle = $title . " (". strval($year).")";

      $query = "INSERT INTO movies(`title`, `genres`) VALUES('$fullTitle', '$genres')";   

      $result = mysqli_query($conn, $query);

      if ($result) {
        header('Location: index.php');
      } else {
        echo "Error: " . mysqli_error($conn);
      }
  }

  function get_all_movies($offset, $per_page) {
      global $conn;
      $query = "SELECT * FROM movies LIMIT $per_page OFFSET $offset";
      $result = mysqli_query($conn, $query);
      if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
              $movie_id = $row['movieID'];
              $title = $row['title'];
              $genres = $row['genres'];
              $year = substr($title, -5, 4); // extract year from the title
              $title = substr($title, 0, -7); // remove year from the title
              echo '<div class="movie-block">';
              echo '<a href="movie.php?id=' . $movie_id . '">';
              echo '<h3>' . $title . '</h3>';
              echo '<p>' . $genres . '</p>';
              echo '</a>';
              echo '</div>';
          }
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  }

  function get_all_movies_by_genres($genres) {
      global $conn;
      $query = "SELECT * FROM movies WHERE genres LIKE '%$genres%' LIMIT 25";
      // use LIKE operator to match movies whose genres contain the specified genres
      $result = mysqli_query($conn, $query);
      if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
              $movie_id = $row['id']; // fix variable name
              $title = $row['title'];
              $genres = $row['genres'];
              $year = substr($title, -5, 4); // extract year from the title
              $title = substr($title, 0, -7); // remove year from the title
              echo '<div class="movie-block">';
              echo '<a href="movie.php?id=' . $movie_id . '">';
              echo '<h3>' . $title . '</h3>';
              echo '<p>' . $genres . '</p>';
              echo '</a>';
              echo '</div>';
          }
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  }

  function get_movie_by_id($id) {
      global $conn;
      $query = "SELECT * FROM movies WHERE movieID = $id";
      $result = mysqli_query($conn, $query);
      if ($result) {
        $movie = mysqli_fetch_assoc($result);
        return $movie;
      } else {
        return null;
      }
    }

    function delete_movie_by_id($movie_id) {
      global $conn; // получение подключения к базе данных
    
      $stmt1 = $conn->prepare("DELETE FROM movies WHERE movieID = ?");
      $stmt2 = $conn->prepare("DELETE FROM links WHERE movieID = ?");
      $stmt3 = $conn->prepare("DELETE FROM ratings WHERE movieID = ?");
      $stmt4 = $conn->prepare("DELETE FROM tags WHERE movieID = ?");
      $stmt1->bind_param("i", $movie_id);
      $stmt2->bind_param("i", $movie_id);
      $stmt3->bind_param("i", $movie_id);
      $stmt4->bind_param("i", $movie_id);
      $stmt1->execute();
      $stmt2->execute();
      $stmt3->execute();
      $stmt4->execute();
    
      // Если было удалено хотя бы одно значение, то операция удаления прошла успешно
      if ($stmt1->affected_rows > 0 || $stmt2->affected_rows > 0 || $stmt3->affected_rows > 0 || $stmt4->affected_rows > 0) {
        return true;
      } else {
        return false;
      }
  }

  function update_data($movie_id, $title, $year, $genres) {
    global $db;
    $stmt = $db->prepare("UPDATE movies SET title=?, year=?, genres=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $year, $genres, $movie_id);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

    function modify_data($movie_id, $title, $year, $genres) {
      global $conn;

      $fullTitle = $title . " (". strval($year).")";

      $query = "UPDATE movies SET `title`='$fullTitle', `genres`='$genres' WHERE `movieID`='$movie_id'";

      $result = mysqli_query($conn, $query);

      if ($result) {
          header('Location: index.php');
      } else {
          echo "Error: " . mysqli_error($conn);
      }
}

function get_tags_by_movie_id($movie_id) {
  global $conn;
  $tags = array();
  $query = "SELECT tag FROM tags WHERE movieId = '$movie_id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $tags[] = $row["tag"];
    }
    $tags = array_unique($tags); // Remove duplicate tags
  } else {
    echo "Error: " . mysqli_error($conn);
  }
  
  return $tags;
}

function get_ratings_by_movie_id($movie_id) {
  global $conn;

  $ratings = array();

  // SQL-запрос для получения тегов, связанных с фильмом
  $query = "SELECT rating FROM ratings WHERE movieId = '$movie_id'";

  $result = mysqli_query($conn, $query);

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $ratings[] = $row['rating'];
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  return $ratings;
}

function color_rating($rating) {
  if ($rating >= 1 && $rating <= 2) {
    return "<span style='color: red;'>$rating</span>";
  } elseif ($rating > 2 && $rating < 4) {
    return "<span style='color: orange;'>$rating</span>";
  } elseif ($rating >= 4 && $rating <= 5) {
    return "<span style='color: green;'>$rating</span>";
  } else {
    return $rating;
  }
}




  ?>




