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
    <link rel="stylesheet" href="../css/switch_insurance.css">
</head>

<body class="hold-transition sidebar-mini">
    <?php
   
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


        <?php

        $sql_type = "SELECT * FROM user_role_type  ";

        $result_type = mysqli_query($con, $sql_type);

        ?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                <div class="offset-1 col-10 mb-2">
                <a href="tab_manage.php" name="but_update" class="btn btn-warning">เพิ่มข้อมูล</a>
                
                </div>
                    <?php

                    while ($row_type = mysqli_fetch_array($result_type)) {

                    ?>
                        <div class="offset-1 col-10">
                            <form action="" method="post">
                                <div class="card card-dark">
                                    <div class=" card-header">
                                        <h3 class="card-title "><?php echo $row_type['name'] ?> </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table id="example1" class="table table-bordered table-hover text-md-center">
                                            <thead>
                                                <tr>
                                                    <th >ลำดับ</th>
                                                    <th width="300">หน้า</th>
                                                    <th>ผู้ดูแลระะบ</th>
                                                    <th>พนักงาน</th>
                                                    <th>ลูกค้า</th>
                                                    <th>จัดการ</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <div class="form-group">
                                                    <?php

                                                    $sqlc = "SELECT * FROM user_role WHERE type = $row_type[id]  ";
                                                    $resultc = mysqli_query($con, $sqlc);
                                                    while ($rowc = mysqli_fetch_assoc($resultc)) {
                                                        $idr = $rowc['id'];
                                                    ?>

                                                        <tr>

                                                            <td><?php echo $order++; ?></td>
                                                            <td><label for="page"><?php echo $rowc['page']; ?></label></td>
                                                            <td>
                                                                <?php if ($rowc['admin'] == '1') {

                                                                    $status = 'checked';
                                                                } else {
                                                                    $status = '';
                                                                } ?>

                                                                <label class="switch">
                                                                    <input type="checkbox" name="id" class="change" <?php echo $status ?> id="<?php echo $rowc['id']; ?>">
                                                                    <div class="slider round"> </div>

                                                                </label>

                                                            </td>
                                                            <td>
                                                                <?php if ($rowc['staff'] == '1') {

                                                                    $status = 'checked';
                                                                } else {
                                                                    $status = '';
                                                                } ?>

                                                                <label class="switch">
                                                                    <input type="checkbox" name="id" class="change3" <?php echo $status ?> id="<?php echo $rowc['id']; ?>">
                                                                    <div class="slider round"> </div>

                                                                </label>

                                                            </td>
                                                            <td>
                                                                <?php if ($rowc['member'] == '1') {

                                                                    $status = 'checked';
                                                                } else {
                                                                    $status = '';
                                                                } ?>

                                                                <label class="switch">
                                                                    <input type="checkbox" name="id" class="change2" <?php echo $status ?> id="<?php echo $rowc['id']; ?>">
                                                                    <div class="slider round"> </div>

                                                                </label>

                                                            </td>

                                                            <td>
                                                                <a href="tab_edit.php?id=<?php echo  $idr ?>" class="btn btn-warning"><i class="fas fa-edit"></a></i>&nbsp;
                                                                <a href="../backend/tab_delete.php?id=<?php echo  $idr ?>" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                            </td>

                                                        </tr>
                                                    <?php  } ?>
                                                </div>
                                            </tbody>
                                            <div>
<!--                                                 <input type="submit" name="but_update" class="btn btn-danger " value="บันทึก">
 -->                                               
                                                <br> <br>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>

                    <?php

                    }

                    ?>




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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page specific script -->
    <script>
        /* $(function() {
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
        }); */

        /*  $(function() {
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
         }); */
    </script>
    <script>
        /* $(document).ready(function() {

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
        }); */


        $(document).on('click', '.change', function() {
            var status_id = $(this).attr("id");
            if (status_id != '') {
                $.ajax({
                    url: "../backend/control_admin.php",
                    method: "POST",
                    data: {
                        status_id: status_id
                    },
                    success: function(data) {

                        console.log(data);
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
            }
        });

        $(document).on('click', '.change2', function() {
            var status_id = $(this).attr("id");
            if (status_id != '') {
                $.ajax({
                    url: "../backend/control_member.php",
                    method: "POST",
                    data: {
                        status_id: status_id
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
            }
        });
        $(document).on('click', '.change3', function() {
            var status_id = $(this).attr("id");
            if (status_id != '') {
                $.ajax({
                    url: "../backend/control_staff.php",
                    method: "POST",
                    data: {
                        status_id: status_id
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
            }
        });
        /* -------------------------------------------------------------------------------------------- */
        /*  $(document).ready(function() {

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
         }); */

        /* -------------------------------------------------------------------------------------------- */
        /* $(document).ready(function() {

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
        }); */

        /* -------------------------------------------------------------------------------------------- */
        /*   $(document).ready(function() {

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
          }); */

        /* -------------------------------------------------------------------------------------------- */
    </script>
</body>

</html>