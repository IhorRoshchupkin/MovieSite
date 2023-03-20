<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $salary = $_POST['salary'];
  $occupation = $_POST['occupation'];
  $hire_date = $_POST['hire_date'];

  if (empty($name) || empty($salary) || empty($occupation) || empty($hire_date)) {
    echo ("Please fill in all fields");
  } elseif (!is_numeric($salary) || $salary <= 0) {
    echo ("Salary must be a number and more then 0");
  } elseif (strtotime($hire_date) === false ) {
    echo ("Invalid hire date format. Please use yyyy-mm-dd");
  } elseif (strtotime($hire_date) > time()) {
    echo ("Hire date must be less than the current date");
  }
else {
    require_once("functions.php");


    $id = $_GET['id'];

    $query = "UPDATE employees SET name='$name', salary=$salary, occupation='$occupation', hire_date='$hire_date' WHERE id=$id";
    mysqli_query($conn, $query);
    
    header("Location: index.php");
  }
} else {
  $id = $_GET['id'];

  require_once("functions.php");    

  $query = "SELECT * FROM employees WHERE id=$id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
?>
<form method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
  </div>
  <div class="form-group">
    <label for="salary">Salary:</label>
    <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row["salary"]; ?>">
  </div>
  <div class="form-group">
    <label for="occupation">Occupation:</label>
    <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $row["occupation"]; ?>">
  </div>
  <div class="form-group">
    <label for="hire_date">Hire Date:</label>
    <input type="text" class="form-control" id="hire_date" name="hire_date" value="<?php echo $row["hire_date"]; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php
}
?>