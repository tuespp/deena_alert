
<?php

require('../dbconnect.php');

                $id = $_GET['id'];
                $api = $_POST['api'];
                $auth = $_POST['auth'];

                
                $sql2 = "UPDATE sms_doc
                SET api = '$api', auth= '$auth'
                 WHERE id = '$id' ";
                $result2 = mysqli_query($con, $sql2);

                if ($result2) {

                    echo '<script> window.location.href = "../page/setting_api.php";alert("Update success") </script>';
                }


?>