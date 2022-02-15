<?php

require_once('../dbconnect.php');

 $date = $_POST['date'];
 $report_type_id = $_POST['report_type_id'];


$sql2 = "SELECT * FROM text_report  WHERE time LIKE '%$date%' AND report_type_id = $report_type_id";
$query2 = mysqli_query($con, $sql2);




foreach ($query2 as $value2) { 

     if ($value2['report_text'] !== '') { 

 ?>     

        <li class="clearfix">
            <div class="message-data text-right">
                <span class="message-data-time"><?php echo $value2['time'] ?></span>
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
            </div>

            <div class="message other-message float-right"><?php echo $value2['report_text'] ?></div>
        </li>
    <?php } else ?>

    <?php if ($value2['report_img'] !== '') { ?>
        <li class="clearfix">
            <div class="message-data text-right">
                <span class="message-data-time"><?php echo $value2['time'] ?></span>
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
            </div>

            <div class="message other-message float-right"> <img src="../img/<?php echo $value2['report_img'] ?>" width="200" alt=""> </div>
        </li>
    <?php }  ?>

<?php } ?>

