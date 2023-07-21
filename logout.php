<?php
session_start();

unset($_SESSION["id"]);
unset($_SESSION['pcart']);
unset($_SESSION['scart']);
header('location:login.php')

 ?>
0