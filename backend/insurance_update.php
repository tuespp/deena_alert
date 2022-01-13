
<?php

require('../dbconnect.php');

                $ids = $_POST['ids'];
                $insurance = $_POST['insurance'];
                $phone = $_POST['phone'];
                $type = $_POST['type'];
                $car_license = $_POST['car_license'];
                $exp = $_POST['exp'];
                $interest = $_POST['interest'];
                $date_send = $_POST['date_send'];
                $note = $_POST['note'];

                $sql2 = "UPDATE data_insurance
                SET insurance = '$insurance', phone= '$phone',type = '$type',car_license = '$car_license',exp = '$exp',interest = '$interest',date_send = '$date_send',note = '$note'
                 WHERE id = '$ids' ";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/insurance_data.php";alert("Update success") </script>';
                }


?>