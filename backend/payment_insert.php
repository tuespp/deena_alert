<?php

require('../dbconnect.php');

$invoice_id = $_POST['invoice_id'];
$invoice_date = $_POST['invoice_date'];
$insurance_id = $_POST['insurance_id'];
$insurance = $_POST['insurance'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$type = $_POST['type'];
$car_license = $_POST['car_license'];
$date_start = $_POST['date_start'];
$premium = $_POST['premium'];
$premium_total = $_POST['premium_total'];
$agent = $_POST['agent'];
$installment_no = $_POST['installment_no'];
$date_end = $_POST['date_end'];
$installment = $_POST['installment'];
$date_send = $_POST['date_send'];


$sql = "INSERT INTO `payment`(`invoice_id`, `invoice_date`, `insurance_id`, `insurance`, `name`, `phone`, `type`, `car_license`, `date_start`, `premium`, `premium_total`, `agent`, `installment_no`, `date_end`, `installment`, `date_send`)
 VALUES ('$invoice_id','$invoice_date','$insurance_id','$insurance','$name','$phone','$type','$car_license','$date_start','$premium','$premium_total','$agent','$installment_no','$date_end','$installment','$date_send')"; 

$result = mysqli_query($con,$sql) or die ;

if($result){
    echo '<script> window.location.href = "../page/payment_data.php";alert("Insert success")</script>';

}



?>