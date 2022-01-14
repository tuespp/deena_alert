<?php
require_once('../dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}
if ($_SESSION['level'] !== 'admin') {
    echo "<script type='text/javascript'>alert('You have no permission to access this page');
    window.location.href='index.php';</script>";
}
$sql = "SELECT * FROM users_info WHERE id= $id ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


$sqlp = "SELECT * FROM user_role  ";
$resultp = mysqli_query($con, $sqlp);

$order = 1;

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
    <?php
    if (isset($_POST['but_update'])) { //ถ้ามีการกดปุ่ม savedata
        if (isset($_POST['update1'])) { //ถ้ามีการกด checkbox[]
            foreach ($_POST['update1'] as $updateid) { //รันค่า id ที่เลือกมาจาก checkbox[] ของแต่ละตัว 

                $role = implode(",", $_POST['role']); //แยกค่าข้อมูลที่อยู่ใน array ของ role 

                $update = "UPDATE user_role SET 
                        role='" . $role . "'
                    WHERE id=" . $updateid;
                mysqli_query($con, $update);
                header('location:control.php');
            }
        }
    }
/* ------------------------------------------------------------------------------------------ */
if (isset($_POST['but_update'])) { //ถ้ามีการกดปุ่ม savedata
    if (isset($_POST['update2'])) { //ถ้ามีการกด checkbox[]
        foreach ($_POST['update2'] as $updateid) { //รันค่า id ที่เลือกมาจาก checkbox[] ของแต่ละตัว 

            $role = implode(",", $_POST['role']); //แยกค่าข้อมูลที่อยู่ใน array ของ role 

            $update = "UPDATE user_role SET 
                    role='" . $role . "'
                WHERE id=" . $updateid;
            mysqli_query($con, $update);
            header('location:control.php');
        }
    }
}
/* ------------------------------------------------------------------------------------------ */
if (isset($_POST['but_update'])) { //ถ้ามีการกดปุ่ม savedata
    if (isset($_POST['update3'])) { //ถ้ามีการกด checkbox[]
        foreach ($_POST['update3'] as $updateid) { //รันค่า id ที่เลือกมาจาก checkbox[] ของแต่ละตัว 

            $role = implode(",", $_POST['role']); //แยกค่าข้อมูลที่อยู่ใน array ของ role 

            $update = "UPDATE user_role SET 
                    role='" . $role . "'
                WHERE id=" . $updateid;
            mysqli_query($con, $update);
            header('location:control.php');
        }
    }
}
/* ------------------------------------------------------------------------------------------ */
if (isset($_POST['but_update'])) { //ถ้ามีการกดปุ่ม savedata
    if (isset($_POST['update4'])) { //ถ้ามีการกด checkbox[]
        foreach ($_POST['update4'] as $updateid) { //รันค่า id ที่เลือกมาจาก checkbox[] ของแต่ละตัว 

            $role = implode(",", $_POST['role']); //แยกค่าข้อมูลที่อยู่ใน array ของ role 

            $update = "UPDATE user_role SET 
                    role='" . $role . "'
                WHERE id=" . $updateid;
            mysqli_query($con, $update);
            header('location:control.php');
        }
    }
}
/* ------------------------------------------------------------------------------------------ */
    include('admin_nav.php');
    ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="text-transform: uppercase">กำหนดสิทธิ์ผู้ใช้</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="offset-1 col-10">
                        <form action="" method="post">
                            <div class="card card-dark">
                                <div class=" card-header">
                                    <h3 class="card-title ">ผู้ใช้</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-hover text-md-center">
                                        <thead>
                                            <tr>
                                                <th><input type='checkbox' id='checkAll1'> เลือกทั้งหมด</th>
                                                <th>ลำดับ</th>
                                                <th>หน้า</th>
                                                <th>ผู้ดูแลระะบ</th>
                                                <th>พนักงาน</th>
                                                <th>ลูกค้า</th>
                                                <th>จัดการ</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="form-group">
                                                <?php
                                                $sqlc = "SELECT * FROM user_role WHERE type ='1'  ";
                                                $resultc = mysqli_query($con, $sqlc);
                                                while ($rowc = mysqli_fetch_assoc($resultc)) {
                                                    $idr = $rowc['id'];
                                                    $role_arr = array("admin$idr", "employee$idr", "member$idr");
                                                ?>

                                                    <tr>
                                                        <td><input type='checkbox' name='update1[]' value='<?= $idr ?>'></td>
                                                        <td><?php echo $order++;  ;?></td>
                                                        <td><label for="page"><?php echo $rowc['page']; ?></label></td>
                                                        <?php
                                                        $role = explode(",", $rowc['role']); //array
                                                        foreach ($role_arr as $value) {
                                                            if (in_array($value, $role)) {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' checked></td>";
                                                                echo " <input type='hidden' name='role[]' value='0'>";
                                                            } else {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' ></td>";
                                                            }
                                                        }
                                                        ?>
                                                        <td><a href="tab_edit.php?id=<?php echo  $idr ?>"><i class="far fa-edit"></a></i>&nbsp;&nbsp;&nbsp;<a href="../backend/tab_delete.php?id=<?php echo  $idr ?>" onclick="return confirm('Are you sure to delete ?')"><i class="far fa-trash-alt"></i></a></td>

                                                    </tr>
                                                <?php  } ?>
                                            </div>
                                        </tbody>
                                        <div>
                                            <input type="submit" name="but_update" class="btn btn-danger " value="บันทึก">
                                            <a href="tab_manage.php" name="but_update" class="btn btn-warning">เพิ่มข้อมูล</a>
                                            <br> <br>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="offset-1 col-10">
                        <form action="" method="post">
                            <div class="card card-dark">
                                <div class=" card-header">
                                    <h3 class="card-title ">สมาชิก</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example3" class="table table-bordered table-hover text-md-center">
                                        <thead>
                                            <tr>
                                                <th><input type='checkbox' id='checkAll2'> เลือกทั้งหมด</th>
                                                <th>ลำดับ</th>
                                                <th>หน้า</th>
                                                <th>ผู้ดูแลระะบ</th>
                                                <th>พนักงาน</th>
                                                <th>ลูกค้า</th>
                                                <th>จัดการ</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="form-group">
                                                <?php
                                                $sqlc = "SELECT * FROM user_role WHERE type ='2'  ";
                                                $resultc = mysqli_query($con, $sqlc);
                                                while ($rowc = mysqli_fetch_assoc($resultc)) {
                                                    $idr = $rowc['id'];
                                                    $role_arr = array("admin$idr", "employee$idr", "member$idr");
                                                ?>

                                                    <tr>
                                                        <td><input type='checkbox' name='update2[]' value='<?= $idr ?>'></td>
                                                        <td><?php echo $order++; ?></td>
                                                        <td><label for="page"><?php echo $rowc['page']; ?></label></td>
                                                        <?php
                                                        $role = explode(",", $rowc['role']); //array
                                                        foreach ($role_arr as $value) {
                                                            if (in_array($value, $role)) {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' checked></td>";
                                                                echo " <input type='hidden' name='role[]' value='0'>";
                                                            } else {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' ></td>";
                                                            }
                                                        }
                                                        ?>
                                                        <td><a href="tab_edit.php?id=<?php echo  $idr ?>"><i class="far fa-edit"></a></i>&nbsp;&nbsp;&nbsp;<a href="../backend/tab_delete.php?id=<?php echo  $idr ?>" onclick="return confirm('Are you sure to delete ?')"><i class="far fa-trash-alt"></i></a></td>

                                                    </tr>
                                                <?php  } ?>
                                            </div>
                                        </tbody>
                                        <div>
                                            <input type="submit" name="but_update" class="btn btn-danger " value="บันทึก">
                                            <a href="tab_manage.php" name="but_update" class="btn btn-warning">เพิ่มข้อมูล</a>
                                            <br> <br>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="offset-1 col-10">
                        <form action="" method="post">
                            <div class="card card-dark">
                                <div class=" card-header">
                                    <h3 class="card-title ">ตั้งค่า</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example5" class="table table-bordered table-hover text-md-center">
                                        <thead>
                                            <tr>
                                                <th><input type='checkbox' id='checkAll3'> เลือกทั้งหมด</th>
                                                <th>ลำดับ</th>
                                                <th>หน้า</th>
                                                <th>ผู้ดูแลระะบ</th>
                                                <th>พนักงาน</th>
                                                <th>ลูกค้า</th>
                                                <th>จัดการ</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="form-group">
                                                <?php
                                                $sqlc = "SELECT * FROM user_role WHERE type ='3'  ";
                                                $resultc = mysqli_query($con, $sqlc);
                                                while ($rowc = mysqli_fetch_assoc($resultc)) {
                                                    $idr = $rowc['id'];
                                                    $role_arr = array("admin$idr", "employee$idr", "member$idr");
                                                ?>

                                                    <tr>
                                                        <td><input type='checkbox' name='update3[]' value='<?= $idr ?>'></td>
                                                        <td><?php echo $order++; ?></td>
                                                        <td><label for="page"><?php echo $rowc['page']; ?></label></td>
                                                        <?php
                                                        $role = explode(",", $rowc['role']); //array
                                                        foreach ($role_arr as $value) {
                                                            if (in_array($value, $role)) {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' checked></td>";
                                                                echo " <input type='hidden' name='role[]' value='0'>";
                                                            } else {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' ></td>";
                                                            }
                                                        }
                                                        ?>
                                                        <td><a href="tab_edit.php?id=<?php echo  $idr ?>"><i class="far fa-edit"></a></i>&nbsp;&nbsp;&nbsp;<a href="../backend/tab_delete.php?id=<?php echo  $idr ?>" onclick="return confirm('Are you sure to delete ?')"><i class="far fa-trash-alt"></i></a></td>

                                                    </tr>
                                                <?php  } ?>
                                            </div>
                                        </tbody>
                                        <div>
                                            <input type="submit" name="but_update" class="btn btn-danger " value="บันทึก">
                                            <a href="tab_manage.php" name="but_update" class="btn btn-warning">เพิ่มข้อมูล</a>
                                            <br> <br>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="offset-1 col-10">
                        <form action="" method="post">
                            <div class="card card-dark">
                                <div class=" card-header">
                                    <h3 class="card-title ">แจ้งเตือน</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example7" class="table table-bordered table-hover text-md-center">
                                        <thead>
                                            <tr>
                                                <th><input type='checkbox' id='checkAll4'> เลือกทั้งหมด</th>
                                                <th>ลำดับ</th>
                                                <th>หน้า</th>
                                                <th>ผู้ดูแลระะบ</th>
                                                <th>พนักงาน</th>
                                                <th>ลูกค้า</th>
                                                <th>จัดการ</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="form-group">
                                                <?php
                                                $sqlc = "SELECT * FROM user_role WHERE type ='4'  ";
                                                $resultc = mysqli_query($con, $sqlc);
                                                while ($rowc = mysqli_fetch_assoc($resultc)) {
                                                    $idr = $rowc['id'];
                                                    $role_arr = array("admin$idr", "employee$idr", "member$idr");
                                                ?>

                                                    <tr>
                                                        <td><input type='checkbox' name='update4[]' value='<?= $idr ?>'></td>
                                                        <td><?php echo $order++; ?></td>
                                                        <td><label for="page"><?php echo $rowc['page']; ?></label></td>
                                                        <?php
                                                        $role = explode(",", $rowc['role']); //array
                                                        foreach ($role_arr as $value) {
                                                            if (in_array($value, $role)) {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' checked></td>";
                                                                echo " <input type='hidden' name='role[]' value='0'>";
                                                            } else {
                                                                echo " <td><input  type='checkbox' name='role[]' value='$value' ></td>";
                                                            }
                                                        }
                                                        ?>
                                                        <td><a href="tab_edit.php?id=<?php echo  $idr ?>"><i class="far fa-edit"></a></i>&nbsp;&nbsp;&nbsp;<a href="../backend/tab_delete.php?id=<?php echo  $idr ?>" onclick="return confirm('Are you sure to delete ?')"><i class="far fa-trash-alt"></i></a></td>

                                                    </tr>
                                                <?php  } ?>
                                            </div>
                                        </tbody>
                                        <div>
                                            <input type="submit" name="but_update" class="btn btn-danger " value="บันทึก">
                                            <a href="tab_manage.php" name="but_update" class="btn btn-warning">เพิ่มข้อมูล</a>
                                            <br> <br>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- /.card-body -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </section>

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
    <!-- jQuery -->


    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/dataTables.responsive.min.js"></script>
    <script src="../js/responsive.bootstrap4.min.js"></script>
    <script src="../js/dataTables.buttons.min.js"></script>
    <script src="../js/buttons.bootstrap4.min.js"></script>
    <script src="../js/buttons.html5.min.js"></script>
    <script src="../js/buttons.print.min.js"></script>
    <script src="../js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../js/demo.js"></script>
    <!-- Page specific script -->
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

        $(function() {
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
            $('#example4').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() {
            $("#example5").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
            $('#example6').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() {
            $("#example7").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example7_wrapper .col-md-6:eq(0)');
            $('#example8').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // Check/Uncheck ALl
            $('#checkAll1').change(function() {
                if ($(this).is(':checked')) {
                    $('input[name="update1[]"]').prop('checked', true);
                } else {
                    $('input[name="update1[]"]').each(function() {
                        $(this).prop('checked', false);
                    });
                }
            });

            // Checkbox click
            $('input[name="update1[]"]').click(function() {
                var total_checkboxes = $('input[name="update1[]"]').length;
                var total_checkboxes_checked = $('input[name="update1[]"]:checked').length;

                if (total_checkboxes_checked == total_checkboxes) {
                    $('#checkAll1').prop('checked', true);
                } else {
                    $('#checkAll1').prop('checked', false);
                }
            });
        });

        /* -------------------------------------------------------------------------------------------- */
        $(document).ready(function() {

            // Check/Uncheck ALl
            $('#checkAll2').change(function() {
                if ($(this).is(':checked')) {
                    $('input[name="update2[]"]').prop('checked', true);
                } else {
                    $('input[name="update2[]"]').each(function() {
                        $(this).prop('checked', false);
                    });
                }
            });

            // Checkbox click
            $('input[name="update2[]"]').click(function() {
                var total_checkboxes = $('input[name="update2[]"]').length;
                var total_checkboxes_checked = $('input[name="update2[]"]:checked').length;

                if (total_checkboxes_checked == total_checkboxes) {
                    $('#checkAll2').prop('checked', true);
                } else {
                    $('#checkAll2').prop('checked', false);
                }
            });
        });

        /* -------------------------------------------------------------------------------------------- */
        $(document).ready(function() {

            // Check/Uncheck ALl
            $('#checkAll3').change(function() {
                if ($(this).is(':checked')) {
                    $('input[name="update3[]"]').prop('checked', true);
                } else {
                    $('input[name="update3[]"]').each(function() {
                        $(this).prop('checked', false);
                    });
                }
            });

            // Checkbox click
            $('input[name="update3[]"]').click(function() {
                var total_checkboxes = $('input[name="update3[]"]').length;
                var total_checkboxes_checked = $('input[name="update3[]"]:checked').length;

                if (total_checkboxes_checked == total_checkboxes) {
                    $('#checkAll3').prop('checked', true);
                } else {
                    $('#checkAll3').prop('checked', false);
                }
            });
        });

        /* -------------------------------------------------------------------------------------------- */
        $(document).ready(function() {

            // Check/Uncheck ALl
            $('#checkAll4').change(function() {
                if ($(this).is(':checked')) {
                    $('input[name="update4[]"]').prop('checked', true);
                } else {
                    $('input[name="update4[]"]').each(function() {
                        $(this).prop('checked', false);
                    });
                }
            });

            // Checkbox click
            $('input[name="update4[]"]').click(function() {
                var total_checkboxes = $('input[name="update4[]"]').length;
                var total_checkboxes_checked = $('input[name="update4[]"]:checked').length;

                if (total_checkboxes_checked == total_checkboxes) {
                    $('#checkAll4').prop('checked', true);
                } else {
                    $('#checkAll4').prop('checked', false);
                }
            });
        });

        /* -------------------------------------------------------------------------------------------- */
    </script>
</body>

</html>