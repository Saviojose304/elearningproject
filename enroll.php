<?php
include 'db.php';
session_start();
$user = $_SESSION['id'];
$course_id = $_GET['course_id'];

$sql = "INSERT INTO `course_enrolll`(`id`, `course_id`) VALUES ($user,$course_id)";
mysqli_query($mysqli,$sql);
header("Location: E-Learning.php");
?>