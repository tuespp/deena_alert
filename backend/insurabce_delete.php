<?php

require('../dbconnect.php');

$id = $_GET['id'];

$sql ="DELETE FROM data_insurance WHERE id = $id";
$result = mysqli_query($con,$sql);

if($result){
    echo '<script> window.location.href = "../page/insurance_data.php";</script>';

}

?>
