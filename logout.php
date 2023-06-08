<!-- <?php
        // sleep(10);
        // session_start();
        // session_destroy();
        // header('location: login.php');
        ?> -->
<?php
session_start();
include 'config.php';
$errorMsg = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Hi, <?php echo $_SESSION['username']; ?></h3>
        <h6>Your Data Will Be Saved For Later!</h6>
        <br>
        <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                <span class="sr-only"> 0% Complete </span>
            </div>
        </div>
        <?php
            sleep(5);
            session_start();
            session_destroy();
            header('location: login.php');
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var progressBar = $(".progress-bar");
            var percentVal = 0;
            var timeLeft = 10;

            var timerInterval = setInterval(function() {
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    progressBar.width("100%");
                    progressBar.attr("aria-valuenow", "100");
                    progressBar.text(" 100% Complete ");
                } else {
                    percentVal += 10;
                    progressBar.width(percentVal + "%");
                    progressBar.attr("aria-valuenow", percentVal);
                    progressBar.text(" " + percentVal + "% Complete ");
                    timeLeft--;
                    $(".time-left").text(timeLeft + " Seconds Left");
                }
            }, 1000);
        });
    </script>
</body>

</html>