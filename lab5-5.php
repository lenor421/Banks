<?php
$connect = mysqli_connect("localhost", "root", "root", "Banks");
mysqli_query($connect, "SET NAMES utf8");
 $zapros="DELETE FROM depositprograms WHERE id=" . $_GET['id'];
 mysqli_query($connect, $zapros);
 header("Location: Lab4.php");
 exit;
?>