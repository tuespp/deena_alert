
<?php

require('../dbconnect.php');

$name = $_POST['name'];
$file = $_POST['file'];
$icon = 'nav-icon'." ".$_POST['icon'];
$type = $_POST['type'];




$sql = "INSERT INTO user_role (page,type, link, icon)
VALUES ('$name','$type', '$file', '$icon')"; 

$result = mysqli_query($con,$sql) or die ;

if($result){
    echo '<script> window.location.href = "../page/control.php";alert("Insert success")</script>';

}



?>