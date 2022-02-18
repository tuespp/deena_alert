<?php 

include('../dbconnect.php');

if(isset($_POST['role_type'])){
$role_type =  $_POST['role_type'];

$sql = "INSERT INTO `user_role_type`(`name`) VALUES ('$role_type')";
$result = mysqli_query($con,$sql);
}


if(isset($_POST['report_type'])){

    $report_type =  $_POST['report_type'];

    $sql = "INSERT INTO `text_report_type`(`report_type_name`) VALUES ('$report_type')";
    $result = mysqli_query($con,$sql);
}


if(isset($_POST['status_name'])){

    $status_name =  $_POST['status_name'];

    $sql = "INSERT INTO `status`(`status_name`) VALUES ('$status_name')";
    $result = mysqli_query($con,$sql);
}


?>