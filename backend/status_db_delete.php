<?php

require('../dbconnect.php');

$id = $_GET['id'];



$sql ="DELETE FROM sub_status WHERE id = $id";
$result = mysqli_query($con,$sql);

if($result){
    echo '<script> window.location.href = "../page/status_manage.php";</script>';

} 

?>
