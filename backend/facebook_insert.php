<?php 
    
    include('../dbconnect.php');

    $userid  = $_POST['id'];
    $name  = $_POST['name'];
    $email  = $_POST['email'];
    $picture  = $_POST['picture'];

 
    
/*   $sql ="SELECT * FROM  users_info WHERE email =  $email ";
  $result = mysqli_query($con,$sql);
  $num_row = mysqli_num_rows($result);

    if($num_row == 0){ */

       /*  $sql2 = "INSERT INTO `users_info`(`name`,`level`,`email`,`facebook_id`) VALUES ('$name','member','$email','$userid ')";
        $result2 = mysqli_query($con,$sql2); */
       
    
        

   /*    }else{
    
       
    
      } */

      $sql = "SELECT * FROM users_info WHERE facebook_id='". $userid ."'";
      $result= mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);
      $Num_Rows = mysqli_num_rows($result);

      if ($Num_Rows == 0) {

        $sql2 = "INSERT INTO `users_info`(`name`,`level`,`email`,`facebook_id`) VALUES ('$name','member','$email','$userid ')";
        $result2 = mysqli_query($con,$sql2);

        $sql2 = "SELECT * FROM users_info WHERE facebook_id='". $userid ."'";
        $result2= mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_array($result2);

        $_SESSION['id'] = $row2['id'];
        $_SESSION['name'] = $row2['name'];
        $_SESSION['email'] = $row2['email'];
        $_SESSION['level'] = $row2['level'];
        $_SESSION['user_id'] = $row2['user_id'];
        echo "<script> window.location.href='../page/index.php'</script>";
      } else {

        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['user_id'] = $row['user_id'];
         
           echo "<script> window.location.href='../page/index.php'</script>"; 
      }

    
