<?php

require('../dbconnect.php');

$sql = "SELECT * FROM data_insurance";
$result = mysqli_query($con, $sql) or die;

$sqlsms = "SELECT * FROM sms_doc";
$resultsms = mysqli_query($con, $sqlsms);
$rowsms = mysqli_fetch_array($resultsms);

$api = $rowsms['api'];
$auth = $rowsms['auth'];

while ($row = mysqli_fetch_array($result)) {

  $insurance = $row['insurance'];
  $phone = $row['phone'];
  $car_license = $row['car_license'];
  $exp = $row['exp'];
  $interest = $row['interest'];
  $date_send = $row['date_send'];
  $time_send = $row['time_send'];
  $status = $row['status_sms'];

  $time = explode(":", $time_send);
  $hr = $time[0];
  $min = $time[1];
  $sec = $time[2];

  
  if ($status == '0') {


    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api-v2.thaibulksms.com/sms",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "msisdn=$phone&message=ทะเบียนรถ:%20$car_license%20ประกันรถยนต์จะหมดอายุวันที่:%20$exp%20เบี้ยต่ออายุ:%20$interest%20บ.%20โปรดติดต่อ:%082-998-5001%20จากดีน่า&sender=Demo&scheduled_delivery=$date_send" . "T" . "$hr%3A$min%3A$sec%2B07%3A00&force=standard",

      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Authorization: Basic ZGYyNjA4OTk5MTcxMmJlNDg2MGQ4YTE0ZGI5ZWJiOWM6OWEwODRjOGEyOGZkYzdjZjRkMjcwZDExYmUzMTZlN2U=",
        "Content-Type: application/x-www-form-urlencoded"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
     
     
    }


   /*  $sql3 = "INSERT INTO renewal_history (name,phone,type)
      VALUES ('$insurance','$phone','sms')";
      
          $result3 = mysqli_query($con, $sql3) or die;
      
          $sql4 = "UPDATE data_insurance
      SET status_sms = '1'
      WHERE phone = $phone ";
      
          $result4 = mysqli_query($con, $sql4) or die; */
  }
}
