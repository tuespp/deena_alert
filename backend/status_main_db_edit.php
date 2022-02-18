
<?php

require('../dbconnect.php');

                $ids = $_POST['ids'];
                $name = $_POST['name'];
                $no = $_POST['no'];


                $sql2 = "UPDATE status
                SET no = '$no',status_name = '$name'
                 WHERE id = '$ids' ";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/status_manage.php";alert("Update success") </script>';
                }


?>