<?php
@ini_set('display_errors', '0');
require('../dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}
$sql = "SELECT * FROM users_info WHERE id= $id ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);


$face = $row['facebook_id'];


if ($_SESSION['user_id'] == '') {
    $_SESSION['user_id'] = '5';
}
$line = $_SESSION['user_id'];



$sql_ur = "SELECT * FROM user_role  ";

$result_ur = mysqli_query($con, $sql_ur);

$sql_urt = "SELECT * FROM user_role_type  ";

$result_urt = mysqli_query($con, $sql_urt);

/* $sql3 = "SELECT * FROM user_role  ";

$result3 = mysqli_query($con, $sql3);

$sql4 = "SELECT * FROM user_role  ";

$result4 = mysqli_query($con, $sql4);

$sql5 = "SELECT * FROM user_role  ";

$result5 = mysqli_query($con, $sql5);
 */



?>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap');

    * {
        font-family: 'Prompt', sans-serif;
      }

</style>


<div class="wrapper">

    <!-- Navbar -->

    <nav class="main-header navbar navbar-expand navbar-info ">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white;"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <!-- Message Start -->
                    <!-- Message End -->
            </li>
            <!-- Notifications Dropdown Menu -->


           

            <li class="nav-item  nav-link" style="border-right: 1px solid white;">

                <div class="btn-group ">
                    <img class="d-block m-auto " style="border-radius:50%; width:2rem;" src="../img/<?php echo $row['img'] ?>" width="100" alt="img">
                    &nbsp;
                    <span type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <b >  <?php echo $row['name']; ?></b>
                    </span>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a>

                        <!-- <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a> -->

                    </div>
                </div>
            </li>



            <li class="nav-item">

                <a href="logout.php" type="button" class="nav-link" id="btnLogOut" onclick="logOut();" style="text-decoration: none; color:white;">
                    <h6> <b> log out</b></h6>
                </a>

            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
            <span class="brand-text font-weight-light" style="margin-left: 20px; text-transform: uppercase;"><?php echo $row['level']; ?> Managment</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 mb-3 d-block">

                <?php
                if ($_SESSION['user_id'] !== '5') {
                ?>

                    <img class="d-block m-auto" style="border-radius:50% ;  width:3rem;" id="pictureUrl" width="150" alt="img">
                <?php
                }
                ?>

                <?php
                if ($_SESSION['level'] == 'member' && $_SESSION['user_id'] == '5') {
                ?>

                    <img class="d-block m-auto" style="border-radius:50% ;  width:3rem;" src="../img/<?php echo $row['img'] ?>" width="150" alt="img">

                <?php
                }
                ?>
                <?php
                if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'employee') {
                ?>
                    <img class="d-block m-auto" style="border-radius:50% ; width:3rem;" src="../img/<?php echo $row['img'] ?>" width="150" alt="img">

                <?php
                }
                ?>

                <div class="info d-block text-center ">
                    <h5 style="color:black;"><?php echo $row['name']; ?></h5>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <?php


                    if ($_SESSION['level'] == 'admin') {

                        while ($row2 = mysqli_fetch_array($result_urt)) {


                            echo "  <li class='nav-item nav-link'>
                                    <p>$row2[name]</p></li> ";


                            foreach ($result_ur as $vale_ur) {



                                if ($row2['id'] == $vale_ur['type']) {

                                    if ($vale_ur['admin'] == '1') {


                                        echo "  <li class='nav-item'><a href='$vale_ur[link]' class='nav-link '><i class='$vale_ur[icon]'></i>
                                        <p>$vale_ur[page]</p></a></li> ";
                                    }
                                }
                            }
                        }
                    }


                    if ($_SESSION['level'] == 'employee') {

                        while ($row2 = mysqli_fetch_array($result_urt)) {


                            echo "  <li class='nav-item nav-link'>
                                    <p>$row2[name]</p></li> ";


                            foreach ($result_ur as $vale_ur) {



                                if ($row2['id'] == $vale_ur['type']) {

                                    if ($vale_ur['staff'] == '1') {


                                        echo "  <li class='nav-item'><a href='$vale_ur[link]' class='nav-link '><i class='$vale_ur[icon]'></i>
                                        <p>$vale_ur[page]</p></a></li> ";
                                    }
                                }
                            }
                        }
                    }

                    if ($_SESSION['level'] == 'member') {

                        while ($row2 = mysqli_fetch_array($result_urt)) {


                            echo "  <li class='nav-item nav-link'>
                                    <p>$row2[name]</p></li> ";


                            foreach ($result_ur as $vale_ur) {



                                if ($row2['id'] == $vale_ur['type']) {

                                    if ($vale_ur['member'] == '1') {


                                        echo "  <li class='nav-item'><a href='$vale_ur[link]' class='nav-link '><i class='$vale_ur[icon]'></i>
                                        <p>$vale_ur[page]</p></a></li> ";
                                    }
                                }
                            }
                        }
                    }

                    ?>


                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" id="btnLogOut" onclick="logOut();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                ออกจากระบบ
                            </p>



                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <?php require('../env.php') ?>


    <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script>
        function logOut() {

            liff.logout();
            /* window.location.reload(); */


        }

        function logIn() {
            liff.login({
                redirectUri: window.location.href
            });

        }


        async function getUserProfile() {
            const profile = await liff.getProfile();
            document.getElementById("pictureUrl").style.display = "block";
            document.getElementById("pictureUrl").src = profile.pictureUrl;
            document.getElementById("img").src = profile.pictureUrl;

            document.getElementById("displayName").append(profile.displayName);

            document.getElementById("user").value = profile.userId;
            document.getElementById("access").value = (liff.getAccessToken());
            document.getElementById("email").value = (liff.getDecodedIDToken().email);


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

                    document.getElementById("pictureUrl").style.display = "block";
                    document.getElementById("pictureUrl").src = profile.pictureUrl;
                    document.getElementById("displayName").append(profile.displayName);

                    document.getElementById("user").value = profile.userId;
                    document.getElementById("access").value = (liff.getAccessToken());
                    document.getElementById("email").value = (liff.getDecodedIDToken().email);
                    /*  document.getElementById("name").value = profile.displayName;
                document.getElementById("status").value = profile.statusMessage;
                document.getElementById("access").value = (liff.getAccessToken());
                document.getElementById("email").value = (liff.getDecodedIDToken().email);
                document.getElementById("useos").value = (liff.getOS());
                document.getElementById("uselanguage").value = (liff.getLanguage());
                document.getElementById("useversion").value = (liff.getVersion());
                document.getElementById("useisInClient").value = (liff.isInClient());
                document.getElementById("usetype").value = (liff.getContext().type);
                document.getElementById("useviewType").value = (liff.getContext().viewType);
 */


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

        if (<?= $_SESSION['user_id'] !== '5' ?>) {


            main();

        }
    </script>