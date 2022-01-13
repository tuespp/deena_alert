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
                        <h1 style="text-transform: uppercase">พนักงาน</h1>
                    </div>
                    
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <?php





        $id = $_GET['id'];

        $sql2 = "SELECT users_info.name, users_info.id, users_info.tel,users_info.email,users_info.address,users_info.img, status.status_name, sub_status.sub_name,sub_status.status
            FROM ((users_info
            LEFT  JOIN status ON users_info.status = status.id)
            LEFT  JOIN sub_status ON users_info.sub_status = sub_status.id)
            WHERE users_info.id = $id;
            ";
        $result2 = mysqli_query($con, $sql2);

        $row = mysqli_fetch_array($result2);

        $id_status = $row['status'];
        ?>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">

                    <div class="offset-sm-3 col-md-6">

                        <!-- Profile Image -->
                        <div class="card card-pink card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../img/<?php echo $row['img']; ?>" alt="User profile picture">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn mx-auto d-block my-3 btn-warning" data-toggle="modal" data-target="#exampleModal">
                                        Change Image
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="../backend/updateImage_staff.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="file" id="customFile" aria-describedby="inputGroupFileAddon01">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                        <!-- figure ฟังก์ชันของ bootstrap -->
                                                        <figure class="figure text-center d-none mt-2">
                                                            <!--d-none ซ่อนรูปภาพ -->
                                                            <img id="imageUpload" class="figure-img img-fluid rounded" alt="">
                                                        </figure>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>


                <div class="offset-3 col-md-6">


                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">อัพเดทข้อมูล</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <?php

                        $sql3 = "SELECT * FROM status";
                        $result3 = mysqli_query($con, $sql3);



                        ?>

                        <form action="../backend/member_update.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">


                                    <label for="exampleInputEmail1">ชื่อ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="insurance" value="<?php echo $row['name']; ?>" placeholder="Insurance Name" required>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="ids" value="<?php echo $row['id']; ?>" hidden placeholder="Insurance Name">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">โทรศัพท์</label>
                                    <input type="phone" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $row['tel']; ?>" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">เมล</label>
                                    <input type="phone" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $row['email']; ?>" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">ที่อยู่</label>
                                    <input type="phone" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $row['address']; ?>" placeholder="Phone" required>
                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">

                                <button type="submit" class="btn btn-primary d-block m-auto">บันทึก</button>

                            </div>

                        </form>
                    </div>
                    <!-- /.card -->
                </div>

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


        $('#status').change(function() {

            var id = $(this).val();

            $.ajax({
                type: "post",
                url: "../backend/member_select.php",
                data: {
                    status_id: id
                },

                success: function(data) {

                    console.log(data);
                    $('#sub_name').html(data);

                }
            });
        });
    </script>

    <script>
        $('.custom-file-input').on('change', function() { //selecter class custom และ ดักจับ event(change)
            var fileName = $(this).val().split('\\').pop(); //ดึงค่าข้อมูลของตัว path และแยกข้อมูลด้วย split และใช้ pop ในการแยกข้อมูลด้านหลังสุดของ array
            $(this).siblings('.custom-file-label').html(fileName) //siblings(เลือกทุกอย่างยกเว้นตัวเอง แต่จะเลือกตัวlabel) html(แสดงในส่วนของข้อความออกมา)
            if (this.files[0]) { //ถ้ามีการรับค่าจาก array ของ file
                var reader = new FileReader() //สร้างฟังก์ชันขึ้นใหม่
                $('.figure').addClass('d-block') //selecter ไปที่ class figure , add class 'd-block' เพื่อโชว์รูปภาพ
                reader.onload = function(e) { //เรียกค่าข้อมูลของ file
                    $('#imageUpload').attr('src', e.target.result).width(240) //selecter id ของ img และเซ็ต attr ของข้อมูล

                }
                reader.readAsDataURL(this.files[0]) //อ่านค่าของ array file
            }
        })
    </script>
</body>

</html>