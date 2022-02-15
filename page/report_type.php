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



if (isset($_POST['delete_ins'])) {

    $form_id = $_POST['form_id'];

    $delet_ins = "DELETE FROM `ins_form` WHERE form_id = $form_id ";
    $result_ins = mysqli_query($con, $delet_ins);

    $delet_inst = "DELETE FROM `installment` WHERE form_id = $form_id ";
    $result_inst = mysqli_query($con, $delet_inst);


    $delet_file = "DELETE FROM `file` WHERE form_id = $form_id ";
    $result_file = mysqli_query($con, $delet_file);
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
    <link rel="stylesheet" href="../css/switch_insurance.css">

    <style>
        /* CSS */


        .border {

            border-radius: 999px;


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
                        <h1 style="text-transform: uppercase">สินเชื่อประกันภัย</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>


        <?php



        $sql = "SELECT * FROM text_report_type ORDER BY report_type_no ";
        $result = mysqli_query($con, $sql);


        ?>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModalCenter">
                                    เพิ่มหมวดหมู่
                                </button>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>


                                            <th >จัดการ</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php while ($row = mysqli_fetch_array($result)) { ?>

                                            <tr>
                                                <td class="text-center"><?php echo $row['report_type_no']; ?></td>
                                                <td><?php echo $row['report_type_name']; ?></td>


                                                <td class="text-center">


                                                    <div class="row">
                                                        <div class=" m-2 text-center">

                                                            <button title='ไฟล์' type=button class="btn btn-sm btn-info rounded-pill  file" name="file" id="file_credit" value="<?php echo $row['report_type_id']; ?>">
                                                            <i class="fas fa-eye"></i>
                                                                ประวัติ</button>

                                                        </div>



                                                        <div class="m-2 text-center">

                                                            <a href="report_type_edit.php?report_type_id=<?php echo $row['report_type_id']; ?>" class="btn btn-sm  btn-warning  rounded-pill"><i class="fas fa-edit">
                                                                </i> แก้ไข </a>


                                                        </div>


                                                        <div class="m-2">
                                                        <a href="../backend/role_type_delete.php?report_type_id=<?php echo $row['report_type_id']; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ?')" class="btn btn-sm  btn-danger  rounded-pill"><i class="fas fa-edit">  </i> ลบ </a>
                                                        
                                                        </div>





                                                    </div>
                                                </td>










                                            </tr>


                                        <?php  } ?>
                                    </tbody>

                                </table>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มหมวดหมู่</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">ชื่อหมวดหมู่</label>
                                                        <input type="text" class="form-control" id="role_type" name="role_type" value="" placeholder="ชื่อหมวดหมู่" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                <button type="submit" name="submit" id="submit" class="btn btn-danger">บันทึก</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
                <div id="dataModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">>

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>ประวัติการส่งข่าวสาร<h5>
                            </div>
                            <div class="modal-body" id="File_detail">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
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
                    $(document).on('click', '#file_credit', function() {
                        var report_type_id = $(this).val();
                        if (report_type_id != '') {
                            $.ajax({
                                url: "report_history.php",
                                method: "POST",
                                data: {
                                    report_type_id: report_type_id
                                },
                                success: function(data) {
                                    $('#File_detail').html(data);
                                    $('#dataModal2').modal('show');
                                }
                            });
                        }
                    });

                    $(function() {
                        $("#example1").DataTable({
                            "responsive": true,
                            "lengthChange": true,

                            /*                             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                             */
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,


                            "responsive": true,
                        });
                    });

                    $(document).on('click', '.change', function() {
                        var status_id = $(this).attr("id");
                        if (status_id != '') {
                            $.ajax({
                                url: "../backend/update_status_ins.php",
                                method: "POST",
                                data: {
                                    status_id: status_id
                                },
                                success: function(data) {

                                    console.log(data);
                                }
                            });
                        }
                    });



                    $(document).on('click', '#submit', function() {

                        var role_type = $('#role_type').val();

                        $.ajax({
                            url: "../backend/role_type.php",
                            method: "POST",
                            data: {
                                report_type: role_type
                            },
                            success: function(data) {


                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'อัพเดทสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1000
                                })
                                setTimeout(function() {
                                    window.location = window.location;
                                }, 1000);
                            }
                        });

                    });
                </script>
</body>

</html>