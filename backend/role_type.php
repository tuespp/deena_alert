<?php 

include('../dbconnect.php');

$role_type =  $_POST['role_type'];

$sql = "INSERT INTO `user_role_type`(`name`) VALUES ('$role_type')";
$result = mysqli_query($con,$sql);


?>