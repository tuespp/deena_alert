<?php

require_once('../dbconnect.php');

  $id = $_GET['id'];
 

if(isset($_POST['submit'])){

   $temp = explode('.', $_FILES['file']['name']);
   $new_name = round(microtime(true)*9999). '.' . end($temp);
   $url = '../img/'.$new_name;

   if(move_uploaded_file($_FILES['file']['tmp_name'],$url)){
     $sql = "UPDATE users_info SET img = '".$new_name."' WHERE id = '".$id."' ";
     $result = $con->query($sql) or die($con->error);

     if($result){
         $_SESSION['img'] = $new_name;
         echo '<script> alert("อัพเดตรูปภาพสำเร็จ") </script>';
         header('Refresh:0; url=../page/staff.php');
     }
   } 


}else{
    header('location:../page/staff_update_form.php');
}
 



?>