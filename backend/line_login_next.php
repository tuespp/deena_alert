<?php
        require('../dbconnect.php');

        $userid = $_POST['user'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $accessToken = $_POST['accessToken'];
        $oa_id = $_POST['oa_id'];

        $sql = "SELECT * FROM users_info WHERE user_id='$userid' AND oa_id='$oa_id' ";
        $result= mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $Num_Rows = mysqli_num_rows($result);

        if ($Num_Rows == 0) {


            echo "<script> window.location.href='../page/line_login_new.php'</script>";
            
        } else {
            $_SESSION['last_login_timestamp'] = time();
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["tel"] = $row["tel"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["level"] = $row["level"];
            $_SESSION["user_id"] = $row["user_id"];

           
             echo "<script> window.location.href='../page/index.php'</script>"; 
        }

        $sql2 = "INSERT INTO user_timestamp (name,email,user_id) VALUES ('$name','$email','$userid')";
        $result2 = mysqli_query($con, $sql2); 


        
        ?>