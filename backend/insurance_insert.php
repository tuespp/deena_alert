
<?php

require('../dbconnect.php');

$insurance = $_POST['insurance'];
$phone = $_POST['phone'];
$type = $_POST['type'];
$car_license = $_POST['car_license'];
$exp = $_POST['exp'];
$interest = $_POST['interest'];
$date_send = $_POST['date_send'];

$sql = "INSERT INTO data_insurance (insurance, phone, type, car_license, exp, interest,status,date_send,status_sms)
VALUES ('$insurance', '$phone', '$type', '$car_license', '$exp', '$interest','0','$date_send','0')"; 

$result = mysqli_query($con,$sql) or die ;

if($result){
    echo '<script> window.location.href = "../page/insurance_data.php";alert("Insert success")</script>';

}



?>