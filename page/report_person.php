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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
                        <h1 style="text-transform: uppercase">????????????????????????????????????????????????????????????</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <!-- general form elements -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">???????????????????????????????????????????????????</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php


                            $sql = "SELECT * FROM status";
                            $result = mysqli_query($con, $sql);


                            $sql_line = "SELECT * FROM line_doc";
                            $result_line = mysqli_query($con, $sql_line);
                            $row_line = mysqli_fetch_array($result_line);

                            ?>
                            <form action="../page/report_detail2.php" method="POST">

                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">



                                            <label>Line Official</label>
                                            <select class="custom-select" name="oa_id" id="oa_id">
                                                <option class="text-center" selected disabled> ??????????????? Line Official </option>
                                                <?php foreach ($result_line as $value_line) { ?>

                                                    <option value="<?php echo $value_line['oa_id'] ?>" class="text-center"><?php echo $value_line['name'] ?></option>
                                                <?php } ?>
                                            </select>

                                            
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->


                               
                            </form>
                        </div>
                        <!-- /.card -->


                        </form>
                        <div id="table_member">
                            <div class="card-body">
                                <div class="col-sm-12">
                                </div>
                            </div>
                        </div>
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
<!--                 <script src="../js/jquery.min.js"></script>
 -->                <!-- Bootstrap 4 -->
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



                    $(document).ready(function() {
                        $('#myTextarea').emojioneArea({
                            pickerPosition: "right"
                        });
                    });
                </script>

                <script>
                    /* --------------------------------------- select sub status -------------------------------------------------   */

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

                        /*      --------------------------------------- --------------------------------------------------------------*/

                        var sub_id = $(this).val();
                        console.log(sub_id);

                        $('#detail').hide();


                        $('#sub_status').change(function() {

                            var sub_id = $(this).val();
                            console.log(sub_id);




                            var id = $(this).val();
                            var oa_id = $('#oa_id').val();

                            $.ajax({
                                type: "post",
                                url: "../backend/select_test.php",
                                data: {
                                    status_id: id,
                                    oa_id: oa_id

                                },

                                success: function(data) {

                                    $('#detail').html(data);

                                }
                            });
                        });

                    });


                    $('#oa_id').change(function() {



                        var id = $(this).val();
                        $.ajax({
                            type: "post",
                            url: "../backend/report_person_back.php",
                            data: {
                                oa_id: id
                            },

                            success: function(data) {


                                console.log(data);
                                $('#table_member').html(data);
                            }
                        });


                    });




                    $('#submit').click(function() {
        let line_id = $('#line_id').val();
        if (line_id == '') {

            alert('no data');
            location.reload();

        }
    });
                </script>

</body>

</html>