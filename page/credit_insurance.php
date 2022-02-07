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
                        <h1 style="text-transform: uppercase">สินเชื่อประกันภัย</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>


        <?php



        $sql = "SELECT * FROM ins_form ";
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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ลำกับ</th>
                                            <th>วิธีผ่อนชำระ</th>


                                            <th>ชื่อ - นามสกุล</th>
                                            <th>ทะเบียนรถ</th>
                                            <th>โทรศัพท์</th>
                                            <th>เบี้ยรวม</th>
                                            <th>งวดทั้งหมด</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php while ($row = mysqli_fetch_array($result)) { ?>

                                            <tr>
                                                <td><?php echo $row['form_id']; ?></td>
                                                <td><?php echo $row['ins_type']; ?></td>


                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['car_license']; ?></td>
                                                <td><?php echo $row['tel']; ?></td>
                                                <td><?php echo $row['total']; ?></td>
                                                <td><?php echo $row['installment_total']; ?></td>



                                                <td>

                                                    <?php if ($row['ins_status'] == '1') {

                                                        $status = 'checked';
                                                    } else {
                                                        $status = '';
                                                    } ?>

                                                    <label class="switch">
                                                        <input type="checkbox" name="id" class="change" <?php echo $status ?> id="<?php echo $row['form_id']; ?>">

                                                        <div class="slider round"> </div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <div class="mb-2">
                                                        <div class="row">
                                                            <div class="col-md-4">

                                                                <button title='ไฟล์' type=button class="btn btn-sm btn-info  file" name="file" id="file_credit" value="<?php echo $row['form_id']; ?>">
                                                                    <i class="fas fa-folder"></i>
                                                                    ไฟล์</button>

                                                            </div>



                                                            <div class="col-md-4">
                                                                <?php if ($row['ins_type'] == 'แบบ1 (% | หารเท่า)') { ?>
                                                                    <a href="form_edit_insu.php?form_id=<?php echo $row['form_id']; ?>&type=edit" class="btn btn-sm btn-danger"><i class="fas fa-edit">
                                                                            แก้ไข </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ2 (% | กำหนด %)") { ?>
                                                                    <a href="form_edit_insu2.php?form_id=<?php echo $row['form_id']; ?>&type=edit" class="btn btn-sm btn-danger"><i class="fas fa-edit">
                                                                    แก้ไข </a></i>
                                                                <?php } ?>

                                                                <?php if ($row['ins_type'] == "แบบ3 (จำนวน | หารเท่า)") { ?>
                                                                    <a href="form_edit_insu3.php?form_id=<?php echo $row['form_id']; ?>&type=edit" class="btn btn-sm btn-danger"><i class="fas fa-edit">
                                                                    แก้ไข </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ3 (เขียวเหลือง)") { ?>
                                                                    <a href="form_edit_insu3(2).php?form_id=<?php echo $row['form_id']; ?>&type=edit" class="btn btn-sm btn-danger"><i class="fas fa-edit">
                                                                    แก้ไข </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ3 (สหกรณ์)") { ?>
                                                                    <a href="form_edit_insu3(3).php?form_id=<?php echo $row['form_id']; ?>&type=edit" class="btn btn-sm btn-danger"><i class="fas fa-edit">
                                                                    แก้ไข </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ4 (จำนวน | จำนวน)") { ?>
                                                                    <a href="form_edit_insu4.php?form_id=<?php echo $row['form_id']; ?>&type=edit" class="btn btn-sm btn-danger"><i class="fas fa-edit">
                                                                    แก้ไข </a></i>
                                                                <?php } ?>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <?php if ($row['ins_type'] == 'แบบ1 (% | หารเท่า)') { ?>
                                                                    <a href="form_edit_insu.php?form_id=<?php echo $row['form_id']; ?>&type=copy" class="btn btn-sm btn-success"><i class="fas fa-copy">
                                                                            คัดลอก </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ2 (% | กำหนด %)") { ?>
                                                                    <a href="form_edit_insu2.php?form_id=<?php echo $row['form_id']; ?>&type=copy" class="btn btn-sm btn-success"><i class="fas fa-edit">
                                                                            คัดลอก </a></i>
                                                                <?php } ?>

                                                                <?php if ($row['ins_type'] == "แบบ3 (จำนวน | หารเท่า)") { ?>
                                                                    <a href="form_edit_insu3.php?form_id=<?php echo $row['form_id']; ?>&type=copy" class="btn btn-sm btn-success"><i class="fas fa-edit">
                                                                            คัดลอก </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ3 (เขียวเหลือง)") { ?>
                                                                    <a href="form_edit_insu3(2).php?form_id=<?php echo $row['form_id']; ?>&type=copy" class="btn btn-sm btn-success"><i class="fas fa-edit">
                                                                            คัดลอก </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ3 (สหกรณ์)") { ?>
                                                                    <a href="form_edit_insu3(3).php?form_id=<?php echo $row['form_id']; ?>&type=copy" class="btn btn-sm btn-success"><i class="fas fa-edit">
                                                                            คัดลอก </a></i>
                                                                <?php } ?>
                                                                <?php if ($row['ins_type'] == "แบบ4 (จำนวน | จำนวน)") { ?>
                                                                    <a href="form_edit_insu4.php?form_id=<?php echo $row['form_id']; ?>&type=copy" class="btn btn-sm btn-success"><i class="fas fa-edit">
                                                                            คัดลอก </a></i>
                                                                <?php } ?>
                                                            </div>




                                                            


                                                        </div>
                                                    </div>
                                                </td>










                                            </tr>


                                        <?php  } ?>
                                    </tbody>

                                </table>
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
                                <h5>ไฟล์<h5>
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
                        var Report_ID = $(this).val();
                        if (Report_ID != '') {
                            $.ajax({
                                url: "showfile.php",
                                method: "POST",
                                data: {
                                    Report_ID: Report_ID
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
                </script>
</body>

</html>