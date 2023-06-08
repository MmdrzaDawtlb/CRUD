<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

include 'config.php';

$id = $_GET['id'];

// Delete post by id
$query = "DELETE FROM posts WHERE id=$id";
mysqli_query($con, $query);

header('location: index.php');
?>