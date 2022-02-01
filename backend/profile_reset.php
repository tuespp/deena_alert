<?php

require_once("../dbconnect.php");

if(isset($_POST['submit'])){
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass2 = $_POST['new_pass2'];
    $password = $_SESSION["password"];
    $id = $_GET['id'];

   if($new_pass == $new_pass2){
       $sql = "SELECT * FROM users_info WHERE id = '".$id."'";
       $result = $con->query($sql);
       $row = $result->fetch_assoc();

       if($old_pass == $password ){
          $sql_pw = "UPDATE users_info SET password = '$new_pass' WHERE id = $id "; 

          $result_pw = $con->query($sql_pw) or die($con->error);
          if($result_pw){
            echo'<script> alert("เปลี่ยนรหัสผ่านใหม่สำเร็จ")</script>';
            header('Refresh:0; url= ../page/profile.php');

            $_SESSION["password"] =  $new_pass;
          }

       }else{
        echo'<script> alert("รหัสผ่านเดิมไม่ถูกต้อง")</script>';
        header('Refresh:0; url= ../page/profile.php');
       }

   }else{
       echo'<script> alert("รหัสผ่านใหม่ไม่ตรงกัน")</script>';
       header('Refresh:0; url= ../page/profile.php');
   }

}else{
    header("location: ../page/profile.php");
}



?>