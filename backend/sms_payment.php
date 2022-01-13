<?php

require('../dbconnect.php');

$sql = "SELECT * FROM payment";
$result = mysqli_query($con, $sql) or die;




while ($row = mysqli_fetch_array($result)) {

  $insurance = $row['insurance'];
  $phone = $row['phone'];
  $car_license = $row['car_license'];
  $installment_no = $row['installment_no'];
  $installment = $row['installment'];
  $date_send = $row['date_send'];
  $time_send = $row['time_send'];
  $status = $row['status_sms'];

  $time = explode(":", $time_send);
  $hr = $time[0];
  $min = $time[1];
  $sec = $time[2];


  if ($status == '0'){

  $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-v2.thaibulksms.com/sms",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "msisdn=$phone"."&message=ทะเบียนรถ:%20$car_license%20โปรดชำระค่าเบี้ยประกันงงวดที่:%20$installment_no%20จำนวน:%20$installment%20บ.%20ภายในวันที่:%202021-12-31"."&sender=Demo"."&scheduled_delivery=$date_send"."T"."$hr%3A$min%3A$sec%2B07%3A00"."&force=standard",

  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Basic MDJmZGQ3MTYzNThiMzk3ZDgyMzcxYWI3ZmIzMTA2ZDM6NWVlNDE5ODBjMTJiMDEyNWI5MjFjYTRiNTNhZmYwMDI=",
    "Content-Type: application/x-www-form-urlencoded"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 
}
 
 
  $sql3 = "INSERT INTO payment_history (name,phone,type)
  VALUES ('$insurance','$phone','sms')";

  $result3 = mysqli_query($con, $sql3) or die;

  $sql4 = "UPDATE payment
SET status_sms = '1'
WHERE phone = $phone ";

  $result4 = mysqli_query($con, $sql4) or die;

}
}
