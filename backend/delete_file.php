<?php
require_once('../dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}



$submit = $_GET['submit'];

if ($submit=="DEL") {
    //เลือกไฟล์เก่าจากฐานข้อมูล
    $sqlD = "SELECT File_Name FROM file WHERE File_ID='" . $_GET["id"] . "'";
    $queryD = mysqli_query($con, $sqlD);
    foreach ($queryD as $value) {
        $fileD = $value['Car_Img'];
    }
    //ลบรูปไฟล์เก่าในโฟเดอร์
    chmod('brand', 0777);
    $del_file = "../page/myFile/$fileD";
    @unlink($del_file);

   $sql = "DELETE FROM file WHERE File_ID='" . $_GET["id"] . "'";
   mysqli_query($con, $sql);
   header("location: ../page/credit_insurance.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($con);
}


mysqli_close($con);
?>