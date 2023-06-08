<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CRUD Application</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Notebook</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#"> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php"> Add Note </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"> Logout </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="container mt-5">
    <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
    <hr>
    <br>
    <table class="table table table-hover" style="text-align: center;">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Subject</th>
          <th>Author</th>
          <th>Note</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'config.php';
        $posts = mysqli_query($con, "SELECT * FROM posts");
        while ($row = mysqli_fetch_array($posts)) {
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td>
              <?php if ($_SESSION['user_id'] == $row['user_id']) { ?>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>