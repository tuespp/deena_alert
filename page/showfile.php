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

$ids = $_POST["Report_ID"];

$sql2 = "SELECT * FROM file WHERE form_id='$ids'";
$query = mysqli_query($con, $sql2);
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


        .border{
          
            border-radius:999px;
            font-size: 15px;
            
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->



    <?php



    $sql = "SELECT * FROM data_insurance ";
    $result = mysqli_query($con, $sql);


    $sql_txt = "SELECT * FROM text_sent_ins ";
    $result_txt = mysqli_query($con, $sql_txt);
    $row_txt = mysqli_fetch_array($result_txt);

    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">





                <div class="container my-6">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <a href="page_insert.php?id=<?php echo $ids  ?>" title='เพิ่มไฟล์'>
                                <button type=button class="btn btn-info">เพิ่มไฟล์ <i class="fas fa-plus-circle"></i></button><br><br>
                            </a>
                            <div class="control_tb" style='overflow-y:scroll;'>
                                <table id='example1' class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อไฟล์</th>
                                            <th>วันที่เพิ่มไฟล์</th>
                                            <th>ฟังก์ชัน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td hidden><?php echo $row["File_ID"]; ?></td>
                                                <td><?php echo $row["File_Name"]; ?></td>
                                                <td><?php echo $row["File_Date"]; ?></td>
                                                <td>
                                                    <div class='row'>
                                                        <div class='col-4'>
                                                            <a href="../backend/download.php?id=<?php echo $row["File_ID"] ?>" title="ดาวน์โหลดไฟล์">
                                                                <button type=button class="btn btn-success btn-sm"><i class="fas fa-download"></i>
                                                                </button></a>
                                                        </div>
                                                        <div class='col-4'>
                                                            <a href="../backend/delete_file.php?id=<?php echo $row["File_ID"]; ?>&submit=DEL" onclick="return confirm('ต้องการจะลบไฟล์นี้หรือไม่ ?')" title='ลบไฟล์'>
                                                                <button type=button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></a>

                                                        </div>
                                                        <div class='col-4'>
                                                        <a href="myFile/<?php echo $row["File_Name"]; ?>" data-lightbox="photos" class="img-fluid zoom">
                                                                <button type=button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button></a>

                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
        </div>
    </section>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <!-- REQUIRED SCRIPTS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>






    </script>
</body>

</html>