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



$sql2 = "SELECT * FROM user_role  ";

$result2 = mysqli_query($con, $sql2);

$sql3 = "SELECT * FROM user_role  ";

$result3 = mysqli_query($con, $sql3);

$sql4 = "SELECT * FROM user_role  ";

$result4 = mysqli_query($con, $sql4);

$sql5 = "SELECT * FROM user_role  ";

$result5 = mysqli_query($con, $sql5);




?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap');

    * {
        font-family: 'Prompt', sans-serif;

    }
</style>


<div class="wrapper">

    <!-- Navbar -->

    <nav class="main-header navbar navbar-expand navbar-indigo ">
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
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt" style="color: white;"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large" style="color: white;"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4" style="position: fixed;">
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
                        echo " <li class='nav-item'>
                        <a href='#' class='nav-link'>
                          <i class='nav-icon fas fa-address-card'></i>
                          <p>
                          ข้อมูลส่วนตัว
                            <i class='fas fa-angle-left right'></i>
                          </p>
                        </a>
                        <ul class='nav nav-treeview'>
                       ";
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            if ($row2['type'] == '1') {
                                $idp = $row2['id'];

                                $role = explode(",", $row2['role']); //array
                                $result_array = array_search("admin$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row2[link]' class='nav-link '> <i class='$row2[icon]'></i>
                            <p>$row2[page]</p></a></li> ";
                                }
                            }
                        }
                        echo "  </ul>
                        </li>";

                        /* ------------------------------------------------------------------------------------ */
                        echo " <li class='nav-item'>
                        <a href='#' class='nav-link'>
                          <i class='nav-icon fas fa-users'></i>
                          <p>
                          สมาชิก
                            <i class='fas fa-angle-left right'></i>
                          </p>
                        </a>
                        <ul class='nav nav-treeview'>
                       ";
                        while ($row3 = mysqli_fetch_assoc($result3)) {

                            if ($row3['type'] == '2') {
                                $idp = $row3['id'];

                                $role = explode(",", $row3['role']); //array
                                $result_array = array_search("admin$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row3[link]' class='nav-link '> <i class='$row3[icon]'></i>
                            <p>$row3[page]</p></a></li> ";
                                }
                            }
                        }echo "  </ul>
                        </li>";

                         /* ------------------------------------------------------------------------------------ */
                         echo " <li class='nav-item'>
                         <a href='#' class='nav-link'>
                           <i class='nav-icon fas fa-sliders-h'></i>
                           <p>
                           ตั้งค่า
                             <i class='fas fa-angle-left right'></i>
                           </p>
                         </a>
                         <ul class='nav nav-treeview'>
                        ";
                        while ($row4 = mysqli_fetch_assoc($result4)) {

                            if ($row4['type'] == '3') {
                                $idp = $row4['id'];

                                $role = explode(",", $row4['role']); //array
                                $result_array = array_search("admin$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row4[link]' class='nav-link '> <i class='$row4[icon]'></i>
                            <p>$row4[page]</p></a></li> ";
                                }
                            }
                        }echo "  </ul>
                        </li>";
                        /* ------------------------------------------------------------------------------------ */
                        echo " <li class='nav-item'>
                        <a href='#' class='nav-link'>
                          <i class='nav-icon fas fa-bell'></i>
                          <p>
                          แจ้งเตือน
                            <i class='fas fa-angle-left right'></i>
                          </p>
                        </a>
                        <ul class='nav nav-treeview'>
                       ";
                       
                        while ($row5 = mysqli_fetch_assoc($result5)) {

                            if ($row5['type'] == '4') {
                                $idp = $row5['id'];

                                $role = explode(",", $row5['role']); //array
                                $result_array = array_search("admin$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row5[link]' class='nav-link '> <i class='$row5[icon]'></i>
                            <p>$row5[page]</p></a></li> ";
                                }
                            }
                        }
                    }
                    echo "  </ul>
                    </li>";

                    /* ----------------------  -----------  -----------  -----------  -----------  -----------  -----------  -----------  -----------   */

                    if ($_SESSION['level'] == 'member') {

                        echo "ข้อมูลส่วนตัว <br>";
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            if ($row2['type'] == '1') {
                                $idp = $row2['id'];

                                $role = explode(",", $row2['role']); //array
                                $result_array = array_search("member$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row2[link]' class='nav-link '> <i class='$row2[icon]'></i>
                            <p>$row2[page]</p></a></li> ";
                                }
                            }
                        }

                        echo "สมาชิก <br>";
                        while ($row3 = mysqli_fetch_assoc($result3)) {

                            if ($row3['type'] == '2') {
                                $idp = $row3['id'];

                                $role = explode(",", $row3['role']); //array
                                $result_array = array_search("member$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row3[link]' class='nav-link '> <i class='$row3[icon]'></i>
                            <p>$row3[page]</p></a></li> ";
                                }
                            }
                        }

                        echo "ตั้งค่า <br>";
                        while ($row4 = mysqli_fetch_assoc($result4)) {

                            if ($row4['type'] == '3') {
                                $idp = $row4['id'];

                                $role = explode(",", $row4['role']); //array
                                $result_array = array_search("member$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row4[link]' class='nav-link '> <i class='$row4[icon]'></i>
                            <p>$row4[page]</p></a></li> ";
                                }
                            }
                        }
                        echo "แจ้งเตือน <br>";
                        while ($row5 = mysqli_fetch_assoc($result5)) {

                            if ($row5['type'] == '4') {
                                $idp = $row5['id'];

                                $role = explode(",", $row5['role']); //array
                                $result_array = array_search("member$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row5[link]' class='nav-link '> <i class='$row5[icon]'></i>
                            <p>$row5[page]</p></a></li> ";
                                }
                            }
                        }
                    }

                    /* ----------------------------------------------------------------------------------------------------------- */

                    if ($_SESSION['level'] == 'employee') {

                        echo "ข้อมูลส่วนตัว <br>";
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            if ($row2['type'] == '1') {
                                $idp = $row2['id'];

                                $role = explode(",", $row2['role']); //array
                                $result_array = array_search("employee$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row2[link]' class='nav-link '> <i class='$row2[icon]'></i>
        <p>$row2[page]</p></a></li> ";
                                }
                            }
                        }

                        echo "สมาชิก <br>";
                        while ($row3 = mysqli_fetch_assoc($result3)) {

                            if ($row3['type'] == '2') {
                                $idp = $row3['id'];

                                $role = explode(",", $row3['role']); //array
                                $result_array = array_search("employee$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row3[link]' class='nav-link '> <i class='$row3[icon]'></i>
        <p>$row3[page]</p></a></li> ";
                                }
                            }
                        }

                        echo "ตั้งค่า <br>";
                        while ($row4 = mysqli_fetch_assoc($result4)) {

                            if ($row4['type'] == '3') {
                                $idp = $row4['id'];

                                $role = explode(",", $row4['role']); //array
                                $result_array = array_search("employee$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row4[link]' class='nav-link '> <i class='$row4[icon]'></i>
        <p>$row4[page]</p></a></li> ";
                                }
                            }
                        }
                        echo "แจ้งเตือน <br>";
                        while ($row5 = mysqli_fetch_assoc($result5)) {

                            if ($row5['type'] == '4') {
                                $idp = $row5['id'];

                                $role = explode(",", $row5['role']); //array
                                $result_array = array_search("employee$idp", $role); //array
                                if ($result_array !== false) {

                                    echo "  <li class='nav-item'><a href='$row5[link]' class='nav-link '> <i class='$row5[icon]'></i>
        <p>$row5[page]</p></a></li> ";
                                }
                            }
                        }
                    }
                    /* 

                        if ($_SESSION['level'] == 'member') {
                            $role = explode(",", $rowp['role']); //array
                            $result_array = array_search("member$idp", $role); //array
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='$rowp[link]' class='nav-link '>
          <i class='$rowp[icon]'></i>
          <p>
          $rowp[page]
          </p>
          </a>
        </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'employee') {
                            $role = explode(",", $rowp['role']); //array
                            $result_array = array_search("employee$idp", $role); //array
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='$rowp[link]' class='nav-link '>
        <i class='$rowp[icon]'></i>
        <p>
        $rowp[page]
        </p>
        </a>
      </li> ";
                            }
                        }
                    } */

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