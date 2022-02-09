<?php

include('../dbconnect.php');

if (isset($_POST['submit'])) {




    /*  $fname = $_POST['fname'];
    $lname = $_POST['lname'];
 */


    /* ----------------------------ข้อมูล-------------------------------- */

    $date_create = $_POST['date_create'];
    $date_start = $_POST['date_start'];
    $car_license = $_POST['car_license'];
    $birth_date = $_POST['birth_date'];
    $ins_type = $_POST['ins_type'];


    $date_create2 = $_POST['date_create'];
    $date_start2 = $_POST['date_start'];
    $birth_date2 = $_POST['birth_date'];

    /* ----------------------------แปลงเป็น พศ. เดือนไทย----------------------- */

    $date_thai = explode("-", $date_create2);
    $day = $date_thai[2];
    $mont = $date_thai[1];
    $year = $date_thai[0];
    $year = (int)($year + 543);



    $date_thai = explode("-", $birth_date2);
    $day3 = $date_thai[2];
    $mont3 = $date_thai[1];
    $year3 = $date_thai[0];
    $year3 = (int)($year3 + 543);


    $date_thai = explode("-", $date_start2);
    $day2 = $date_thai[2];
    $mont2 = $date_thai[1];
    $year2 = $date_thai[0];
    $year2 = (int)($year2 + 543);


    $sqly = "SELECT * FROM years";
    $resulty = mysqli_query($con, $sqly);

    foreach ($resulty as $value) {

        if ($value['year_id'] == $mont) {

            $mont = $value['year_name'];
        }

        if ($value['year_id'] == $mont2) {

            $mont2 = $value['year_name'];
        }

        if ($value['year_id'] == $mont3) {

            $mont3 = $value['year_name'];
        }
    }

    $date_create2 = $day . ' ' . $mont . ' ' . $year;
    $date_start2 = $day2 . ' ' . $mont2 . ' ' . $year2;
    $birth_date2 = $day3 . ' ' . $mont3 . ' ' . $year3;

    /* ------------------------------------------------------------------------------------ */



    $fullname = $_POST['fullname'];
    $id_card = $_POST['id_card'];




    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $tel = $_POST['tel'];
    echo $tel3 = $_POST['tel3'];

    $_SESSION['tel'] = $_POST['tel'];;
    $tel2 = $_POST['tel2'];
    /* ----------------------------ติดต่อฉุกเฉิน-------------------------------- */
    $name_grt = $_POST['name_grt'];
    $relation_grt = $_POST['relation_grt'];
    $tel_grt = $_POST['tel_grt'];

    /* -------------------------------ข้อมูลรถ----------------------------- */

    $car_type = $_POST['car_type'];

    $car_insu = $_POST['car_insu'];
    $car_price = $_POST['car_price'];




    $car_type2 = $_POST['car_type2'];
    $car_insu2 = $_POST['car_insu2'];
    $car_price2 = $_POST['car_price2'];



    /* -------------------------------ข้อมูลผ่อน----------------------------- */

    $total = $_POST['total'];
    $installment = $_POST['installment'];

    $price_ins1 = $_POST['price_ins1'];
    $installment2 = $_POST['installment2'];


    $text2 = 'บาท';
    $text3 = 'ชำระไม่เกินวันที่';

    $price_ins2 = $_POST['price_ins2'];
    $price_ins3 = $_POST['price_ins3'];
    $price_ins4 = $_POST['price_ins4'];
    $price_ins5 = $_POST['price_ins5'];
    $price_ins6 = $_POST['price_ins6'];

   $date_ins2 = $_POST['date1'];
    $date_ins3 = $_POST['date2'];
    $date_ins4 = $_POST['date3'];
    $date_ins5 = $_POST['date4'];
    $date_ins6 = $_POST['date5'];


    $date_send2  = '';
    $date_send3  = '';
    $date_send4  = '';
    $date_send5  = '';

    $date_send6  = '';

        
    $date = date($date_ins2);
    $time = explode("-", $date);
    $yyyy = $time[0];
    $mm = $time[1];
    $dd = $time[2];

    $dd = (int)$dd - 3;

    echo    $date_send2 = date($yyyy . "-" . $mm . "-" . $dd);

    $date2 = date($date_ins3);
    $time2 = explode("-", $date2);
    $yyyy2 = $time2[0];
    $mm2 = $time2[1];
    $dd2 = $time2[2];

    $dd2 = (int)$dd2 - 3;

    echo    $date_send3 = date($yyyy2 . "-" . $mm2 . "-" . $dd2);


    $date3 = date($date_ins4);
    $time3 = explode("-", $date3);
    $yyyy3 = $time3[0];
    $mm3 = $time3[1];
    $dd3 = $time3[2];

    $dd3 = (int)$dd3 - 3;

    echo    $date_send4 = date($yyyy3 . "-" . $mm3 . "-" . $dd3);


    $date4 = date($date_ins5);
    $time4 = explode("-", $date4);
    $yyyy4 = $time2[0];
    $mm4 = $time4[1];
    $dd4 = $time4[2];

    $dd4 = (int)$dd4 - 3;

    echo    $date_send5 = date($yyyy4 . "-" . $mm4 . "-" . $dd4);


    $date5 = date($date_ins6);
    $time5 = explode("-", $date5);
    $yyyy5 = $time5[0];
    $mm5 = $time5[1];
    $dd5 = $time5[2];

    $dd5 = (int)$dd5 - 3;

    echo    $date_send6 = date($yyyy5 . "-" . $mm5 . "-" . $dd5);

 


    $sql = "INSERT INTO `ins_form`(`ins_type`,`date_create`, `date_start`, `car_license`, `name`, `id_card`, `birth_date`, `address`, `tel`, `tel1`,`address2`, `tel2`, `name_grt`, `relation_grt`, `tel_grt`, `car_type`, `car_insu`, `car_price`, `car_type2`, `car_insu2`, `car_price2`, `total`, `installment_total`) 
    VALUES 
    ('$ins_type','$date_create','$date_start','$car_license','$fullname','$id_card','$birth_date','$address','$tel','$tel3','$address2','$tel2','$name_grt','$relation_grt','$tel_grt','$car_type','$car_insu','$car_price','$car_type2','$car_insu2','$car_price2','$total','$installment')";
    $result = mysqli_query($con, $sql) ;

    $sql_inst = "SELECT form_id FROM ins_form ORDER BY form_id DESC LIMIT 1";
    $result_inst = mysqli_query($con, $sql_inst);
    $row_inst = mysqli_fetch_array($result_inst);


    $form_id = $row_inst['form_id'];
    /* ,'$price_ins7','$date_create','$price_ins8','$date_create','$price_ins9','$date_create','$price_ins10','$date_create' */
    /* , `ins7`, `date7`, `ins8`, `date8`, `ins9`, `date9`, `ins10`, `date10` */
    $sql_insert = "INSERT INTO `installment`(`form_id`, `ins1`, `date1`, `ins2`, `date2`, `date_send2`, `ins3`, `date3`, `date_send3`, `ins4`, `date4`, `date_send4`, `ins5`, `date5`, `date_send5`, `ins6`, `date6`, `date_send6`)
    VALUES ('$form_id','$price_ins1','$date_create','$price_ins2','$date_ins2','$date_send2','$price_ins3','$date_ins3','$date_send3','$price_ins4','$date_ins4','$date_send4','$price_ins5','$date_ins5','$date_send5','$price_ins6','$date_ins6','$date_send6')";
    $result_insert = mysqli_query($con, $sql_insert)  or die(mysqli_error($con));

    $sql_loop = "SELECT * FROM installment ORDER BY inst_id DESC LIMIT 1";
    $result_loop = mysqli_query($con, $sql_loop);
    $row_loop = mysqli_fetch_array($result_loop);



    // Create image instances
    $dest = imagecreatefromjpeg('../form/form1.jpg');



    // Copy and merge

    $text_color = imagecolorallocate($dest, 50, 50, 50);
    $text = 'ใช้ภาษาไทยดู';
    $font = '../THSarabun Bold.ttf';
    $size = 17;

    /* ----------------------------ข้อมูล-------------------------------- */
    imagettftext($dest, $size, 0, 197, 125, $text_color, $font, $date_create2);
    imagettftext($dest, $size, 0, 470, 125, $text_color, $font, $date_start2);
    imagettftext($dest, $size, 0, 800, 125, $text_color, $font, $car_license);
    imagettftext($dest, $size, 0, 500, 178, $text_color, $font, $fullname);
    imagettftext($dest, $size, 0, 440, 1355, $text_color, $font, $fullname);

    imagettftext($dest, $size, 0, 250, 213, $text_color, $font, $id_card);
    imagettftext($dest, $size, 0, 800, 213, $text_color, $font, $birth_date2);
    imagettftext($dest, $size, 0, 250, 250, $text_color, $font, $address);
    imagettftext($dest, $size, 0, 250, 317, $text_color, $font, $tel);
    imagettftext($dest, $size, 0, 350, 317, $text_color, $font, ',' . $tel3);

    imagettftext($dest, $size, 0, 250, 447, $text_color, $font, $address2);
    imagettftext($dest, $size, 0, 250, 512, $text_color, $font, $tel2);
    /* ----------------------------ติดต่อฉุกเฉิน-------------------------------- */
    imagettftext($dest, $size, 0, 237, 594, $text_color, $font, $name_grt);
    imagettftext($dest, $size, 0, 637, 594, $text_color, $font, $relation_grt);
    imagettftext($dest, $size, 0, 900, 594, $text_color, $font, $tel_grt);
    /* -------------------------------ข้อมูลรถ----------------------------- */
    imagettftext($dest, $size, 0, 155, 683, $text_color, $font, $car_type);
    imagettftext($dest, $size, 0, 370, 683, $text_color, $font, $car_insu);
    imagettftext($dest, $size, 0, 790, 683, $text_color, $font, number_format($car_price));

    imagettftext($dest, $size, 0, 155, 719, $text_color, $font, $car_type2);
    imagettftext($dest, $size, 0, 370, 719, $text_color, $font, $car_insu2);
    imagettftext($dest, $size, 0, 790, 719, $text_color, $font, number_format($car_price2));

    /* -------------------------------ข้อมูลผ่อน----------------------------- */
    imagettftext($dest, $size, 0, 428, 784, $text_color, $font, number_format($total));
    imagettftext($dest, $size, 0, 870, 784, $text_color, $font, $installment);

    imagettftext($dest, $size, 0, 428, 840, $text_color, $font, number_format($price_ins1));
    imagettftext($dest, $size, 0, 870, 840, $text_color, $font, $installment2);
    imagettftext($dest, $size, 0, 1240, 1645, $text_color, $font, $form_id);
    /* -------------------------------loop----------------------------- */



    $h = 880;
    for ($i = 2; $i <= $installment; $i++) {

        /*  echo $row_loop['ins'.$i]; */
        /*    echo $row_loop['ins10'];
        if ($row_loop['ins'.$i] == ''){
            
            echo $row_loop['ins'.$i];
        }*/

        $date = $row_loop['date' . $i];

        $date_thai = explode("-", $date);
        $day4 = $date_thai[2];
        $mont4 = $date_thai[1];
        $year4 = $date_thai[0];
        $year4 = (int)($year4 + 543);

        $sqly2 = "SELECT * FROM years";
        $resulty2 = mysqli_query($con, $sqly2);

        foreach ($resulty2 as $value2) {

            if ($value2['year_id'] == $mont4) {

                $mont4 = $value2['year_name'];
            }
        }
        $date = $day4 . ' ' . $mont4 . ' ' . $year4;


        $text1 = 'ชำระงวดที่ ' . $i . ' เป็นจำนวนเงิน';
        imagettftext($dest, $size, 0, 92, $h, $text_color, $font, $text1);
        imagettftext($dest, $size, 0, 428, $h, $text_color, $font, number_format($row_loop['ins' . $i]));
        imagettftext($dest, $size, 0, 577, $h, $text_color, $font, $text2);
        imagettftext($dest, $size, 0, 635, $h, $text_color, $font, $text3);
        imagettftext($dest, $size, 0, 817, $h, $text_color, $font, $date);

        $h = $h + 40;
    }



    /*     imagettftext($dest, $size, 0, 92, 920, $text_color, $font, $text1);
    imagettftext($dest, $size, 0, 428, 920, $text_color, $font, $price_ins3);
    imagettftext($dest, $size, 0, 577, 920, $text_color, $font, $text2);
    imagettftext($dest, $size, 0, 635, 920, $text_color, $font, $text3);
    imagettftext($dest, $size, 0, 817, 920, $text_color, $font, $date_ins3);

    imagettftext($dest, $size, 0, 92, 960, $text_color, $font, $text1);
    imagettftext($dest, $size, 0, 428, 960, $text_color, $font, $price_ins4);
    imagettftext($dest, $size, 0, 577, 960, $text_color, $font, $text2);
    imagettftext($dest, $size, 0, 635, 960, $text_color, $font, $text3);
    imagettftext($dest, $size, 0, 817, 960, $text_color, $font, $date_ins4);

    imagettftext($dest, $size, 0, 92, 1000, $text_color, $font, $text1);
    imagettftext($dest, $size, 0, 428, 1000, $text_color, $font, $price_ins5);
    imagettftext($dest, $size, 0, 577, 1000, $text_color, $font, $text2);
    imagettftext($dest, $size, 0, 635, 1000, $text_color, $font, $text3);
    imagettftext($dest, $size, 0, 817, 1000, $text_color, $font, $date_ins5);

    imagettftext($dest, $size, 0, 92, 1040, $text_color, $font, $text1);
    imagettftext($dest, $size, 0, 428, 1040, $text_color, $font, $price_ins6);
    imagettftext($dest, $size, 0, 577, 1040, $text_color, $font, $text2);
    imagettftext($dest, $size, 0, 635, 1040, $text_color, $font, $text3);
    imagettftext($dest, $size, 0, 817, 1040, $text_color, $font, $date_ins6); */

    function random_char($len)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; //ตัวอักษรที่สามารถสุ่มได้
        $ret_char = "";
        $num = strlen($chars);
        for ($i = 0; $i < $len; $i++) {
            $ret_char .= $chars[rand() % $num];
            $ret_char .= "";
        }
        return $ret_char;
    }
    $random = random_char(5);
    imagepng($dest, '../img/test-form1.png');
    imagepng($dest, '../page/myFile/'.$fullname.$random.'no1.png');
    
    /*  $_SESSION['name'] =   $img_name;
    imagepng($dest, 'img/'.$img_name . '.png'); */


    $dest2 = imagecreatefromjpeg('../form/form2.jpg');



    // Copy and merge



    /* ----------------------------ข้อมูล-------------------------------- */
    imagettftext($dest2, $size, 0, 200, 180, $text_color, $font, $fullname);
    imagettftext($dest2, $size, 0, 950, 180, $text_color, $font, $car_license);
    imagettftext($dest2, $size, 0, 270, 220, $text_color, $font, $car_insu);
    imagettftext($dest2, $size, 0, 480, 1607, $text_color, $font, $fullname);
    imagettftext($dest2, $size, 0, 1240, 1645, $text_color, $font, $form_id);
    imagepng($dest2, '../img/test-form2.png');
    imagepng($dest2, '../page/myFile/'.$fullname.$random.'no2.png');



    $dest3 = imagecreatefromjpeg('../form/form3.jpg');



    // Copy and merge



    /* ----------------------------ข้อมูล-------------------------------- */
    imagettftext($dest3, $size, 0, 370, 428, $text_color, $font, $fullname);
    imagettftext($dest3, $size, 0, 650, 474, $text_color, $font, $car_license);
    imagettftext($dest3, $size, 0, 250, 290, $text_color, $font, $car_insu);
    imagettftext($dest3, $size, 0, 630, 1240, $text_color, $font, $fullname);
    imagettftext($dest3, $size, 0, 1240, 1645, $text_color, $font, $form_id);



    imagepng($dest3, '../img/test-form3.png');
    imagepng($dest3, '../page/myFile/'.$fullname.$random.'no3.png');



    // Create image instances
    $dest4 = imagecreatefromjpeg('../form/form4.jpg');

    $size2 = 40;
    imagettftext($dest4, $size2, 0, 1680, 1905, $text_color, $font, $fullname);
    imagettftext($dest4, $size2, 0, 400, 3000, $text_color, $font, $fullname);
    imagettftext($dest4, $size2, 0, 2400, 3500, $text_color, $font, $form_id);


    imagepng($dest4, '../img/test-form4.png');
    imagepng($dest4, '../img/test-form5.png');
    imagepng($dest4, '../page/myFile/'.$fullname.$random.'no4.png');
    imagepng($dest4, '../page/myFile/'.$fullname.$random.'no5.png');

    $date_zip = date("Y-m-d");
    $zip = new ZipArchive;
    if ($zip->open('../img/' . $fullname . $date_zip . '.zip', ZipArchive::CREATE) === TRUE) {
        // Add files to the zip file
        $zip->addFile('../img/test-form1.png');
        $zip->addFile('../img/test-form2.png');
        $zip->addFile('../img/test-form3.png');
        $zip->addFile('../img/test-form4.png');
        $zip->addFile('../img/test-form5.png');


        // Add random.txt file to zip and rename it to newfile.txt
        /*    $zip->addFile('random.txt', 'newfile.txt'); */

        // Add a file new.txt file to zip using the text specified
        /*  $zip->addFromString('new.txt', 'text to be added to the new.txt file'); */

        // All files are added, so close the zip file.
        $zip->close();
    }



 $date_img = date("Y-m-d h:i:sa");

  for($i = 1 ; $i <= 5 ; $i ++){

    $file_name = $fullname.$random.'no'.$i.'.png';
    $sql_img = "INSERT INTO `file`(`File_Name`, `File_Date`, `form_id`) 
    VALUES ('$file_name','$date_img','$form_id')";
    $result_name = mysqli_query($con,$sql_img);
  }
    header('Location: ../page/generate_form.php?name=' . $fullname . $date_zip);
  
}



if (isset($_POST['sendline'])) {

    $tel1 = $_SESSION['tel'];
    $name_zip = $_GET['name'];

    $sql_line = "SELECT * FROM users_info WHERE tel = '$tel1'";
    $reesult_line = mysqli_query($con, $sql_line);
    $row_line = mysqli_fetch_array($reesult_line);

    $user_id =  $row_line['user_id'];






    for ($i = 1; $i <= 5; $i++) {
        $image = 'test-form' . $i . '.png';

        $access_token = 'ynU0QtbQ0RaavkO7aEfXHYEdAlpU+xzWDtyMgOI5fsQegkB+duJi6HEL1DSBwW6O09MSUsGhASBAiVEt8mhF8WV+M7S+BMJyRKnoTEqtfNDN7de82RC4p+okDUQ4YQYFH7KQsnDVTo+/eEbjQeeRawdB04t89/1O/w1cDnyilFU=';
        $userId = $user_id;

        $messages = array(
            'type' => 'image',
            /*     'originalContentUrl' => 'https://db81-125-27-154-197.ngrok.io/test_pdf/pdf/img/' . $image,
        'previewImageUrl' => 'https://db81-125-27-154-197.ngrok.io/test_pdf/pdf/img/' . $image, */
            'originalContentUrl' => 'https://www.cod-fin.com/pond/img/' . $image,
            'previewImageUrl' => 'https://www.cod-fin.com/pond/img/' . $image,
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

        if ($result) {
            /*  echo " <script type='text/javascript'>alert('Send message success');
window.location.href='../page/report.php'
</script>"; */
        }
    }

    header('Location: ../page/generate_form.php?name=' . $name_zip);
}
