<?php

include "../dbconnect.php";

$id = $_GET['id'];

$sql = "DELETE FROM custom_p WHERE p_id = $id";

if (mysqli_query($con, $sql)) {
   mysqli_close($con);
   header('Location: ../page/cart.php'); //If book.php is your main page where you list your all records
   exit;
} else {
   echo "Error deleting record";
}
