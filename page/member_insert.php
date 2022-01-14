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
            <h1 style="text-transform: uppercase">เพื่มสมาชิก</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <?php


    $sql = "SELECT * FROM status";
    $result = mysqli_query($con, $sql);


    ?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <div class="row">
          <div class="offset-3 col-md-6">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">เพื่มสมาชิก</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="../backend/member_insert_data.php" method="POST">
                <div class="card-body">
                  <div class="form-group">

                    <label for="exampleInputEmail1">username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="" placeholder="username" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="" placeholder="password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ชื่อ - นามสกุล</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="" placeholder="ชื่อ - นามสกุล" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">โทรศัพท์</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="tel" value="" placeholder="0XX-XXXXXXX" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">อีเมล</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="" placeholder="XXXX@gmail.com" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ที่อยู่</label>
                    <textarea type="text" class="form-control" id="exampleInputPassword1" name="address" value="" placeholder="ที่อยู่" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>ประเภท</label>
                    <select class="custom-select" name="status" id="main_status">
                      <option class="text-center" selected disabled> ------- Select Status -------</option>
                      <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?php echo $row['id'] ?>" class="text-center"> <?php echo $row['status_name'] ?></option>
                      <?php  } ?>
                    </select>


                    <label>ประเภทย่อย</label>
                    <select class="custom-select" name="sub_status" id="sub_status">
                      <option class="text-center">------- Select status -------</option>
                    </select>
                    <div id="detail" style="display: none;" class="text-right">
                    </div>
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

        <script>
          $(function() {
            $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });

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


          $('#main_status').change(function() {



                var id = $(this).val();
                $.ajax({
                  type: "post",
                  url: "../backend/select_status.php",
                  data: {
                    status_id: id
                  },

                  success: function(data) {

                    $('#sub_status').html(data);

                  }
                }); 
              
              });
        </script>
</body>

</html>