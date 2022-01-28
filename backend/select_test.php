
<?php 

require('../dbconnect.php');

$id = $_POST['status_id'];
$oa_id = $_POST['oa_id'];

echo '<a href="report_detail.php?id='.$id.'&oa_id='.$oa_id.'">ส่งแบบละเอียด</a>';

?>