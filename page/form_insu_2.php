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


$sqlt = "SELECT * FROM ins_type";
$resultt = mysqli_query($con, $sqlt);
$resultt2 = mysqli_query($con, $sqlt);

$sqlc = "SELECT * FROM ins_company";
$resultc = mysqli_query($con, $sqlc);
$resultc2 = mysqli_query($con, $sqlc);








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

    <style>
        .red {
            color: red;
        }
    </style>

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
                        <h1 style="text-transform: uppercase">ขอสินเชื่อเบี้ยประกัน รูปแบบที่ 2</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="offset-md-2 col-md-8">
                    <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">รายละเอียด</h3>
                            </div>
                            <label for="" class="mt-3 ml-3">รูปแบบที่ 2 คือ กำหนดงวดแรกเป็น % งวดที่เหลือกำหนดเป็น % แต่ละงวด </label>
                    </div>
                        <!-- general form elements -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">ข้อมูลขอสินเชื่อ</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form action="../backend/form_insu_gen.php"  method="POST">
                                <div class="card-body">


                                    <div class="form-group ">
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">วันที่เขียน <span class="red">*</span></label>
                                                    <input type="date" name="date_create" placeholder="วันที่เขียน" class="form-control" value="" required>
                                                    <input type="hidden" name="ins_type" placeholder="วันที่เขียน" class="form-control" value="แบบที่ 2" >

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">วันที่คุ้มครอง <span class="red">*</span> </label>
                                                    <input type="date" name="date_start" placeholder="วันที่คุ้มครอง" class="form-control" value="" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">ทะเบียนรถยนต์ <span class="red">*</span></label>
                                                    <input type="text" name="car_license" placeholder="ทะเบียนรถยนต์" class="form-control" value="" required>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ชื่อ - นามสกุล <span class="red">*</span></label>

                                        <div class="col-md-12">
                                            <input type="text" name="fullname" placeholder="ชื่อ-สกุล" class="form-control" value="" required>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1">บัตรประชาชน <span class="red">*</span></label>

                                                <input type="text" name="id_card" placeholder="บัตรประชาชน" class="form-control" value="" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1">วันเกิด <span class="red">*</span></label>

                                                <input type="date" name="birth_date" placeholder="วัน/เดือน/ปี เกิด" class="form-control" value="" required>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ที่อยู่ <span class="red">*</span></label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <textarea type="text" name="address" placeholder="ที่อยู่" class="form-control" value="" required></textarea>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputPassword1">โทรศัพท์ <span class="red">*</span></label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <input type="tel" name="tel" maxlength="10" placeholder="เบอร์โทร " class="form-control" value="" required>
                                               

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">โทรศัพท์ สำรอง</label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <input type="tel" name="tel3" maxlength="10" placeholder="เบอร์โทร " class="form-control" value="" >
                                               

                                            </div>

                                        </div>
                                    </div>
                                    <label class="mt-3" for="exampleInputPassword1">ที่อยู่อื่น </label>

                                    <div class="form-group mt-3">
                                        <label for="exampleInputPassword1">ที่อยู่</label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <textarea type="text" name="address2" placeholder="ที่อยู่" class="form-control" value=""></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">โทรศัพท์</label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <input type="phone" name="tel2" maxlength="10" placeholder="เบอร์โทร" class="form-control" value="">
                                            </div>

                                        </div>
                                    </div>

                                    <label class="mt-3" for="exampleInputPassword1">บุคคลติดต่อกรณีฉุกเฉิน</label>
                                    <div class="form-group mt-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="exampleInputPassword1">ชื่อ - นามสกุล</label>

                                                <input type="text" name="name_grt" placeholder="ชื่อ-สกุล" class="form-control" value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="exampleInputPassword1">ความสัมพันธ์</label>

                                                <input type="text" name="relation_grt" placeholder="ความสัมพันธ์" class="form-control" value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="exampleInputPassword1">โทรศัพท์</label>

                                                <input type="text" name="tel_grt" placeholder="โทรศัพท์" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <div id="divv">

                                        <label class="mt-3" for="exampleInputPassword1">ผลิดภัณฑ์ประกันรถยนต์ที่ขอผ่อน <span class="red">*</span> </label>
                                        <div class="form-group mt-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select name="car_type" class="custom-select" id="car_type" required>
                                                        <option value="" class="text-center" selected disabled>กรุณาเลือกประเภท</option>
                                                        <?php while ($row = mysqli_fetch_array($resultt)) { ?>
                                                            <option value="<?php echo $row['type_name'] ?>" class="text-center"> <?php echo $row['type_name'] ?>


                                                            </option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="car_insu" class="custom-select" id="car_type" required>
                                                        <option value="" class="text-center" selected disabled>กรุณาเลือกประเภท</option>
                                                        <?php while ($row = mysqli_fetch_array($resultc)) { ?>
                                                            <option value="<?php echo $row['comp_name'] ?>" class="text-center"> <?php echo $row['comp_name'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="car_price" id="ins_price" placeholder="จำนวน" class="form-control" value="" required>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4">

                                                    <select name="car_type2" class="custom-select" id="car_type" required>
                                                        <option value="" class="text-center" selected disabled>กรุณาเลือกประเภท</option>
                                                        <?php while ($row = mysqli_fetch_array($resultt2)) { ?>
                                                            <option value="<?php echo $row['type_name'] ?>" class="text-center"> <?php echo $row['type_name'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="car_insu2" class="custom-select" id="car_type" required>
                                                        <option class="text-center" value="" selected disabled>กรุณาเลือกประเภท</option>
                                                        <?php while ($row = mysqli_fetch_array($resultc2)) { ?>
                                                            <option value="<?php echo $row['comp_name'] ?>" class="text-center"> <?php echo $row['comp_name'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="car_price2" id="ins_price2" placeholder="จำนวน" class="form-control" value="" required>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <label class="mt-3" for="exampleInputPassword1">ผ่อนชำระ</label>
                                            <div class="form-group mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="mt-3" for="exampleInputPassword1">รวมจำนวนเงินค่าเบี้ยประกันภัยที่ขอผ่อน <span class="red">*</span></label>

                                                        <div class="input-group mb-2">

                                                            <input type="text" name="total" id="price" placeholder="จำนวนเงิน" class="form-control" value="" required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">บาท</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> <label class="mt-3" for="exampleInputPassword1">ขอผ่อนชำระทั้งหมด <span class="red">*</span></label>

                                                        <div class="input-group mb-2">
                                                            <input type="text" name="installment" id="installment" placeholder="งวด" class="form-control" value="" required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">งวด</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="col-md-4 ">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระงวดแรกเป็นเปอร์เซ็น <span class="red">*</span></label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="percent" id="percent" placeholder="จำนวนเปอร์เซ็น" class="form-control" value="" required>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 "> <label class="mt-3" for="exampleInputPassword1">ชำระงวดแรกเป็นเงิน <span class="red">*</span></label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins1" id="ins1" placeholder="จำนวนเงิน" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 "> <label class="mt-3" for="exampleInputPassword1">คงเหลืองวดที่ต้องชำระ<span class="red">*</span></label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="installment2" id="installment2" placeholder="งวดที่เหลือ" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">งวด</div>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="col-md-4 mt-2 ">
                                                    <label class="mt-3" for="exampleInputPassword1">คิดเป็นเปอร์เซ็น<span class="red">*</span></label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="percent2" id="percent2" placeholder="จำนวนเปอร์เซ็น" class="form-control" value="" >
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระงวดที่ 2 เป็นจำนวนเงิน</label>
                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins2" id="ins2" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระไม่เกินวันที่</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date1" id="date1" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">วันที่</div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-4 mt-2 ">
                                                    <label class="mt-3" for="exampleInputPassword1">คิดเป็นเปอร์เซ็น</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="percent3" id="percent3" placeholder="จำนวนเปอร์เซ็น" class="form-control" value="" >
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระงวดที่ 3 เป็นจำนวนเงิน</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins3" id="ins3" placeholder="installment 3" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระไม่เกินวันที่</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date2" id="date2" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">วันที่</div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-4 mt-2 ">
                                                    <label class="mt-3" for="exampleInputPassword1">คิดเป็นเปอร์เซ็น</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="percent4" id="percent4" placeholder="จำนวนเปอร์เซ็น" class="form-control" value="" >
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระงวดที่ 4 เป็นจำนวนเงิน</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins4" id="ins4" placeholder="installment 4" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระไม่เกินวันที่</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date3" id="date3" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">วันที่</div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-4 mt-2 ">
                                                    <label class="mt-3" for="exampleInputPassword1">คิดเป็นเปอร์เซ็น</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="percent5" id="percent5" placeholder="จำนวนเปอร์เซ็น" class="form-control" value="" >
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระงวดที่ 5 เป็นจำนวนเงิน</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins5" id="ins5" placeholder="installment 5" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระไม่เกินวันที่</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date4" id="date4" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">วันที่</div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-md-4 mt-2 ">
                                                    <label class="mt-3" for="exampleInputPassword1">คิดเป็นเปอร์เซ็น</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="percent6" id="percent6" placeholder="จำนวนเปอร์เซ็น" class="form-control" value="" >
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระงวดที่ 6 เป็นจำนวนเงิน</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins6" id="ins6" placeholder="installment 6" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">บาท</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">ชำระไม่เกินวันที่</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date5" id="date5" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">วันที่</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-danger d-block m-auto">บันทึก</button>
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

                <script>
                    function updateTextView(_obj) {
                        var num = getNumber(_obj.val());
                        if (num == 0) {
                            _obj.val('');
                        } else {
                            _obj.val(num.toLocaleString());
                        }
                    }

                    function getNumber(_str) {
                        var arr = _str.split('');
                        var out = new Array();
                        for (var cnt = 0; cnt < arr.length; cnt++) {
                            if (isNaN(arr[cnt]) == false) {
                                out.push(arr[cnt]);
                            }
                        }
                        return Number(out.join(''));
                    }
                    $(document).ready(function() {
                        $('#interest').on('keyup', function() {
                            updateTextView($(this));
                        });
                    });
                </script>

                <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                <script>
                    $('#installment').change(function() {
                        $('#ins2').val('');
                        $('#ins3').val('');
                        $('#ins4').val('');
                        $('#ins5').val('');
                        $('#ins6').val('');


                    });

                    $('#divv').change(function() {

                        var ins_price = $('#ins_price').val();
                        var ins_price2 = $('#ins_price2').val();

                        var price = Number(ins_price) + Number(ins_price2);

                        $('#price').val(price.toFixed(0));
                        var installment = $('#installment').val();

                        var percent = $('#percent').val();
                        var ins1 = (price * (percent / 100));

                        var allins = (price - ins1) / (installment - 1);
                        var installment2 = installment - 1;

                        $('#installment2').val(installment2);
                        $('#ins1').val(ins1.toFixed(0));


                        var percent2 = $('#percent2').val();
                        var ins2 = (price * (percent2 / 100));
                        $('#ins2').val(ins2.toFixed(0));

                        var percent3 = $('#percent3').val();
                        var ins3 = (price * (percent3 / 100));
                        $('#ins3').val(ins3.toFixed(0));

                        var percent4 = $('#percent4').val();
                        var ins4 = (price * (percent4 / 100));
                        $('#ins4').val(ins4.toFixed(0));

                        var percent5 = $('#percent5').val();
                        var ins5 = (price * (percent5 / 100));
                        $('#ins5').val(ins5.toFixed(0));

                         var percent6 = $('#percent6').val();
                        var ins6 = (price * (percent6 / 100));
                        $('#ins6').val(ins6.toFixed(0));

                       /*  var i = '';

                        for (i = 1; i <= installment2; i++) {

                            $('#ins' + (i + 1)).val(allins.toFixed(0));

                        } */

                    });


                    $('#date1').change(function() {

                        $('#date2').val('');
                        $('#date3').val('');
                        $('#date4').val('');
                        $('#date5').val('');

                        var installment = $('#installment').val();
                        var installment2 = installment - 1;
                        var date1 = $(this).val();

                        /* $('#date2').val(date1); */




                        var y = 1;

                        for (var i = 1; i < installment2; i++) {


                            var today = new Date(date1);
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + (1 + i)).padStart(2, '0'); //January is 0!
                            var yyyy = today.getFullYear();



                            today = yyyy + '-' + mm + '-' + dd;


                            if (mm == '02' && dd >= 29) {



                                today_new2 = yyyy + '-' + mm + '-' + 28;
                                $('#date' + (1 + i)).val(today_new2);
                                console.log(today_new2);


                            } else {


                                $('#date' + (1 + i)).val(today);

                            }




                            if (mm >= 13) {

                                yyyy = yyyy + 1;



                                var today2 = new Date("2021-01-02");


                                var mm2 = String(today2.getMonth() + (0 + y)).padStart(2, '0'); //January is 0!


                                today_new = yyyy + '-' + mm2 + '-' + dd;

                                if (mm2 == '02' && dd >= 29) {
                                    today_new3 = yyyy + '-' + mm2 + '-' + 28;
                                    $('#date' + (1 + i)).val(today_new3);


                                } else {
                                    $('#date' + (1 + i)).val(today_new);
                                }


                                /*  $('#date' + (1 + i)).val(today_new);
                                 */
                                y = y + 1;





                            } else {
                                /* $('#date' + (1 + i)).val(today); */
                            }


                        }
          


                    });
                </script>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script>
</body>

</html>