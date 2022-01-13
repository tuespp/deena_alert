<?php


require_once('../dbconnect.php');
// echo $_GET['id'];
// วิธีเชื่อมดาต้า
try {
    $DB_HOST = 'localhost';
    $DB_NAME = 'deena-project';
    $DB_USER = 'root';
    $DB_PASS = '12345678';
    //ประกาศ connect
    $conn = new PDO(
        "mysql:host={$DB_HOST};
        dbname={$DB_NAME};
        charset=utf8",
        $DB_USER,
        $DB_PASS
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
    echo $th->getMessage();
    exit();
}
//ดึง id
$param = [
    $_GET['id']
];
$stmt = $conn->prepare('SELECT * FROM table_p WHERE p_id = ?');
$stmt->execute($param);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$name = $result[0]['p_name'];
$image = $result[0]['p_image'];
$detail =  $result[0]['p_detail'];
$price = $result[0]['p_price'];
//นำข้อมูลใส่ในดาต้า table custom_p
$sql_2 = "INSERT INTO custom_p(p_name, p_image, p_detail, p_price) 
                VALUES ('$name','$image','$detail','$price')";
//แจ้งนำข้อมูลเข้า table custom_p
$result_2 = mysqli_query($con, $sql_2);
if ($result_2) {
    header("Location: ../page/compare.php");
} else {
    echo 'นำเข้าข้อมูลไม่สำเร็จ';
    exit();
}
?>