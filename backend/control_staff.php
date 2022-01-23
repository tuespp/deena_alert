<?php
//เชื่อมต่อฐานข้อมูล
require('../dbconnect.php');

$id = $_POST['status_id'];



$sql ="SELECT * FROM user_role WHERE id = '$id' ";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)){

if($row['staff'] == '1'){

        $sql2 = "UPDATE user_role SET staff = '0' WHERE id =  '$id'";

        $result2 = mysqli_query($con, $sql2) ;

}else{
           $sql3 = "UPDATE user_role SET staff = '1' WHERE id =  '$id'";

        $result3 = mysqli_query($con, $sql3) ;
} 

}

?>