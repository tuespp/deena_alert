<?php

require('../dbconnect.php');

$id = $_GET['id'];

$sql ="DELETE FROM form WHERE form_id = $id";
$result = mysqli_query($con,$sql);

if($result){
    echo '<script> window.location.href = "../page/upload_form.php";</script>';

}

?>
