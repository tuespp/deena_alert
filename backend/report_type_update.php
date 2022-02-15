
<?php

require('../dbconnect.php');

                $report_type_id = $_POST['report_type_id'];
                $report_type_name = $_POST['report_type_name'];
                $report_type_no = $_POST['report_type_no'];


                $sql2 = "UPDATE `text_report_type` SET `report_type_name`='$report_type_name',`report_type_no`='$report_type_no' WHERE report_type_id = $report_type_id";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/report_type.php";alert("Update success") </script>';
                }


?>