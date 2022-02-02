<?php

require_once('../dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}


/* ---------------------------------------------- อัพเอกสาร ---------------------------------
 */

if (isset($_POST['submit']) == 1) {//เพิ่มไฟล์สำหรับหน้าเอกสาร

  $id = $_POST['ids'];
  $date = $_POST['date'];
  date_default_timezone_set('Asia/Bangkok');
  $nameDate = date('Ymd'); //เก็บวันที่
  $path = "myFile/"; //สร้างไฟล์สำหรับเก็บไฟล์ใหม่

  date_default_timezone_set('Asia/Bangkok');
  $numrand = (mt_rand(1000, 9999));

  if ($_FILES["file"]["name"][0] == "") {
    echo "<script type='text/javascript'>";
    echo "alert('กรุณาเลือกเพิ่มไฟล์');";
    echo "window.location = 'credit_insurance.php';";
    echo "</script>";
  } else {
    for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {
      if ($_FILES["file"]["name"][$i] != "") {
        $file[$i] = $_FILES["file"]["name"][$i];
        $files[$i] = pathinfo($file[$i], PATHINFO_FILENAME);

        $type[$i] = strrchr($_FILES['file']['name'][$i], "."); //ตัดชื่อไฟล์เหลือแต่นามสกุล
        $newname[$i] = $nameDate . $numrand. $files[$i] . $type[$i]; //ประกอบเป็นชื่อใหม่
        $path_copy[$i] = $path . $newname[$i]; //กำหนด path ในการเก็บ
        move_uploaded_file($_FILES['file']['tmp_name'][$i], $path_copy[$i]);
        $sql = "INSERT INTO file (File_Name,File_Date,form_id) 
                     VALUES ('$newname[$i]','$date','$id' )";
        $insert = mysqli_query($con, $sql);
      }
    }

    if ($insert) {

      echo "<script type='text/javascript'>";
      echo "alert('เพิ่มข้อมูลสำเร็จ');";
      echo "window.location = 'credit_insurance.php';";
      echo "</script>";
    } else {
      echo "มีบางอย่างผิดพลาด!! กรุณาลองใหม่อีกครั้ง";
    }
  }
}


/* ----------------------------------- ดาวน์โหลด -----------------------------------
 */



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Insert</title>

  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2f85583488.js" crossorigin="anonymous"></script>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="dist/css/myCSS.css" type="text/css">
  <script src="dist/css/myCSS.css"></script>


  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
</head>




<?php if (isset($_GET['id'])) { //หน้าเพิ่มไฟล์ สำหรับหน้าเอกสาร
  $ids = $_GET["id"]; ?>
  <div class="content-wrapper">
    <div style="margin-left:10%; padding-top :2%;">
      <div class="container my-8">
        <h2>เพิ่มไฟล์</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" name="ids" value="<?php echo $ids ?>" hidden>
              <input hidden name="date" type="datetime" value=<?php date_default_timezone_set("Asia/Bangkok");
                                                              echo date("Y-m-d\TH:i:s"); ?>>
              <input name="btnCreate" type="button" class="btn btn-sm btn-success" value="เพิ่มไฟล์" onClick="JavaScript:fncCreateElement();">
              <input name="btnDelete" type="button" class="btn btn-sm btn-danger" value="ลบไฟล์" onClick="JavaScript:fncDeleteElement();"><br><br>
              <input name="hdnLine" id="hdnLine" type="hidden" value=0>

              <div class="card">
                <div class="card-body ">
                  <div id="mySpan" name="mySpan">(ไฟล์ต่างๆ) <br>
                  </div>
                  <script language="javascript">
                    function fncCreateElement() {

                      var mySpan = document.getElementById('mySpan');
                      var myLine = document.getElementById('hdnLine');
                      myLine.value++;

                      var myElement4 = document.createElement('br');
                      myElement4.setAttribute('name', "br" + myLine.value);
                      myElement4.setAttribute('id', "br" + myLine.value);
                      mySpan.appendChild(myElement4);

                      var div = document.createElement('div');
                      div.id = 'div' + myLine.value;
                      div.className = 'card-body bg-light';
                      div.innerHTML = 'ไฟล์ที่ ' + myLine.value;



                      var myElement4 = document.createElement('br');
                      myElement4.setAttribute('name', "br" + myLine.value);
                      myElement4.setAttribute('id', "br" + myLine.value);
                      div.appendChild(myElement4);

                      var myElement2 = document.createElement('input');
                      myElement2.setAttribute('type', "file");
                      myElement2.setAttribute('name', "file[]");
                      myElement2.setAttribute('id', "file" + myLine.value);
                      myElement2.setAttribute('required', 'true');
                      div.appendChild(myElement2);

                      var myElement4 = document.createElement('br');
                      myElement4.setAttribute('name', "br" + myLine.value);
                      myElement4.setAttribute('id', "br" + myLine.value);
                      div.appendChild(myElement4);

                      mySpan.appendChild(div);


                    }

                    function fncDeleteElement() {

                      var mySpan = document.getElementById('mySpan');
                      var myLine = document.getElementById('hdnLine');

                      var deleteSpan = document.getElementById('div' + myLine.value);
                      mySpan.removeChild(deleteSpan);

                      var deleteBr = document.getElementById("br" + myLine.value);
                      mySpan.removeChild(deleteBr);
                      // var deleteFile = document.getElementById("file" + myLine.value);
                      // mySpan.removeChild(deleteFile);
                      // var deleteBr = document.getElementById("br" + myLine.value);
                      // mySpan.removeChild(deleteBr);


                      myLine.value--;

                    }
                  </script>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="ยืนยัน"> &nbsp;&nbsp;
                <input type="reset" class="btn btn-info" value="รีเซ็ตข้อมูล" onclick="window.location.reload();"> &nbsp;&nbsp;
                <input type=button class="btn btn-danger" onclick="window.location='page_report.php'" value=ยกเลิก>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>


<?php } ?>



</body>

</html>