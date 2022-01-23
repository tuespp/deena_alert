
<?php

require('../dbconnect.php');

$ids = $_POST['ids'];
$name = $_POST['name'];

$x = "";

$temp = explode('.', $_FILES['file']['name']);
$new_name = round(microtime(true) * 9999) . '.' . end($temp);
$url = '../img/' . $new_name;

if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {

    $sql2 = "UPDATE form
                SET form_name = '$name', form_img= '$new_name'
                 WHERE form_id = '$ids' ";
    $result2 = mysqli_query($con, $sql2);

    if ($result2) {

        echo '<script> window.location.href = "../page/upload_form.php";alert("Update success") </script>';
    }

    echo 'tes';
} else {



    $sql = "UPDATE form
                SET form_name = '$name'
                 WHERE form_id = '$ids' ";
    $result = mysqli_query($con, $sql);

    if ($result) {

        echo '<script> window.location.href = "../page/upload_form.php";alert("Update success") </script>';
    }
}

?>