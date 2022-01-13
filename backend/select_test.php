
<?php 

require('../dbconnect.php');

$id = $_POST['status_id'];

echo '<a href="report_detail.php?id='.$id.'">ส่งแบบละเอียด</a>';

?>