
<?php 

require('../dbconnect.php');

$id = $_POST['status_id'];



$sql = "SELECT * FROM sub_status WHERE status = $id  ";
$result = mysqli_query($con,$sql);
echo '<option value="" selected disabled class="text-center">------- Select status -------</option>';

while($row = mysqli_fetch_array($result)){

    echo '<option value="'.$row["id"].'" class="text-center">'.$row["sub_name"].'</option>';
    
 
} 



?>