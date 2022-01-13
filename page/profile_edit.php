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
            <h1 style="text-transform: uppercase">แก้ไขข้อมูล</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="text-transform: uppercase"><a href="profile_edit.php"> แก้ไขข้อมูล</a></li>
              <li class="breadcrumb-item active" style="text-transform: uppercase">แก้ไขข้อมูล</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
                          <form action="../backend/updateImage.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="customFile" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                              <!-- figure ฟังก์ชันของ bootstrap -->
                              <figure class="figure text-center d-none mt-2"> <!--d-none ซ่อนรูปภาพ -->
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
          <!-- /.col -->
          <div class="offset-3 col-md-6">
            <div class="card card-warning">
              <div class="card-header ">
                <h3 class="card-title">แก้ไขข้อมูล</li>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->

                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal" action="../backend/profile_update.php?id=<?php echo $row['id'] ?>" method="post">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label"> <strong><i class="fas fa-user"></i> User Name</strong></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username']; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label"><strong><i class="far fa-user"></i> ชื่อ</strong></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label"><strong><i class="fas fa-phone"></i> โทรศัพท์</strong></label>
                          <div class="col-sm-10">
                            <input type="phone" class="form-control" name="tel" id="tel" value="<?php echo $row['tel']; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label"> <strong><i class="fas fa-at"></i> อีเมล</strong></label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label"><strong><i class="fas fa-address-card"></i> ที่อยู่</strong></label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="address" id="address" value=""><?php echo $row['address']; ?></textarea>
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <div class="offset-5 col-6">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
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