
<?php

require('../dbconnect.php');

$name = $_POST['username'];

$date2 = new DateTime();
$date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
$date_create = $date2->format("Y-m-d H:i:s");

$temp = explode('.', $_FILES['file']['name']);
$new_name = round(microtime(true) * 9999) . '.' . end($temp);
$url = '../img/' . $new_name;


if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
$sql2 = "SELECT * FROM form WHERE form_name='" . $name . "'";
$result2 = mysqli_query($con, $sql2) or die ;
$num_row = mysqli_num_rows($result2);

if ($num_row == 0) {

    $sql = "INSERT INTO form (form_name, form_img,date_create)
    VALUES ('$name', '$new_name','$date_create')";

    $result = mysqli_query($con, $sql) ;

     if ($result) {
        echo '<script> window.location.href = "../page/upload_form.php";alert("Insert success")</script>';

    }else{}
} else {


    echo " <script type='text/javascript'>alert('username นี้มีการใช้งานไปแล้ว กรุณาใช้ username อื่น')
    window.location.href = '../page/upload_form_add.php';
    
    </script>";
}
 
}else{
 echo " <script type='text/javascript'>alert('กรุณาใส่รูปเอกสารให้สมบูรณ์')
        window.location.href = '../page/upload_form_add.php';
        
        </script>";
    }   





?>