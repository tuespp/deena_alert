
<?php 

require('../dbconnect.php');

echo $id = $_POST['status_id'];



 $sql = "SELECT * FROM sub_status WHERE status = $id  ";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){

    echo '<option value="'.$row["id"].'" >'.$row["sub_name"].'</option>';
    
 
} 
 


?>