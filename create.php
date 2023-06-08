<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

include 'config.php';

$errorMsg = '';

if (isset($_POST['create_post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $author = $_POST['author'];

    $query = "INSERT INTO posts (title,content, user_id,author) VALUES ('$title','$content', '$user_id',' $author' )";
    if (mysqli_query($con, $query)) {
        header('location: index.php');
    } else {
        $errorMsg = 'Unable to create post';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Note</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Notebook</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Add Note<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        Add Note
                    </div>
                    <div class="card-body">
                        <?php if ($errorMsg != '') { ?>
                            <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
                        <?php } ?>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" id="author" name="author" >
                            </div>
                            <div class="form-group">
                                <label for="content">Note:</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                            </div>
                            <button type="submit" name="create_post" class="btn btn-primary btn-block mb-4">Create Note</button>
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