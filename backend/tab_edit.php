
<?php

require('../dbconnect.php');

                $ids = $_POST['ids'];
                $name = $_POST['name'];
                $link = $_POST['link'];
                $icon = $_POST['icon'];
                $type = $_POST['type'];


                $sql2 = "UPDATE user_role
                SET page = '$name',type = '$type', link= '$link',icon = '$icon'
                 WHERE id = '$ids' ";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/control.php";alert("Update success") </script>';
                }


?>