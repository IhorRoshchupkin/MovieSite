<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="University website">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="author" content="Mykola Muts 150522">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Application layout</title>
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include("header.php") ?>
    <main>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- Tab panes -->
        <div class="tab-content">

        <div class="tab-pane" id="search" role="tabpanel"
                aria-labelledby="search-tab"> 
                        <form method="GET" action="movies.php">
                    <input type="text" name="genres" placeholder="Filter by genres" value="<?php echo isset($_GET['genres']) ? $_GET['genres'] : ''; ?>">
                    <button type="submit">Filter</button>
                </form>
                <?php
                    require_once("functions.php");
                    $movies = isset($_GET['genres']) ? get_all_movies_by_genres($_GET['genres']) : get_all_movies();
                    // use get_all_movies_by_genres() if genres is set in the query string
                    foreach ($movies as $movie) {
                    echo '<a href="movie.php?id=' . $movie["id"] . '">';
                    echo '<div class="movie-block">';
                    echo '<h2>' . $movie["title"] . '</h2>';
                    echo '<p>' . $movie["genres"] . '</p>';
                    echo '</div>';
                    echo '</a>';
                    }
                ?>
                        
                </div>
            </div>

            

            <div class="tab-pane active" id="view" role="tabpanel" aria-labelledby="view-tab">
        <?php
            require_once("functions.php");
            $movies = get_all_movies();
            foreach ($movies as $movie) {
            echo '<a href="movie.php?id=' . $movie["id"] . '">';
            echo '<div class="movie-block">';
            echo '<h2>' . $movie["title"] . '</h2>';
            echo '<p>' . $movie["genres"] . '</p>';
            echo '</div>';
            echo '</a>';
            }
        ?>
    </div>

    get_all_movies_by_genres($genres)
            
            <div class="tab-pane" id="insert" role="tabpanel"
                aria-labelledby="insert-tab"> 
                <div class="bs5-grid-col col-8">
                    <form action="insert.php" method="post">
                        <div class="mb-3 bs5-form-group">
                            <label for="title" class="form-label bs5-form-label">Title:</label>
                            <input type="text" id="title" name="title" class="form-control bs5-form-control">
                        </div>

                        <div class="mb-3 bs5-form-group">
                            <label for="year" class="form-label bs5-form-label">Year:</label>
                            <input type="number" id="year" name="year" class="form-control bs5-form-control">
                        </div>

                        <div class="mb-3 bs5-form-group">
                            <label for= "genres" class="form-label bs5-form-label">Genres:</label>
                            <input type="text" id= "genres" name= "genres" class="form-control bs5-form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Add new movie</button>
                    </form>
                        
                </div>
            </div>
        </div>
    </main>
<?php include("footer.php") ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>


