<?php

require_once('../dbconnect.php');

if (isset($_POST['submit'])) {
   
     $oa_id = $_POST['oa_id'];
      $name = $_POST['name'];
      $access_token = $_POST['access_token'];
  
    $sql_line = "UPDATE `line_doc` SET `name`='$name',`access_token`='$access_token' WHERE oa_id = '$oa_id'";
    $result_line = mysqli_query($con, $sql_line);

    echo '<script> window.location.href = "../page/setting_api.php";alert("Update success") </script>';
  }
  if (isset($_GET['oa_id'])) {

  echo  $oa_id = $_GET['oa_id'];
  echo  $name = $_GET['name'];

$sql_del = "DELETE FROM `line_doc` WHERE oa_id = '$oa_id'";
$result_del = mysqli_query($con, $sql_del);
echo '<script> window.location.href = "../page/setting_api.php";alert("Delete success") </script>';

$sql_drop  = "DROP TABLE $name";
$result_drop = mysqli_query($con, $sql_drop);


  }
 
?>