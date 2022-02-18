
 <?php

require('../dbconnect.php');
@ini_set('display_errors', '0');

$line_id = unserialize($_POST['line_id']);






$report_type_id = $_POST['report_type_id'];

$text = $_POST['text'];
/*  print_r ($text); */
$oa_id = $_POST['oa_id'];
/* $lengt_arr =  count($text); */

/* $text = array('1','2'); */



/* array_push($text,$file); */


/* if (strpos($new_name, '.png') !== false) {
    echo 'true';
} */



$sql_line = "SELECT * FROM line_doc WHERE oa_id = '$oa_id' ";
$result_line = mysqli_query($con, $sql_line);
$row_line = mysqli_fetch_array($result_line);

$access =$row_line['access_token'];


    
    foreach ($line_id as $user_id) {

       /*  for($i = 0; $i < $lengt_arr; $i++){ */

        $access_token = $access;
          $userId = $id; 
          
         $messages = array(
            'type' => 'text',
            'text' => $text,
           
            
        );
        $post = json_encode(array(
            'to' => array($user_id),
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
    if ($result) {

    

        echo "<script>window.close();</script>";
       
    } 
    $sql_ins = "INSERT INTO `text_report`(`report_type_id`,`report_text`) VALUES ('$report_type_id','$text')";
    $result_ins = mysqli_query($con, $sql_ins);

