<?php
$mysqli = new mysqli("localhost", "root", "", "elearning");

if ($mysqli == false) {
    die("could not connect" . $mysqli->connect_error);
}

?>