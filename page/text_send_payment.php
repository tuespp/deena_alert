<?php
require_once('../dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}
$sql = "SELECT * FROM users_info WHERE id= $id ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$sqlp = "SELECT * FROM user_role  ";
$resultp = mysqli_query($con, $sqlp);


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/switch_insurance.css">
</head>

<body class="hold-transition sidebar-mini">
    <?php require('admin_nav.php') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="text-transform: uppercase">ตั้งค่าส่งข้อความต่ออายุ</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>


        <?php



    


        $sql_txt = "SELECT * FROM text_send_payment";
        $result_txt = mysqli_query($con, $sql_txt);
        $row_txt = mysqli_fetch_array($result_txt);

        ?>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                <div class=" offset-md-3 col-md-6">
                        <!-- general form elements -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">ตัวอย่างข้อความที่แสดง</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->


                            <div class="card-body">
                                <div class="form-group">

                                    <label for="exampleInputEmail1">ตัวอย่าง</label>
                                    <textarea type="text" class="form-control" id="text-exam" readonly  value="" style="height: 10rem;"> </textarea>

                                </div>


                            </div>
                            <!-- /.card-body -->



                        </div>
                        <!-- /.card -->
                        </form>
                    </div>
                    <div class=" offset-md-3 col-md-6">
                        <!-- general form elements -->
                        <div class="card card-warning" >
                            <div class="card-header">
                                <h3 class="card-title">ข้อความแจ้งเตือน</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="../backend/payment_text_send.php" method="POST">

                                <div class="card-body" id="text-sent">
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">หัวข้อ</label>
                                        <input type="text" class="form-control" id="text-1" name="text-1" value="<?php echo $row_txt['text_title']?>" placeholder="ชื่อ - นามสกุล" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ทะเบียนรถ</label>
                                        <input type="phone" class="form-control" id="text-2" name="text-2" value="<?php echo $row_txt['text_license']?>" placeholder="0XX-XXXXXXX" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">หมดอายุประกัน</label>
                                        <input type="text" class="form-control" id="text-3" name="text-3" value="<?php echo $row_txt['text_installment']?>" placeholder="ประเภท" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">เบี้ยต่ออายุ</label>
                                        <input type="text" class="form-control" id="text-4" name="text-4" value="<?php echo $row_txt['text_price']?>" placeholder="ประเภท" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ภายในวันที่</label>
                                        <input type="text" class="form-control" id="text-5" name="text-5" value="<?php echo $row_txt['text_date']?>" placeholder="ประเภท" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ข้อความปิด</label>
                                        <input type="text" class="form-control" id="text-6" name="text-6" value="<?php echo $row_txt['text_close']?>" placeholder="Expiration Date" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn btn-danger d-block m-auto">บันทึก</button>

                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                        </form>
                    </div>


                    
                    
                    <!-- /.content-wrapper -->

                    <!-- Control Sidebar -->
                    <aside class="control-sidebar control-sidebar-dark">
                        <!-- Control sidebar content goes here -->
                        <div class="p-3">
                            <h5>Title</h5>
                            <p>Sidebar content</p>
                        </div>
                    </aside>
                    <!-- /.control-sidebar -->

                    <!-- Main Footer -->
                </div>
                <!-- ./wrapper -->

                <!-- REQUIRED SCRIPTS -->

                <!-- jQuery -->
                <script src="../js/jquery.min.js"></script>
                <!-- Bootstrap 4 -->
                <script src="../js/bootstrap.bundle.min.js"></script>
                <!-- AdminLTE App -->
                <script src="../js/adminlte.min.js"></script>

                <script src="../js/jquery.dataTables.min.js"></script>
                <script src="../js/dataTables.bootstrap4.min.js"></script>
                <script src="../js/dataTables.responsive.min.js"></script>
                <script src="../js/responsive.bootstrap4.min.js"></script>
                <script src="../js/dataTables.buttons.min.js"></script>
                <script src="../js/buttons.bootstrap4.min.js"></script>
                <script src="../js/jszip/jszip.min.js"></script>
                <script src="../js/pdfmake.min.js"></script>
                <script src="../js/vfs_fonts.js"></script>
                <script src="../js/buttons.html5.min.js"></script>
                <script src="../js/buttons.print.min.js"></script>
                <script src="../js/buttons.colVis.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                   

                    $(document).ready(function() {
                        $('#text-1').emojioneArea({
                            pickerPosition: "right"
                        });
                        $('#text-2').emojioneArea({
                            pickerPosition: "right"
                        });
                        $('#text-3').emojioneArea({
                            pickerPosition: "right"
                        });
                        $('#text-4').emojioneArea({
                            pickerPosition: "right"
                        });
                        $('#text-5').emojioneArea({
                            pickerPosition: "right"
                        });
                        $('#text-6').emojioneArea({
                            pickerPosition: "right"
                        });
                    });

                    
                    var text1 =  $('#text-1').val();
                       var text2 =  $('#text-2').val();
                       var text3 =  $('#text-3').val();
                       var text4 =  $('#text-4').val();
                       var text5 =  $('#text-5').val();
                       var text6 =  $('#text-6').val();

                       $('#text-exam').val(
                            
                        text1+'\n'
                            +text2+' '+'18 มค สุพรรณบุรี' +'\n'
                            +text3+' '+'3' +'\n'
                            +text4+' '+'3500 บาท' +'\n'
                            +text5+' '+'2022-18-01' +'\n'
                            +text6);

                  
                    
                   
                    $('#text-sent').change(function() {

                       var text1 =  $('#text-1').val();


                       
                       var text2 =  $('#text-2').val();
                       var text3 =  $('#text-3').val();
                       var text4 =  $('#text-4').val();
                       var text5 =  $('#text-5').val();
                       var text6 =  $('#text-6').val();



                        $('#text-exam').val(
                            
                            text1+'\n'
                            +text2+' '+'18 มค สุพรรณบุรี' +'\n'
                            +text3+' '+'3' +'\n'
                            +text4+' '+'3500 บาท' +'\n'
                            +text5+' '+'2022-18-01' +'\n'
                            +text6);

                    });
                </script>
</body>

</html>