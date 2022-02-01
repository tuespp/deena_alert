
<?php

require('../dbconnect.php');

$text1 = $_POST['text-1'];
$text2 = $_POST['text-2'];
$text3 = $_POST['text-3'];
$text4 = $_POST['text-4'];
/* $text5 = $_POST['text-5']; */
$text6 = $_POST['text-6'];


$sql = "UPDATE `text_sent_ins` 
SET `text_title`='$text1',`text_license`='$text2',`text_date`='$text3',`text_price`='$text4',`text_close`='$text6' WHERE 1"; 

$result = mysqli_query($con,$sql) or die ;

if($result){
    echo '<script> window.location.href = "../page/text_send_insu.php";alert("Insert success")</script>';

}



?>