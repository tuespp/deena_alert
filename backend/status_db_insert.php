
<?php

require('../dbconnect.php');

$name = $_POST['name'];

$type = $_POST['type'];




$sql = "INSERT INTO sub_status (sub_name,status)
VALUES ('$name','$type')"; 

$result = mysqli_query($con,$sql) or die ;

if($result){
    echo '<script> window.location.href = "../page/status_manage.php";alert("Insert success")</script>';

}



?>