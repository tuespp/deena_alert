<?php
    $ranRefNo = '000020220106'.rand(100,999);

    $host_ngrok = 'https://a3c4-182-52-167-177.ngrok.io';

    $path_line = $host_ngrok.'/DEENA/project/page/';
    $host = $host_ngrok.'/deena/project';
    $testUrlAPI = 'https://api.globalprimepay.com/';
    $customerID = 'ltq+q70aqxiAaMYMjwhn4wBwLiMCTz2YSPfyNK5YGtaYtKXGjhcpbFTDhmEhA3F2MLSkjqp/ZAs+u4jeCdesCP8rNIr+vOoqtD/p74Pu3el5yIXFzUuucFQZm+M9AWV8/CbaiyWsI6VzVqsCZQ2hQ68b1WU=';
    $secret_key = "UKrMkNMg8jY7ZovzN8MIqvpXpZgRSzDn";
    $public_key = "3QpUB0bwqOczd1ynkEdefyq7rEA72QWD";
    $resUrl = $host."/response.php";
    $backUrl = $host."/response.php";
    /* $path_line = $host_ngrok.'/deena/project/page/'; */
