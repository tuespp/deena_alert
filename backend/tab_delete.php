<?php

require('../dbconnect.php');

$id = $_GET['id'];



$sql ="DELETE FROM user_role WHERE id = $id";
$result = mysqli_query($con,$sql);

if($result){
    echo '<script> window.location.href = "../page/control.php";</script>';

} 

?>
