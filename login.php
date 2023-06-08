<?php
session_start();

if (isset($_SESSION['username'])) {
    header('location: index.php');
}

include 'config.php';

$errorMsg = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_array($result);
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id'];
        header('location: login.php');
    } else {
        $errorMsg = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        Login
                    </div>
                    <div class="card-body">
                        <?php if ($errorMsg != '') { ?>
                            <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
                        <?php } ?>
                        <form method="POST" action="">
                            <div class="form-outline mb-4">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-outline mb-4">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" name="login" class="btn btn-primary btn-block mb-4">login</button>
                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Not a member? <a href="login2.php">Register</a></p>
                                </button>
                            </div>
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