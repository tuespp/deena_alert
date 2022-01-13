<?php

require('../dbconnect.php');

$id = $_GET['id'];

$sql ="DELETE FROM payment WHERE id = $id";
$result = mysqli_query($con,$sql);

if($result){
    echo '<script> window.location.href = "../page/payment_data.php";</script>';

}

?>
