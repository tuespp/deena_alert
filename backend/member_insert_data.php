
<?php

require('../dbconnect.php');





    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $sub_status = $_POST['sub_status'];


    $temp = explode('.', $_FILES['file']['name']);
    $new_name = round(microtime(true) * 9999) . '.' . end($temp);
    $url = '../img/' . $new_name;


    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {

        $sql2 = "SELECT * FROM users_info WHERE username='" . $username . "'";
        $result2 = mysqli_query($con, $sql2) or die;
        $num_row = mysqli_num_rows($result2);

        if ($num_row == 0) {

            $sql = "INSERT INTO users_info (username, password, name, tel, email, address,img,level,status,sub_status)
    VALUES ('$username', '$password', '$name', '$tel', '$email', '$address','$new_name','member','$status','$sub_status')";

            $result = mysqli_query($con, $sql) or die(mysqli_errno($con));

            if ($result) {
                echo '<script> window.location.href = "../page/member.php";alert("Insert success")</script>';
            } else {
            }
        } else {


            echo " <script type='text/javascript'>alert('username นี้มีการใช้งานไปแล้ว กรุณาใช้ username อื่น')
    window.location.href = '../page/member_insert.php';
    
    </script>";
        }
    }else{

        $sql2 = "SELECT * FROM users_info WHERE username='" . $username . "'";
        $result2 = mysqli_query($con, $sql2) or die;
        $num_row = mysqli_num_rows($result2);

        if ($num_row == 0) {

            $sql = "INSERT INTO users_info (username, password, name, tel, email, address,level,status,sub_status)
    VALUES ('$username', '$password', '$name', '$tel', '$email', '$address','member','$status','$sub_status')";

            $result = mysqli_query($con, $sql) or die(mysqli_errno($con));

            if ($result) {
                echo '<script> window.location.href = "../page/member.php";alert("Insert success")</script>';
            } else {
            }
        } else {


            echo " <script type='text/javascript'>alert('username นี้มีการใช้งานไปแล้ว กรุณาใช้ username อื่น')
    window.location.href = '../page/member_insert.php';
    
    </script>";
        }

    }



?>