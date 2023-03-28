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

        <div class="tab-pane" id="login" role="tabpanel" aria-labelledby="login-tab">
          <div class="bs5-grid-col col-8">
            <form action="login.php" method="post">
              <div class="mb-3 bs5-form-group">
                <label for="userID" class="form-label bs5-form-label">User ID:</label>
                <input type="text" id="userID" name="userID" class="form-control bs5-form-control">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
              <button type="submit" formaction="logout.php" class="btn btn-secondary">Logout</button>
            </form>
          </div>
        </div>
  <!-- Tab for viewing movies -->
  <div class="tab-pane active" id="view" role="tabpanel" aria-labelledby="view-tab">     
  <?php
    require_once("functions.php");
    require_once("functions.php");
    if (isset($_COOKIE["userID"])) {
      $userID = $_COOKIE["userID"];
      echo "User ID: " . $userID;
    } else {
      echo "User ID cookie not set";
    }
    global $conn;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $per_page = 25;
    $offset = ($page - 1) * $per_page;
    $total_movies = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM movies"));
    $total_pages = ceil($total_movies / $per_page);
    get_all_movies($offset, $per_page);
    echo '<nav aria-label="Page navigation">';
    echo '<ul class="pagination">';
    //pages 
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=1">&laquo;</a></li>';
    }

    for ($i = max(1, $page - 2); $i <= min($page + 2, $total_pages); $i++) {
        $active = $i == $page ? ' active' : '';
        echo '<li class="page-item' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    if ($page < $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $total_pages . '">&raquo;</a></li>';
    }

    echo '</ul>';
    echo '</nav>';
    echo "Current page: " . $page;
?>
     
    </div>

  <!-- Tab for inserting new movies -->
  <div class="tab-pane" id="insert" role="tabpanel" aria-labelledby="insert-tab"> 
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


