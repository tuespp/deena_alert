

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://thsms.com/api/send-sms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "sender": "Noted",
    "msisdn": ["0624316866"],
    "message": "Hello World",
    "scheduled_delivery": "2022-01-18T04:45:00"
}',
  CURLOPT_HTTPHEADER => [
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC90aHNtcy5jb21cL2FwaS1rZXkiLCJpYXQiOjE2NDIzODc2MDIsIm5iZiI6MTY0MjM4NzYwMiwianRpIjoiUUtUZmlRS1ZUbjVXZGlKQiIsInN1YiI6MTAxNzE0LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.lgB1r3kR7W5UDIDYe6yjennXoMZjZ0LwcKdJ6pxGzKU',
    'Content-Type: application/json'
  ],
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;