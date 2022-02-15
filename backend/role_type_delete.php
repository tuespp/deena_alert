<?php

require('../dbconnect.php');

if(isset($_GET['id'])){
$id = $_GET['id'];

$sql ="DELETE FROM user_role_type WHERE id = $id";
$result = mysqli_query($con,$sql);

if($result){
    echo '<script> window.location.href = "../page/control.php";</script>';

}
}


if(isset($_GET['report_type_id'])){
    $report_type_id = $_GET['report_type_id'];
    
    $sql ="DELETE FROM text_report_type WHERE report_type_id = $report_type_id";
    $result = mysqli_query($con,$sql);
    
    if($result){
        echo '<script> window.location.href = "../page/report_type.php";</script>';
    
    }
    }

?>
