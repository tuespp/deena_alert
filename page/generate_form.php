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


$sqlt = "SELECT * FROM ins_type";
$resultt = mysqli_query($con, $sqlt);
$resultt2 = mysqli_query($con, $sqlt);

$sqlc = "SELECT * FROM ins_company";
$resultc = mysqli_query($con, $sqlc);
$resultc2 = mysqli_query($con, $sqlc);


$name_zip = $_GET['name'];





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

    <style>
        .red {
            color: red;
        }

        .zoom {


            border: 1px solid gray;
            transition: transform .2s;

            /* Animation */

        }

        .zoom:hover {


            transform: scale(1.5);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }


        .lightbox-gallery {
            background-image: linear-gradient(#4A148C, #E53935);
            background-repeat: no-repeat;
            color: #000;
           
            overflow-x: hidden
            
        }

        .lightbox-gallery p {
            color: #fff
        }

        .lightbox-gallery h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: #fff
        }

        @media (max-width:767px) {
            .lightbox-gallery h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px
            }
        }

        .lightbox-gallery .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto 40px
        }

        .lightbox-gallery .intro p {
            margin-bottom: 0
        }

        .lightbox-gallery .photos {
            padding-bottom: 20px
        }

        .lightbox-gallery .item {
            padding-bottom: 30px
        }
    </style>

    <div class="zoom"></div>


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
                        <h1 style="text-transform: uppercase">แจ้งต่ออายุ</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="2 col-md-12">
                        <!-- general form elements -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">ดาวน์โหลดไฟล์</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <label for="" class="ml-3 mt-3">ส่งผ่านไลน์</label>

                            <form action="../backend/form_insu_gen.php?name=<?php echo $name_zip ?>" method="POST">

                                <button type="submit" name="sendline" class="btn btn-success d-block ml-3">Send Line <i class="fab fa-line" style="font-size: 1.5rem"></i></button>

                            </form>
                            <hr>
                            <label for="" class="ml-3 mt-3">ดาวน์โหลดไฟล์ (.zip)</label>
                            <div class=" mt-3 ml-3">
                                <a href="../img/<?php echo $name_zip ?>.zip" download="../img/<?php echo $name_zip ?>.zip" class="btn btn-danger ">Download .zip</a>
                            </div>

                            <hr>
                            <label for="" class="ml-3 mt-3">ดาวน์โหลดที่ละไฟล์</label>

                            <hr>
                            <div class="form-group d-block m-auto text-center ">

                                <div class="mb-2">

                                    <div class="row">

                                        <div class="col-md-4 mt-3">

                                            <a href="../img/test-form1.png" data-lightbox="photos"><img class="img-fluid zoom" src="../img/test-form1.png" width="300"></a>

                                            <br>

                                            <a href="../img/test-form1.png" class="btn btn-primary mt-5" download="../img/test-form1.png">Download</a>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <a href="../img/test-form2.png" data-lightbox="photos"><img class="img-fluid zoom" src="../img/test-form2.png" width="300"></a>
                                            <br>
                                            <a href="../img/test-form2.png" class="btn btn-primary mt-5" download="../img/test-form2.png">Download</a>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <a href="../img/test-form3.png" data-lightbox="photos"><img class="img-fluid zoom" src="../img/test-form3.png" width="300"></a>
                                            <br>
                                            <a href="../img/test-form3.png" class="btn btn-primary mt-5" download="../img/test-form3.png">Download</a>
                                        </div>
                                        <div class="col-md-4 mt-5">
                                            <a href="../img/test-form4.png" data-lightbox="photos"><img class="img-fluid zoom" src="../img/test-form4.png" width="300"></a>
                                            <br>
                                            <a href="../img/test-form4.png" class="btn btn-primary mt-5" download="../img/test-form4.png">Download</a>
                                        </div>
                                        <div class="col-md-4 mt-5">
                                            <a href="../img/test-form4.png" data-lightbox="photos"><img class="img-fluid zoom" src="../img/test-form4.png" width="300"></a>
                                            <br>
                                            <a href="../img/test-form4.png" class="btn btn-primary mt-5" download="../img/test-form4.png">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">




                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
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


</body>

</html>