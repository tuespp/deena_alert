<?php

require('../dbconnect.php');

$id = $_GET['id'];
$oa_id = $_GET['oa_id'];

$sql ="DELETE FROM users_info WHERE id = $id";
$result = mysqli_query($con,$sql);


$sql_line = "SELECT * FROM line_doc WHERE oa_id = '$oa_id' ";
$result_line = mysqli_query($con, $sql_line);

$row_line = mysqli_fetch_array($result_line);

$oa_name  =  $row_line['name'];

$sql_oa = "DELETE FROM `$oa_name` WHERE u_info_id = '$id' ";
$result_oa = mysqli_query($con, $sql_oa);


if($result){
    echo '<script> window.location.href = "../page/member.php";</script>';

}

?>
