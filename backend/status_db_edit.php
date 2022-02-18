
<?php

require('../dbconnect.php');

                $ids = $_POST['ids'];
                 $name = $_POST['name'];
               
                 $type = $_POST['type'];
                 $no = $_POST['no'];


                $sql2 = "UPDATE `sub_status` SET `sub_name`='$name',`status`='$type',`no`='$no' WHERE id = $ids";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/status_manage.php";alert("Update success") </script>';
                }


?>