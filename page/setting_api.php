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

if (isset($_POST['add_line'])) {


    $name_line = $_POST['name_line'];
    $access = $_POST['access'];


    $sql_add_line = "INSERT INTO `line_doc`(`name`, `access_token`) VALUES ('$name_line','$access')";
    $result_add_line = mysqli_query($con, $sql_add_line);


    

    $sql_table = "CREATE TABLE `$name_line` (
        `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `tel` varchar(255) NOT NULL,
        `tel_keep` varchar(255) NOT NULL,
        `user_id` varchar(255) NOT NULL,
        `access_token` varchar(255) NOT NULL,
        `oa_id` varchar(255) NOT NULL,
        `u_info_id` varchar(255) NOT NULL

      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
      $result_table = mysqli_query($con, $sql_table);
}
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
                        <h1 style="text-transform: uppercase">พนักงาน</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <?php

        $sqlsms = "SELECT * FROM sms_doc";
        $resultsms = mysqli_query($con, $sqlsms);
        $rowsms = mysqli_fetch_array($resultsms);

        ?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <!-- general form elements -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><b>SMS THAIBULK</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form action="../backend/edit_sms_api.php?id=<?php echo $rowsms['id'] ?>" method="POST">

                                <div class="card-body">


                                    <!-- <div class="form-group">

                                        <div>
                                        <label for="exampleInputEmail1">SMS</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="" placeholder="username" required>
                                        </div>
                                        
                                    </div> -->
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">API Url </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="api" value="<?php echo $rowsms['api'] ?>" placeholder="Url" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Auth</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="auth" value="<?php echo $rowsms['auth'] ?>" placeholder="Authorization" required>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger d-block m-auto" onclick="return confirm('Are you sure to edit ?')">บันทึก</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                        </form>
                    </div>
                    <!-- /.content-wrapper -->

                    <?php

                    $sql_line = "SELECT * FROM line_doc";
                    $result_line = mysqli_query($con, $sql_line);

                    ?>



                    <div class="card card-warning offset-md-1 col-10">
                        <div class="card-header">
                            <h3 class="card-title"><b>LINE OFFICIAL</b></h3>
                        </div>

                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-warning " data-toggle="modal" data-target="#exampleModalCenter">เพื่ม Line OA &nbsp; <i class="fas fa-user"></i></button>

                                </div>



                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่ม Line OA</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">ชื่อ LINE OA</label>
                                                        <input type="text" class="form-control" id="role_type" name="name_line" value="" placeholder="ชื่อหมวดหมู่" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">AccessToken</label>
                                                        <input type="text" class="form-control" id="role_type" name="access" value="" placeholder="ชื่อหมวดหมู่" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                <button type="submit" name="add_line" id="submit" class="btn btn-warning">บันทึก</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="150">Line Official ID </th>
                                                <th width="150">Line Official</th>


                                                <th>Accesstoken</th>

                                                <th>จัดการ</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php while ($row_line = mysqli_fetch_array($result_line)) { ?>
                                                <tr>
                                                    <td><?php echo $row_line['oa_id']; ?></td>
                                                    <td><?php echo $row_line['name']; ?></td>


                                                    <td style="max-width:20rem;"><?php echo $row_line['access_token']; ?></td>


                                                    <td> <a title='วิว' type=button class="btn btn-warning view" name="view" value="วิว" id="<?php echo $row_line["oa_id"]; ?>">
                                                            <i class="far fa-edit"></i></a>
                                                        <a href="../backend/update_line_api.php?oa_id=<?php echo $row_line['oa_id']; ?>&name=<?php echo $row_line['name']; ?>" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><i class="far fa-trash-alt"></i></a>

                                                    </td>

                                                </tr>



                                            <?php  } ?>

                                            <div id="dataModal2" class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5>Edit Line Official<h5>
                                                        </div>
                                                        <div class="modal-body" id="Report_detail">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
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
                            "lengthChange": true,
                            "autoWidth": false,
                            /*                             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                             */
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


                    $(document).on('click', '.view', function() {
                        var oa_id = $(this).attr("id");
                        if (oa_id != '') {
                            $.ajax({
                                url: "line_api_edit.php",
                                method: "POST",
                                data: {
                                    oa_id: oa_id
                                },
                                success: function(data) {
                                    $('#Report_detail').html(data);
                                    $('#dataModal2').modal('show');
                                    console.log(data);
                                }
                            });
                        }
                    });
                </script>

</body>

</html>