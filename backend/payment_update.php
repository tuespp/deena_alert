<?php

require('../dbconnect.php');


$id = $_POST['id'];

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
$note = $_POST['note'];



$sql = "UPDATE payment SET invoice_id='$invoice_id',invoice_date='$invoice_date',
insurance_id='$insurance_id',insurance='$insurance',name='$name',phone='$phone',
type='$type',car_license='$car_license',date_start='$date_start',premium='$premium',
premium_total='$premium_total',agent='$agent',installment_no='$installment_no',date_end='$date_end',
installment='$installment',date_send='$date_send',note='$note' 
WHERE id = '$id' "; 

$result = mysqli_query($con,$sql) or die ;

if($result){

    echo '<script> window.location.href = "../page/payment_data.php"; alert("Update success")</script>';
}
