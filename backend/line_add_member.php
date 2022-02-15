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

    if ($phone == $row['tel'] && $row['oa_id'] == '') {

        $sql3 = "UPDATE users_info SET user_id = '$userid', access_token='$accessToken', oa_id='$oa_id' WHERE tel = '$phone' ";
        $result3 = mysqli_query($con, $sql3);
        if ($result3) {

            $sql = "SELECT * FROM users_info WHERE user_id='$userid' AND oa_id ='$oa_id' ";
            $result = mysqli_query($con, $sql);
            $row2 = mysqli_fetch_array($result);
            $_SESSION['last_login_timestamp'] = time();
            $_SESSION["id"] = $row2["id"];
            $_SESSION["username"] = $row2["username"];
            $_SESSION["name"] = $row2["name"];
            $_SESSION["address"] = $row2["address"];
            $_SESSION["tel"] = $row2["tel"];
            $_SESSION["password"] = $row2["password"];
            $_SESSION["level"] = $row2["level"];
            $_SESSION["user_id"] = $row2["user_id"];

           
           
            $sql_line = "SELECT * FROM line_doc";
            $result_line = mysqli_query($con, $sql_line);
            
            while ($row_line = mysqli_fetch_array($result_line)) {
            
            
                if ($row_line['oa_id'] == $oa_id) {
            
                    $oa_name  =  $row_line['name'];
            
                    $sql_oa = "INSERT INTO $oa_name (name,email,tel,tel_keep,user_id,access_token,oa_id,u_info_id) 
                    VALUES ('$name','$email','$phone','$phone','$userid','$accessToken','$oa_id','$_SESSION[id]')";
                    $result_oa = mysqli_query($con, $sql_oa);
                }
            }
           

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

        $sql = "INSERT INTO users_info (tel,tel_keep,level,name,user_id,access_token,email,oa_id) 
                        VALUES ('$phone','$phone','member','$name','$userid','$accessToken','$email','$oa_id')";
        $result = mysqli_query($con, $sql);


        if ($result) {

            $sql = "SELECT * FROM users_info WHERE user_id='$userid' AND oa_id ='$oa_id' ";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $_SESSION['last_login_timestamp'] = time();
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["tel"] = $row["tel"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["level"] = $row["level"];
            $_SESSION["user_id"] = $row["user_id"];

           
           
            $sql_line = "SELECT * FROM line_doc";
            $result_line = mysqli_query($con, $sql_line);
            
            while ($row_line = mysqli_fetch_array($result_line)) {
            
            
                if ($row_line['oa_id'] == $oa_id) {
            
                    $oa_name  =  $row_line['name'];
            
                    $sql_oa = "INSERT INTO $oa_name (name,email,tel,tel_keep,user_id,access_token,oa_id,u_info_id) 
                    VALUES ('$name','$email','$phone','$phone','$userid','$accessToken','$oa_id','$_SESSION[id]')";
                    $result_oa = mysqli_query($con, $sql_oa);
                }
            }
           
           
           
           
           
           
            echo "<script> window.location.href='../page/index.php'</script>";
        
        
        
        
        
        } else {
            echo mysqli_error($con);
        }
    } else {
        echo "<script> window.location.href='../page/index.php'</script>";
    }
}






/* if ($oa_id == '1') {





    $sql_oa = "INSERT INTO tues_chat_1 (name,email,tel,user_id,access_token,oa_id) 
        VALUES ('$name','$email','$phone','$userid','$accessToken','$oa_id')";
    $result_oa = mysqli_query($con, $sql_oa);
}

if ($oa_id == '2') {

    $sql_oa = "INSERT INTO tues_chat_2 (name,email,tel,user_id,access_token,oa_id) 
        VALUES ('$name','$email','$phone','$userid','$accessToken','$oa_id')";
    $result_oa = mysqli_query($con, $sql_oa);
} */
