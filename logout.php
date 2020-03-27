<?php

$conn = mysqli_connect("localhost","root");
session_start();
session_unset();
session_destroy();
header('location: firstpage.php');
die;
?>