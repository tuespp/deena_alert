
<?php

require('../dbconnect.php');

$ids = $_POST['ids'];
$oa_id = $_POST['oa_id'];

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];

$phone = $_POST['phone'];
$status = $_POST['status'];
$sub_name = $_POST['sub_name'];


$sql2 = "UPDATE users_info
                SET name = '$name', tel= '$phone', email= '$email', address= '$address',status = '$status',sub_status = '$sub_name'
                 WHERE id = '$ids' ";
$result2 = mysqli_query($con, $sql2);


$sql_line = "SELECT * FROM line_doc WHERE oa_id = '$oa_id' ";
$result_line = mysqli_query($con, $sql_line);

$row_line = mysqli_fetch_array($result_line);

$oa_name  =  $row_line['name'];

$sql_oa = "UPDATE `$oa_name` SET `name`='$name',`tel`='$phone' WHERE u_info_id = '$ids' ";
$result_oa = mysqli_query($con, $sql_oa);


if ($result2) {

    echo '<script> window.location.href = "../page/member.php";alert("Update success") </script>';
}


?>