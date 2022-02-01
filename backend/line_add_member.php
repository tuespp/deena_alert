<?php
require('../dbconnect.php');

$name = $_POST["name"];
$userid = $_POST["user"];
$email = $_POST["email"];
$accessToken = $_POST["accessToken"];
$phone = $_POST["phone"];
$oa_id = $_POST['oa_id'];





$x = "";

$sql2 = "SELECT * FROM users_info";
$result2 = mysqli_query($con, $sql2);

while ($row = mysqli_fetch_array($result2)) {

    if ($phone == $row['tel'] && $oa_id == $row['oa_id']) {

        $sql3 = "UPDATE users_info SET user_id = '$userid', access_token='$accessToken', oa_id='$oa_id' WHERE tel = '$phone' ";
        $result3 = mysqli_query($con, $sql3);
        if ($result3) {

            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["tel"] = $row["tel"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["level"] = $row["level"];
            $_SESSION["user_id"] = $row["user_id"];

            echo "<script> window.location.href='../page/index.php'</script>";
            $x = 1;
        }

        

    } else {
    }
}


if ($x != 1) {

    $sql6 = "SELECT * FROM users_info WHERE tel='$phone' AND oa_id='$oa_id' ";
    $result6 = mysqli_query($con, $sql6) or die(mysqli_error($con));
    $Num_Rows = mysqli_num_rows($result6);

    if ($Num_Rows == 0) {

        $sql = "INSERT INTO users_info (tel,level,name,user_id,access_token,email,oa_id) 
                        VALUES ('$phone','member','$name','$userid','$accessToken','$email','$oa_id')";
        $result = mysqli_query($con, $sql);
        

        if ($result) {

            $sql = "SELECT * FROM users_info WHERE user_id='" . $userid . "'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["tel"] = $row["tel"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["level"] = $row["level"];
            $_SESSION["user_id"] = $row["user_id"];

            echo "<script> window.location.href='../page/index.php'</script>";
        } else {
            echo mysqli_error($con);
        }
    } else {
        echo "<script> window.location.href='../page/index.php'</script>";
    }
}



if ($oa_id == '1') {



    

    $sql_oa = "INSERT INTO tues_chat_1 (name,email,tel,user_id,access_token,oa_id) 
        VALUES ('$name','$email','$phone','$userid','$accessToken','$oa_id')";
    $result_oa = mysqli_query($con, $sql_oa);


}

if ($oa_id == '2') {

    $sql_oa = "INSERT INTO tues_chat_2 (name,email,tel,user_id,access_token,oa_id) 
        VALUES ('$name','$email','$phone','$userid','$accessToken','$oa_id')";
    $result_oa = mysqli_query($con, $sql_oa);
}