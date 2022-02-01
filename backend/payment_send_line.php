
<?php
require('../dbconnect.php');
$date_now = date("Y-m-d");

/* $sql = "SELECT * FROM users_all WHERE status = '1'"; */

$sql2 = "SELECT payment.car_license ,payment.installment_no , payment.installment , payment.insurance,payment.status, payment.date_send , payment.date_end , tues_chat_1.user_id, tues_chat_1.tel,line_doc.access_token
FROM payment
INNER JOIN tues_chat_1 ON payment.phone = tues_chat_1.tel
INNER JOIN line_doc ON tues_chat_1.oa_id = line_doc.oa_id";

$result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));


$sql_txt = "SELECT * FROM text_send_payment";
$result_txt = mysqli_query($con, $sql_txt);
$row_txt = mysqli_fetch_array($result_txt);

$text_title = $row_txt['text_title'];
$text_license = $row_txt['text_license'];
$text_installment = $row_txt['text_installment'];
$text_price = $row_txt['text_price'];
$text_date = $row_txt['text_date'];
$text_close = $row_txt['text_close'];


while ($row2 = mysqli_fetch_array($result2)) {

    $car_license = $row2['car_license'];
    $installment_no = $row2['installment_no'];
    $installment = $row2['installment'];
    $date_send = $row2['date_send'];
    $user_id = $row2['user_id'];
    $insurance = $row2['insurance'];
    $phone = $row2['tel'];
    $date_end = $row2['date_end'];
    $status = $row2['status'];
    $access_tk = $row2['access_token'];


    $emoji = array("\u{23F0}", "\u{1F699}", "\u{1F4C6}", "\u{1F4B8}", "\u{260E}");





    if ($date_send == $date_now && $status == '0') {


        $access_token = $access_tk;
        $userId = $user_id;
        $messages = array(
            'type' => 'text',
            'text' => $text_title . "\n" . "------------------------------" . "\n" . $text_license . " " . $car_license . "\n" . $text_installment . " " . $installment_no . "\n" . $text_price . " " . $installment . 'บาท.' . "\n" . $text_date . " " . $date_end . "\n".$text_close,

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

            $sql3 = "INSERT INTO payment_history (name,phone,type)
            VALUES ('$insurance','$phone','line')";

            $result3 = mysqli_query($con, $sql3) or die;


            $sql4 = "UPDATE payment
            SET status = '0'
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
