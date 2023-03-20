<?php

require_once 'db_connection.php';
global $conn;



function get_all_data() {

    global $conn;

    #require_once 'db_connection.php';
    
    $query = "SELECT * FROM movies LIMIT 25";

    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="bs5-grid-col col-4">
                <div class="bs5-card bs5-card-border">
                    <div class="bs5-card-header">
                        Title: <?php echo $row["title"]; ?>
                    </div>
                    <div class="bs5-card-body">
                        <p class="bs5-card-text">
                            Genres: <?php echo $row["genres"]; ?>
                        </p>
                        
                        
                    </div>
                    <div class="bs5-card-footer">
                    <a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning">Update</a>
                    <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            <?php
        }

        mysqli_close($conn);

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
?>




