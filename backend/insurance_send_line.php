
<?php
require('../dbconnect.php');
$date_now = date("Y-m-d");

/* $sql = "SELECT * FROM users_all WHERE status = '1'"; */

$sql2 = "SELECT data_insurance.car_license ,data_insurance.insurance , data_insurance.date_send, data_insurance.exp , data_insurance.interest , data_insurance.status , data_insurance.phone , users_info.user_id
FROM data_insurance
INNER JOIN users_info ON data_insurance.phone = users_info.tel";

$result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

while ($row2 = mysqli_fetch_array($result2)) {

    $car_license = $row2['car_license'];
    $date_send = $row2['date_send'];
    $interest = $row2['interest'];
    $phone = $row2['phone'];
    $user_id = $row2['user_id'];
    $insurance = $row2['insurance'];
    $exp = $row2['exp'];
    $status = $row2['status'];

    $emoji = array("\u{23F0}","\u{1F699}","\u{1F4C6}","\u{1F4B8}","\u{260E}");


 


    if ($date_send == $date_now && $status == '0' ) {


        $access_token = 'ynU0QtbQ0RaavkO7aEfXHYEdAlpU+xzWDtyMgOI5fsQegkB+duJi6HEL1DSBwW6O09MSUsGhASBAiVEt8mhF8WV+M7S+BMJyRKnoTEqtfNDN7de82RC4p+okDUQ4YQYFH7KQsnDVTo+/eEbjQeeRawdB04t89/1O/w1cDnyilFU=';
        $userId = $user_id;
        $messages = array(
            'type' => 'text',
            'text' => 'แจ้งเตือนต่ออายุ'." ".$emoji[0]. "\n" ."------------------------------". "\n".'ทะเบียนรถ:' . " " . $car_license ." ".$emoji[1]. "\n" . 'ประกันรถยนต์จะหมดอายุวันที่:' . " " . $exp ." ".$emoji[2]. "\n" . 'เบี้ยต่ออายุ:' . " " . $interest . 'บ.' ." ".$emoji[3]. "\n" . 'โปรดติดต่อ:' . " " . $phone . " " . 'จากดีน่า'." ".$emoji[4],
             
            

        );
        $post = json_encode(array(
            'to' => array($userId),
            'messages' => array($messages),
        ));

        $url = 'https://api.line.me/v2/bot/message/multicast';
        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        if ($result = curl_exec($ch)) {

           
            $sql3 = "INSERT INTO renewal_history (name,phone,type)
            VALUES ('$insurance','$phone','line')";

            $result3 = mysqli_query($con, $sql3) or die;

            $sql4 = "UPDATE data_insurance
            SET status = '1'
            WHERE phone = $phone ";

            $result4 = mysqli_query($con, $sql4) or die;
        }
    }
}



/* while ($row = mysqli_fetch_array($result)) {


    $all_id[] = $row['user_id'];
    $date_end[] = $row['date_end'];

} */

/* print_r($date_end); */
/*  echo $row2['date_end']; */




/*         foreach ($all_id as $user_id) { */

/* $result2 = mysqli_query($con,$sql) or die(mysqli_error($con)); */

/* while ($row = mysqli_fetch_array($result2)) {

    
    $date = $row['date_end'];

    if ($date == $date_now) {

       
        $user_id = $row['user_id'];
       

        $access_token = 'ynU0QtbQ0RaavkO7aEfXHYEdAlpU+xzWDtyMgOI5fsQegkB+duJi6HEL1DSBwW6O09MSUsGhASBAiVEt8mhF8WV+M7S+BMJyRKnoTEqtfNDN7de82RC4p+okDUQ4YQYFH7KQsnDVTo+/eEbjQeeRawdB04t89/1O/w1cDnyilFU=';
        $userId = $user_id;
        $messages = array(
            'type' => 'text',
            'text' => 'ทะเบียนรถ.............. โปรดชำระค่าเบี้ยประกันงวดที่....... จำนวน......... บ. ภายในวันที่...........',

        );
        $post = json_encode(array(
            'to' => array($userId),
            'messages' => array($messages),
        ));

        $url = 'https://api.line.me/v2/bot/message/multicast';
        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        
    }
}
 */

/* if ($result) {
    echo " <script type='text/javascript'>alert('Send message success');
window.location.href='../page/message_oa.php';

</script>";*/



?>
