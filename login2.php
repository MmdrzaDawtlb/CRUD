<?php
session_start();

if (isset($_SESSION['username'])) {
  header('location: index.php');
}

include 'config.php';

$errorMsg = '';

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $checkQuery = "SELECT * FROM users WHERE username='$username'";
  $checkResult = mysqli_query($con, $checkQuery);
  if (mysqli_num_rows($checkResult) > 0)
    $errorMsg = 'This username is already Exist.';
  else {
    $query = "INSERT INTO users ( id, username, email, password , created_at) VALUES (null,'$username', '$email', '$password',current_timestamp())";

    if (mysqli_query($con, $query)) {
      $_SESSION['username'] = $username;
      header('location: index.php');
    } else {
      $errorMsg = 'Registration failed';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary">
            Register
          </div>
          <div class="card-body">
            <?php if ($errorMsg != '') { ?>
              <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
            <?php } ?>
            <form method="POST" action="">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" name="register" class="btn btn-primary btn-block mb-4">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>