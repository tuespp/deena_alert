
<?php

require('../dbconnect.php');

                $ids = $_POST['ids'];
                $insurance = $_POST['insurance'];
                $phone = $_POST['phone'];
                $status = $_POST['status'];
                $sub_name = $_POST['sub_name'];


                $sql2 = "UPDATE users_info
                SET name = '$insurance', tel= '$phone',status = '$status',sub_status = '$sub_name'
                 WHERE id = '$ids' ";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/member.php";alert("Update success") </script>';
                }


?>