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
                        <h1 style="text-transform: uppercase">??????????????????????????????????????????????????????????????? ??????????????????????????? 3 (?????????????????????????????????)</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="offset-md-2 col-md-8">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">??????????????????????????????</h3>
                            </div>
                            <label for="" class="mt-3 ml-3">??????????????????????????? 3 ????????? ???????????????????????????????????????????????????????????? ??????????????????????????????????????????????????????????????? </label>
                        </div>
                        <!-- general form elements -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">????????????????????????????????????????????????</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form action="../backend/form_insu_gen.php" method="POST">
                                <div class="card-body">


                                    <div class="form-group ">
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">????????????????????????????????? <span class="red">*</span></label>
                                                    <input type="date" name="date_create" id="date" placeholder="?????????????????????????????????" class="form-control" value="" required>
                                                    <input type="hidden" name="ins_type" placeholder="?????????????????????????????????" class="form-control" value="?????????3 (?????????????????????????????????)">

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">?????????????????????????????????????????? <span class="red">*</span> </label>
                                                    <input type="date" name="date_start" placeholder="??????????????????????????????????????????" class="form-control" value="" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">??????????????????????????????????????? <span class="red">*</span></label>
                                                    <input type="text" name="car_license" placeholder="???????????????????????????????????????" class="form-control" value="" required>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">???????????? - ????????????????????? <span class="red">*</span></label>

                                        <div class="col-md-12">
                                            <input type="text" name="fullname" placeholder="????????????-????????????" class="form-control" value="" required>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1">????????????????????????????????? <span class="red">*</span></label>

                                                <input type="text" name="id_card" maxlength="13" placeholder="?????????????????????????????????" class="form-control" value="" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1">????????????????????? <span class="red">*</span></label>

                                                <input type="date" name="birth_date" placeholder="?????????/???????????????/?????? ????????????" class="form-control" value="" required>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputPassword1">????????????????????? <span class="red">*</span></label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <textarea type="text" name="address" placeholder="?????????????????????" class="form-control" value="" required></textarea>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputPassword1">???????????????????????? <span class="red">*</span></label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <input type="tel" name="tel" maxlength="10" placeholder="???????????????????????? " class="form-control" value="" required>


                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">???????????????????????? ???????????????</label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <input type="tel" name="tel3" maxlength="10" placeholder="???????????????????????? " class="form-control" value="">


                                            </div>

                                        </div>
                                    </div>
                                    <label class="mt-3" for="exampleInputPassword1">????????????????????????????????? </label>

                                    <div class="form-group mt-3">
                                        <label for="exampleInputPassword1">?????????????????????</label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <textarea type="text" name="address2" placeholder="?????????????????????" class="form-control" value=""></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">????????????????????????</label>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <input type="phone" name="tel2" maxlength="10" placeholder="????????????????????????" class="form-control" value="">
                                            </div>

                                        </div>
                                    </div>

                                    <label class="mt-3" for="exampleInputPassword1">??????????????????????????????????????????????????????????????????</label>
                                    <div class="form-group mt-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="exampleInputPassword1">???????????? - ?????????????????????</label>

                                                <input type="text" name="name_grt" placeholder="????????????-????????????" class="form-control" value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="exampleInputPassword1">????????????????????????????????????</label>

                                                <input type="text" name="relation_grt" placeholder="????????????????????????????????????" class="form-control" value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="exampleInputPassword1">????????????????????????</label>

                                                <input type="text" name="tel_grt" placeholder="????????????????????????" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <div id="divv">

                                        <label class="mt-3" for="exampleInputPassword1">?????????????????????????????????????????????????????????????????????????????????????????? <span class="red">*</span> </label>
                                        <div class="form-group mt-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select name="car_type" class="custom-select" id="car_type" required>
                                                        <option value="" class="text-center" selected disabled>????????????????????????????????????????????????</option>
                                                        <?php while ($row = mysqli_fetch_array($resultt)) {

                                                            if ($row['type_name'] == '?????????????????????????????? 3') { ?>

                                                                <option value="<?php echo $row['type_name'] ?>" selected class="text-center"> <?php echo $row['type_name'] ?></option>


                                                            <?php   } else { ?>
                                                                <option value="<?php echo $row['type_name'] ?>" class="text-center"> <?php echo $row['type_name'] ?></option>

                                                            <?php   } ?>


                                                        <?php   } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="car_insu" class="custom-select" id="car_type" required>
                                                        <option value="" class="text-center" selected disabled>????????????????????????????????????????????????</option>
                                                        <?php while ($row = mysqli_fetch_array($resultc)) {

                                                            if ($row['comp_name'] == '?????????????????? ???????????????????????????') { ?>

                                                                <option value="<?php echo $row['comp_name'] ?>" selected class="text-center"> <?php echo $row['comp_name'] ?></option>


                                                            <?php   } else { ?>
                                                                <option value="<?php echo $row['comp_name'] ?>" class="text-center"> <?php echo $row['comp_name'] ?></option>

                                                            <?php   } ?>


                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="car_price" id="ins_price" placeholder="???????????????" class="form-control" value="11858.81" required>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4">

                                                    <select name="car_type2" class="custom-select" id="car_type" required>
                                                        <option value="" class="text-center" selected disabled>????????????????????????????????????????????????</option>
                                                        <?php while ($row = mysqli_fetch_array($resultt2)) {

                                                            if ($row['type_name'] == '????????? ??????????????????') { ?>

                                                                <option value="<?php echo $row['type_name'] ?>" selected class="text-center"> <?php echo $row['type_name'] ?></option>


                                                            <?php   } else { ?>
                                                                <option value="<?php echo $row['type_name'] ?>" class="text-center"> <?php echo $row['type_name'] ?></option>

                                                            <?php   } ?>


                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="car_insu2" class="custom-select" id="car_type" required>
                                                        <option class="text-center" value="" selected disabled>????????????????????????????????????????????????</option>
                                                        <?php while ($row = mysqli_fetch_array($resultc2)) {

                                                            if ($row['comp_name'] == '?????????????????? ???????????????????????????') { ?>

                                                                <option value="<?php echo $row['comp_name'] ?>" selected class="text-center"> <?php echo $row['comp_name'] ?></option>


                                                            <?php   } else { ?>
                                                                <option value="<?php echo $row['comp_name'] ?>" class="text-center"> <?php echo $row['comp_name'] ?></option>

                                                            <?php   } ?>


                                                        <?php   } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="car_price2" id="ins_price2" placeholder="???????????????" class="form-control" value="2041.56" required>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <label class="mt-3" for="exampleInputPassword1">????????????????????????</label>
                                            <div class="form-group mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="mt-3" for="exampleInputPassword1">?????????????????????????????????????????????????????????????????????????????????????????????????????????????????? <span class="red">*</span></label>

                                                        <div class="input-group mb-2">

                                                            <input type="text" name="total" id="price" placeholder="???????????????????????????" class="form-control" value="13900.37" required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">?????????</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> <label class="mt-3" for="exampleInputPassword1">??????????????????????????????????????????????????? <span class="red">*</span></label>

                                                        <div class="input-group mb-2">
                                                            <input type="text" name="installment" id="installment" placeholder="?????????" class="form-control" value="6" required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">?????????</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="row">

                                                <div class="col-md-6 "> <label class="mt-3" for="exampleInputPassword1">?????????????????????????????????????????????????????? <span class="red">*</span></label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins1" id="ins1" placeholder="???????????????????????????" class="form-control" value="3000">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 "> <label class="mt-3" for="exampleInputPassword1">???????????????????????????????????????????????????????????????<span class="red">*</span></label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="installment2" id="installment2" placeholder="?????????????????????????????????" class="form-control" value="5">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>





                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">?????????????????????????????? 2 ???????????????????????????????????????</label>
                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins2" id="ins2" placeholder="installment 2" class="form-control" value="2180">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">???????????????????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date1" id="date1" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">??????????????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">?????????????????????????????? 3 ???????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins3" id="ins3" placeholder="installment 3" class="form-control" value="2180">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">???????????????????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date2" id="date2" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">??????????????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">?????????????????????????????? 4 ???????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins4" id="ins4" placeholder="installment 4" class="form-control" value="2180">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">???????????????????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date3" id="date3" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">??????????????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">?????????????????????????????? 5 ???????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins5" id="ins5" placeholder="installment 5" class="form-control" value="2180">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">???????????????????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date4" id="date4" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">??????????????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">?????????????????????????????? 6 ???????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="text" name="price_ins6" id="ins6" placeholder="installment 6" class="form-control" value="2180">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">?????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="mt-3" for="exampleInputPassword1">???????????????????????????????????????????????????</label>

                                                    <div class="input-group mb-2">

                                                        <input type="date" name="date5" id="date5" placeholder="installment 2" class="form-control" value="">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">??????????????????</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-danger d-block m-auto">??????????????????</button>
                                </div>
                            </form>
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
                </script>

                <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                <script>
                    $('#installment').keyup(function() {
                        $('#ins2').val('');
                        $('#ins3').val('');
                        $('#ins4').val('');
                        $('#ins5').val('');
                        $('#ins6').val('');


                    });

                    $('#divv').keyup(function() {

                        var ins_price = $('#ins_price').val();
                        var ins_price2 = $('#ins_price2').val();

                        var price = Number(ins_price) + Number(ins_price2);

                        $('#price').val(price.toFixed(2));
                        var installment = $('#installment').val();

                        var ins1 = $('#ins1').val();


                        var allins = (price - ins1) / (installment - 1);
                        var installment2 = installment - 1;

                        $('#installment2').val(installment2);

                        var i = '';

                        for (i = 1; i <= installment2; i++) {

                            $('#ins' + (i + 1)).val(allins.toFixed(0));

                        }

                    });


                    $('#date').change(function() {

$('#date2').val('');
$('#date3').val('');
$('#date4').val('');
$('#date5').val('');

var installment = $('#installment').val();
var installment2 = installment - 1;
var date1 = $('#date').val();

/* $('#date2').val(date1); */




var y = 1;

for (var i = 1; i <= installment2; i++) {


    var today = new Date(date1);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + (1 + i)).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();



    today = yyyy + '-' + mm + '-' + dd;


    if (mm == '02' && dd >= 29) {



        today_new2 = yyyy + '-' + mm + '-' + 28;
        $('#date' + (i)).val(today_new2);
        console.log(today_new2);


    } else if (dd >= '31' && mm == '04' || dd >= '31' && mm == '06' || dd >= '31' && mm == '09' || dd >= '31' && mm == '11') {



        today_new4 = yyyy + '-' + mm + '-' + 30;
        $('#date' + (i)).val(today_new4);

    } else {

        $('#date' + (i)).val(today);

    }




    if (mm >= 13) {

        yyyy = yyyy + 1;



        var today2 = new Date("2021-01-02");


        var mm2 = String(today2.getMonth() + (0 + y)).padStart(2, '0'); //January is 0!


        var today_new = yyyy + '-' + mm2 + '-' + dd;

        if (mm2 == '02' && dd >= 29) {


            today_new3 = yyyy + '-' + mm2 + '-' + 28;
            $('#date' + (i)).val(today_new3);


        } else if (dd >= '31' && mm2 == '04' || dd >= '31' && mm2 == '06' || dd >= '31' && mm2 == '09' || dd >= '31' && mm2 == '11') {



            today_new3 = yyyy + '-' + mm2 + '-' + 30;
            $('#date' + (i)).val(today_new3);








        } else {

            $('#date' + (i)).val(today_new);

        }


        /*  $('#date' + (1 + i)).val(today_new);
         */
        y = y + 1;





    } else {
        /* $('#date' + (1 + i)).val(today); */
    }


}

                    });
                </script>





                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script type="text/javascript" src="ajax-script.js"></script>
</body>

</html>