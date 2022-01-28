<?php

require('../dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
  header('Location:login.php');
}
$sql = "SELECT * FROM users_info WHERE id= $id ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


$sqlp = "SELECT * FROM user_role ";
$resultp = mysqli_query($con, $sqlp);



$sql_num = "SELECT COUNT(id) FROM users_info WHERE level = 'member'";
$result_num = mysqli_query($con, $sql_num);
$row_num = mysqli_fetch_array($result_num);

$sql_num2 = "SELECT COUNT(id) FROM users_info WHERE level = 'employee'";
$result_num2 = mysqli_query($con, $sql_num2);
$row_num2 = mysqli_fetch_array($result_num2);


$sql_num3 = "SELECT COUNT(id) FROM users_info WHERE level = 'admin'";
$result_num3 = mysqli_query($con, $sql_num3);
$row_num3 = mysqli_fetch_array($result_num3);

$sql_num4 = "SELECT COUNT(form_id) FROM ins_form ";
$result_num4 = mysqli_query($con, $sql_num4);
$row_num4 = mysqli_fetch_array($result_num4);


$sql_num5 = "SELECT COUNT(id) FROM data_insurance ";
$result_num5 = mysqli_query($con, $sql_num5);
$row_num5 = mysqli_fetch_array($result_num5);


$sql_num6 = "SELECT COUNT(id) FROM payment ";
$result_num6 = mysqli_query($con, $sql_num6);
$row_num6 = mysqli_fetch_array($result_num6);
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
            <h1 style="text-transform: uppercase"><?php /* echo $row['level']; */ ?>Dashboard</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <hr>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">



        <!-- Timelime example  -->
        <div class="row">

          <div class=" col-12">
            <h2> ผู้ใช้ </h2>
            <br>
          </div>


          <div class="row offset-1 col-10">
          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h2>ลูกค้า</h2>

                <h3><?php echo $row_num['COUNT(id)']  ?></h3>


              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h2>พนักงาน</h2>
                <h3><?php echo $row_num2['COUNT(id)']  ?></h3>


              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h2>ผู้ดูแล</h2>

                <h3><?php echo $row_num3['COUNT(id)']  ?></h3>

              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div>
          <!-- -------------------------------------------------------------------------------------------------------------------------------->

          <div class=" col-12">
            <h2> รายงาน </h2>
            <br>
          </div>


          <div class="row offset-1 col-10">
            <div class=" col-4">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h2>ขอสินเชื่อประกันภัย</h2>

                  <h3><?php echo $row_num4['COUNT(form_id)']  ?></h3>


                </div>
                <div class="icon">
                  <i class="fas fa-car-crash"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-4">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h2>แจ้งชำระ</h2>
                  <h3><?php echo $row_num5['COUNT(id)']  ?></h3>


                </div>
                <div class="icon">
                  <i class="fas fa-bell"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-4">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h2>แจ้งต่ออายุ</h2>

                  <h3><?php echo $row_num6['COUNT(id)']  ?></h3>

                </div>
                <div class="icon">
                  <i class="fas fa-bell"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
          <!-- -------------------------------------------------------------------------------------------------------------------------------->


          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
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






</body>

</html>