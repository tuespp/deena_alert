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

<body>





  <?php
  $oa_id = $_POST['oa_id'];


  $sql = "SELECT * FROM line_doc WHERE oa_id = $oa_id ";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

  ?>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->

          <!-- /.card-header -->
          <!-- form start -->

          <form action="../backend/update_line_api.php" method="POST">
            <div class="card-body">
              <div class="form-group">

                <label for="exampleInputEmail1">Line Official</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $row['name']; ?>" placeholder="Insurance Name" required>
                <input type="text" class="form-control" id="exampleInputEmail1" name="oa_id" value="<?php echo $row['oa_id']; ?>" hidden placeholder="Insurance Name">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Accesstoken</label>
                <input type="phone" class="form-control" id="exampleInputPassword1" name="access_token" value="<?php echo $row['access_token']; ?>" placeholder="Phone" required>
              </div>

            </div>
            <!-- /.card-body -->

            <div>
              <button type="submit" name="submit" class="btn btn-danger d-block m-auto">บันทึก</button>
            </div>
          </form>

          <!-- /.card -->



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
    </div>
  </section>


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
</body>

</html>