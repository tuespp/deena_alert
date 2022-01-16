
<?php

require('../dbconnect.php');

                $ids = $_POST['ids'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];

                $phone = $_POST['tel'];
               


                $sql2 = "UPDATE users_info
                SET name = '$name', tel= '$phone', email= '$email', address= '$address'
                 WHERE id = '$ids' ";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/staff.php";alert("Update success") </script>';
                }


?>