
 <?php

require('../dbconnect.php');
@ini_set('display_errors', '0');

$status = $_POST['status'];
$sub_status = $_POST['sub_status'];

$text = $_POST['text'];
$access = $_POST['oa_id'];

$sql_line = "SELECT * FROM line_doc WHERE access_token = '$access' ";
$result_line = mysqli_query($con, $sql_line);
$row_line = mysqli_fetch_array($result_line);

$oa_id =$row_line['oa_id'];

if ($sub_status == ""){

    $sql = "SELECT * FROM users_info WHERE status = '$status' AND oa_id = '$oa_id'";
    $result = mysqli_query($con, $sql);
    
    
    while ($row = mysqli_fetch_array($result)) {
    
        $id[] = $row['user_id'];
    
        $all_id = $id;
    };

  
    
    foreach ($all_id as $user_id) {
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
        echo " <script type='text/javascript'>alert('Send message success');
    window.location.href='../page/report.php'
    </script>";
    } 

}else{

    $sql = "SELECT * FROM users_info WHERE sub_status = '$sub_status' AND oa_id = '$oa_id'";
    $result = mysqli_query($con, $sql);
    
    
    while ($row = mysqli_fetch_array($result)) {
    
        $id[] = $row['user_id'];
    
        $all_id = $id;
    };

   
    foreach ($all_id as $user_id) {
        $access_token = 'ynU0QtbQ0RaavkO7aEfXHYEdAlpU+xzWDtyMgOI5fsQegkB+duJi6HEL1DSBwW6O09MSUsGhASBAiVEt8mhF8WV+M7S+BMJyRKnoTEqtfNDN7de82RC4p+okDUQ4YQYFH7KQsnDVTo+/eEbjQeeRawdB04t89/1O/w1cDnyilFU=';
          $userId = $user_id; 
    
         $messages = array(
            'type' => 'text',
            'text' => $text,

           
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
    if ($result) {
        echo " <script type='text/javascript'>alert('Send message success');
    window.location.href='../page/report.php'
    </script>";
    } 
}

?> 