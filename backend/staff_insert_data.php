
<?php

require('../dbconnect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$address = $_POST['address'];




$sql2 = "SELECT * FROM users_info WHERE username='" . $username . "'";
$result2 = mysqli_query($con, $sql2) or die ;
$num_row = mysqli_num_rows($result2);

if ($num_row == 0) {

    $sql = "INSERT INTO users_info (username, password, name, tel, email, address,level)
    VALUES ('$username', '$password', '$name', '$tel', '$email', '$address','employee')";

    $result = mysqli_query($con, $sql) ;

     if ($result) {
        echo '<script> window.location.href = "../page/staff.php";alert("Insert success")</script>';

    }else{}
} else {


    echo " <script type='text/javascript'>alert('username นี้มีการใช้งานไปแล้ว กรุณาใช้ username อื่น')
    window.location.href = '../page/staff_insert.php';
    
    </script>";
}
 
 



?>