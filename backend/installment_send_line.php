
<?php
require('../dbconnect.php');
$date_now = date("Y-m-d");



$sql2 = "SELECT installment.ins1,installment.ins2,installment.ins3,installment.ins4,installment.ins5,installment.ins6,installment.ins7,installment.ins8,installment.ins9,installment.ins10,

installment.date_send2,installment.date_send3,installment.date_send4,installment.date_send5,installment.date_send6,installment.date_send7,installment.date_send8,installment.date_send9,installment.date_send10,

users_info.user_id,ins_form.form_id,ins_form.car_license

FROM ((installment
LEFT  JOIN ins_form ON installment.form_id = ins_form.form_id)
LEFT  JOIN users_info ON ins_form.tel = users_info.tel)"
;

$result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));

while ($row2 = mysqli_fetch_array($result2)) {

    /* $ins1 = $row2['ins1'];
    $ins2 = $row2['ins2'];
    $ins3 = $row2['ins3'];
    $ins4 = $row2['ins4'];
    $ins5 = $row2['ins5'];
    $ins6 = $row2['ins6'];
    $ins7 = $row2['ins7'];
    $ins8 = $row2['ins8'];
    $ins9 = $row2['ins9'];
    $ins10 = $row2['ins10']; */

    $user_id = $row2['user_id'];
    $car_license = $row2['car_license'];

    

    $emoji = array("\u{23F0}","\u{1F699}","\u{1F4C6}","\u{1F4B8}","\u{260E}");


 
    for($i=2;$i<=10 ; $i++){

        $date_send = $row2['date_send'.$i];

        echo $date_send;
        /* echo $date_now; */
        

    if ($date_send == $date_now) {

        echo $user_id;

        $access_token = 'ynU0QtbQ0RaavkO7aEfXHYEdAlpU+xzWDtyMgOI5fsQegkB+duJi6HEL1DSBwW6O09MSUsGhASBAiVEt8mhF8WV+M7S+BMJyRKnoTEqtfNDN7de82RC4p+okDUQ4YQYFH7KQsnDVTo+/eEbjQeeRawdB04t89/1O/w1cDnyilFU=';
        $userId = $user_id;
        $messages = array(
            'type' => 'text',
            'text' => 'แจ้งเตือนต่ออายุ'." ".$emoji[0]. "\n" ."------------------------------". "\n".'ทะเบียนรถ:' . " ".$car_license." ".$emoji[1]. "\n" . 'ชำระงวดที่'." ".$i.':' . " " ." ".$emoji[2]. "\n" . 'เป็นจำนวน:' . " ".$row2['ins'.$i]. 'บ.' ." ".$emoji[3]. "\n" . 'โปรดชำระไม่เกิน :' . $date_send . " ".$emoji[4] ."\n".'จากดีน่า',
             
            

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

           
           
        }
    }
}
}
?>
