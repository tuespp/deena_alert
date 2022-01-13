
<?php

require('../dbconnect.php');

                $id = $_GET['id'];
                $username = $_POST['username'];
                $name = $_POST['name'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $address = $_POST['address'];
               

                $sql2 = "UPDATE users_info
                SET username = '$username', name= '$name',tel = '$tel',email = '$email',address = '$address'
                 WHERE id = '$id' ";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/profile.php";alert("Update success") </script>';
                }


?>