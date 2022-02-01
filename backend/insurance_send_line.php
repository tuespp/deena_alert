
<?php
require('../dbconnect.php');
 $date_now = date("Y-m-d");



$sql2 = "SELECT data_insurance.car_license ,data_insurance.insurance , data_insurance.date_send, data_insurance.exp , data_insurance.interest , data_insurance.status , data_insurance.phone , tues_chat_1.user_id,line_doc.access_token
FROM data_insurance
INNER JOIN tues_chat_1 ON data_insurance.phone = tues_chat_1.tel
INNER JOIN line_doc ON tues_chat_1.oa_id = line_doc.oa_id";


$result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));



$sql_txt = "SELECT * FROM text_sent_ins ";
$result_txt = mysqli_query($con, $sql_txt);
$row_txt = mysqli_fetch_array($result_txt);

 $text_title = $row_txt['text_title'];
$text_license = $row_txt['text_license'];

 $text_price = $row_txt['text_price'];
 $text_date = $row_txt['text_date'];
 $text_close = $row_txt['text_close'];





while ($row2 = mysqli_fetch_array($result2)) {

    $car_license = $row2['car_license'];
    $date_send = $row2['date_send'];
    $interest = $row2['interest'];
    $phone = $row2['phone'];
    $user_id = $row2['user_id'];
    $insurance = $row2['insurance'];
    $exp = $row2['exp'];
    $status = $row2['status'];
    $access_tk = $row2['access_token'];
    $emoji = array("\u{23F0}","\u{1F699}","\u{1F4C6}","\u{1F4B8}","\u{260E}");


 


    if ($date_send == $date_now && $status == '0' ) {

        
        $access_token = $access_tk;
        $userId = $user_id;
        $messages = array(
            'type' => 'text',
/*             'text' => ' $text_title'." ".$emoji[0]. "\n" ."------------------------------". "\n".'ทะเบียนรถ:' . " " . $car_license ." ".$emoji[1]. "\n" . 'ประกันรถยนต์จะหมดอายุวันที่:' . " " . $exp ." ".$emoji[2]. "\n" . 'เบี้ยต่ออายุ:' . " " . $interest . 'บ.' ." ".$emoji[3]. "\n" . 'โปรดติดต่อ:' . " " . $phone . " " . 'จากดีน่า'." ".$emoji[4],
 */            'text' => $text_title."\n"."------------------------------"."\n".$text_license . " " . $car_license ."\n" . $text_date . " " . $exp ."\n" . $text_price . " " . $interest . "\n" . $text_close,

            

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
            SET status = '0'
            WHERE phone = $phone ";

            $result4 = mysqli_query($con, $sql4) or die;
        }
    }
}

?>
