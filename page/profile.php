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
            <h1 style="text-transform: uppercase"> ข้อมูลส่วนตัว</h1>
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
            <div class="card card-indigo  card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                  <?php
                  if ($_SESSION['user_id'] !== '5') {
                  ?>

                    <img class="d-block m-auto" style="border-radius:50%" id="img" width="100" alt="img">
                  <?php
                  }
                  ?>

                  <?php
                 if ($_SESSION['level'] == 'member' && $_SESSION['user_id'] == '5') {
                  ?>

                    <img class="d-block m-auto" style="border-radius:50%" src="../img/<?php echo $row['img'] ?>" width="100" alt="img">

                  <?php
                  }
                  ?>

                  <?php
                  if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'employee') {
                  ?>
                    <img class="d-block m-auto" style="border-radius:50%" src="../img/<?php echo $row['img'] ?>" width="100" alt="img">

                  <?php
                  }
                  ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $row['name']; ?></h3>



              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">ข้อมูล</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user"></i> User Name</strong>

                <p class="text-muted">
                  <?php echo $row['username']; ?>
                </p>

                <hr>
                <strong><i class="far fa-user"></i> ชื่อ</strong>

                <p class="text-muted">
                  <?php echo $row['name']; ?>
                </p>

                <hr>

                <strong><i class="fas fa-phone"></i> โทรศัพท์</strong>

                <p class="text-muted">
                  <?php echo $row['tel']; ?>
                </p>
                <hr>
                <strong><i class="fas fa-at"></i> อีเมล</strong>

                <p class="text-muted">
                  <?php echo $row['email']; ?>
                </p>
                <hr>
                <strong><i class="fas fa-address-card"></i> ที่อยู่</strong>

                <p class="text-muted">
                  <?php echo $row['address']; ?>
                </p>
                <hr>

              </div>
              <a href="profile_edit.php" name="but_update" class="btn btn-danger d-block m-auto">แก้ไข</a>

              <br>
              <!-- /.card-body -->
            </div>


            <!-- /.card -->
          </div>

          <!-- /.col -->
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
  </div>
  <!-- Main Footer -->
  </div>
  <!-- ./wrapper -->
</body>
<!-- REQUIRED SCRIPTS -->

</html>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<!-- <?php require('../env.php') ?>

  <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
  <script>
    function logOut() {
      liff.logout();
      window.location.reload();
    }

    function logIn() {
      liff.login({
        redirectUri: window.location.href
      });

    }


    async function getUserProfile() {
      const profile = await liff.getProfile();
      document.getElementById("img").style.display = "block";
      document.getElementById("img").src = profile.pictureUrl;
      document.getElementById("pictureUrl").style.display = "block";
      document.getElementById("pictureUrl").src = profile.pictureUrl;

    }

    async function main() {
      await liff.init({
        liffId: "1656690602-3lqQwdRX"
      });
      if (liff.isInClient()) {
        getUserProfile();

      } else {
        if (liff.isLoggedIn()) {
          getUserProfile();

          const profile = await liff.getProfile();

           document.getElementById("name").value = profile.displayName;
                document.getElementById("status").value = profile.statusMessage;
                document.getElementById("access").value = (liff.getAccessToken());
                document.getElementById("email").value = (liff.getDecodedIDToken().email);
                document.getElementById("useos").value = (liff.getOS());
                document.getElementById("uselanguage").value = (liff.getLanguage());
                document.getElementById("useversion").value = (liff.getVersion());
                document.getElementById("useisInClient").value = (liff.isInClient());
                document.getElementById("usetype").value = (liff.getContext().type);
                document.getElementById("useviewType").value = (liff.getContext().viewType);



          document.getElementById("btnLogIn").style.display = "none";
          document.getElementById("btnLogOut").style.display = "block";


        } else {
          liff.login(


            {
              redirectUri: window.location.href = "<?php echo $path_line ?>admin_nav.php"

            }

          )
          document.getElementById("btnLogIn").style.display = "block";
          document.getElementById("btnLogOut").style.display = "none";


        }
      }
    }


    if( <?= $_SESSION['level'] == 'member' ?> ){
            

            main(); 

        }
  </script>  -->
</body>

</html>