<?php


require_once('../dbconnect.php');
@ini_set('display_errors', '0');

if ($_POST['oa_id'] == null || $_POST['status' == null]) {


    echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบถ้วน');
        window.location = 'report2.php';
        
        </script>";
} else {

    $oa_id = $_POST['oa_id'];
    $status = $_POST['status'];
    $sub_status = $_POST['sub_status'];
}


$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}
$sql = "SELECT * FROM users_info WHERE id= $id ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$sqlp = "SELECT * FROM user_role  ";
$resultp = mysqli_query($con, $sqlp);

$sql_re_type = "SELECT * FROM text_report_type ORDER BY report_type_no";
$result_re_type = mysqli_query($con, $sql_re_type);

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
                        <h1 style="text-transform: uppercase">แจ้งข่าวสาร</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class=" col-md-4">
                    <button class="btn btn-warning" onclick="add_text()" id="add_text">เพิ่มข้อความ</button>
                   
                    <button class="btn btn-success" onclick="add_img()" id="add_img">เพิ่มรูป</button>
                    </div>
                    <div class=" col-md-4">
                        <select class="custom-select" name="report_type" id="report_type">

                            <option class="text-center" value="กรุณาเลือก" selected disabled>กรุณาเลือก</option>

                            <?php foreach ($result_re_type as $value) { ?>

                                <option class="text-center" value="<?php echo $value['report_type_id'] ?>"> <?php echo $value['report_type_name'] ?></option>

                            <?php  } ?>

                        </select>
                    </div>
                </div>
                    <br><br>


                    <!-- <div class="offset-2 col-md-8">

                        <div class="card card-purple">
                            <div class="card-header">
                                <h3 class="card-title">รายงาน</h3>

                            </div>


                            <div> -->
                    <!-- <form target="_blank" action="../backend/report_line2_text.php" method="POST" enctype="multipart/form-data"> -->

                    <div class="card-body" id="form_add">
                        <!-- <div class="col-sm-12">


                                        </div>
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type='text' name='oa_id' hidden value='<?php echo $oa_id ?>'><input type='text' name='status' hidden value='<?php echo $status ?>'><input type='text' name='sub_status' hidden value='<?php echo $sub_status ?>'>

                                            <textarea class="form-control myTextarea" name="text" id="" rows="3" placeholder="Enter ..."></textarea>
                                        </div> -->

                    </div>



                    <!--  <div class="card-footer">
                                        <button type="submit"  class="btn btn-danger d-block m-auto">ส่ง</button>
                                        
                                    </div>
 -->


                    <!-- ------------------------------------------------------------------------------------------- -->
                    <!-- <div class="form-group">
                                        <label class="ml-4">Text</label>

                                        <div class="text-center mt-2" id="form_add_img">

                                            <img class="" id="imageUpload" src="" name="file">
                                            <input type='text' name='oa_id' hidden value='<?php echo $oa_id ?>'><input type='text' name='status' hidden value='<?php echo $status ?>'><input type='text' name='sub_status' hidden value='<?php echo $sub_status ?>'>

                                            <button type="button" class="btn mx-auto d-block my-3 btn-warning" data-toggle="modal" data-target="#exampleModal">
                                                Upload Image
                                            </button>


                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>

                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="file" id="customFile" aria-describedby="inputGroupFileAddon01">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                            <figure class="figure text-center d-none mt-2">
                                                                <img id="imageUpload2" class="figure-img img-fluid rounded" alt="">
                                                            </figure>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div> -->
                </div>




                <!-- <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-danger d-block m-auto">บันทึก</button>
                                    </div> -->
                </form>


                <!-- </div> -->
                <!-- /.card -->

                <!-- 
                        </form>
                    </div>
                </div> -->




            </div>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,

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
    </script>

    <script>
        $(document).ready(function() {

            // Check/Uncheck ALl
            $('#checkAll').click(function() {
                if ($(this).is(':checked')) {
                    $('input[name="line_id[]"]').prop('checked', true);
                } else {
                    $('input[name="line_id[]"]').each(function() {
                        $(this).prop('checked', false);
                    });
                }
            });

            $('input[name="line_id[]"]').click(function() {
                var total_checkboxes = $('input[name="line_id[]"]').length;
                var total_checkboxes_checked = $('input[name="line_id[]"]:checked').length;

                if (total_checkboxes_checked == total_checkboxes) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
            });



        });
        var text_send = 1;

        function add_text() {


            var txt2 =
                "<div class='offset-2 col-md-8' id='form" + text_send + "'>" +

                "<div class='card card-purple'>" +
                "<div class='card-header'>" +
                "<h3 class='card-title'>ข้อความ</h3><div class='text-right'><h6  onclick='delete_text(this)' id='" + text_send + "'><i class='fas fa-times' style='color: white;cursor:pointer ;font-size:25px'></i></h6></div>" +

                "</div>" +


                "<div>" +
                "<form target='_blank' action='../backend/report_line2_text.php' method='POST'  enctype='multipart/form-data'>" +

                "<div class='card-body' >" +
                "<div class='col-sm-12'>" +
                "<div class='card-body'>" +
                "<div class='col-sm-12'>"


                +
                "</div>" +
                "<div class='form-group'>" +
                "<input type='text' name='oa_id' id='oa_id' hidden value='<?php echo $oa_id ?>'><input type='text' name='status' id='status' hidden value='<?php echo $status ?>'><input type='text' id='sub_status' name='sub_status' hidden value='<?php echo $sub_status ?>'>" +
                "<textarea class='form-control' name='text' id='emoji" + text_send + "' required placeholder='Enter ...'></textarea>" +
                "<textarea class='form-control test' name='report_type_id' hidden  required placeholder='Enter ...'></textarea>" +

                "</div>"

                +
                "</div>" +
                "<div >" +

                " <button type='submit' name='submit'  class='btn btn-success d-block m-auto'>ส่ง</button>" +
                "</div>" +
                "</form >" +
                '<hr>' +
                "</div>";






            var c_div = document.createElement("div");
            c_div.innerHTML = txt2;
            $("#form_add").append(c_div);

            var report_name = $('#report_type').val();
            $('.test').val(report_name);

            $(document).ready(function() {


                $("#emoji" + text_send).emojioneArea({
                    pickerPosition: "up"
                });
                console.log(text_send);
                text_send = text_send + 1;


            });


        }

        var img_send = 100;

        function add_img() {

            let str_send = img_send.toString();
            var txt3 =
                '<div class="offset-2 col-md-8" id="form_img' + str_send + '">' +

                '<div class="card card-purple">' +
                '<div class="card-header">' +
                "<h3 class='card-title'>รูปภาพ</h3><span class='text-right'><h6 onclick='delete_img(this)' id='" + str_send + "'><i class='fas fa-times' style='color: white;cursor:pointer ;font-size:25px'></i></h6></span>" +

                '</div>' +
                '<form target="_blank" action="../backend/report_line2_img.php" method="POST" id="form_img' + str_send + '" enctype="multipart/form-data">' +
                '<div class="form-group">' +
                '<div class="card-body">' +
                '<hr>' +
                '<div class="col-sm-12 text-center"  >' +
                '<img id="imageUpload' + str_send + '" src="" name="file"><button type="button" class="btn mx-auto d-block my-3 btn-warning" data-toggle="modal" data-target="#exampleModal' + str_send + '">อัพโหลดรูปภาพ</button>' +
                '<textarea class="form-control test" name="report_type_id" hidden  required placeholder="Enter ..."></textarea>' +


                '<div class="modal fade" id="exampleModal' + str_send + '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>' +

                '</div>' +

                '<div class="modal-body">' +
                '<div class="custom-file">' +
                '<input type="text" name="oa_id" id="oa_id" hidden value="<?php echo $oa_id ?>"><input type="text" name="status" id="status" hidden value="<?php echo $status ?>"><input type="text" id="sub_status" name=sub_status" hidden value="<?php echo $sub_status ?>">' +

                '<input type="file" class="custom-file-input" name="file" id="customFile' + str_send + '" aria-describedby="inputGroupFileAddon01">' +
                '<label class="custom-file-label" id="custom-file-label" for="customFile">Choose file</label>' +
                '</div>' +
                '<figure class="figure text-center d-none mt-2">' +
                '<img id="imageUpload2' + str_send + '" class="figure-img img-fluid rounded" alt="">' +
                '</figure>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>' +
                

                '</div>' +

                '</div>' +
                '</div>' +

                '</div>' +
                '<button type="submit" name="submit"  class="btn btn-success d-block m-auto">ส่ง</button>' +
                '<hr>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</form>' +
                '</div>' +
                '</div>';




            var c_div = document.createElement("div");
            c_div.innerHTML = txt3;
            $("#form_add").append(c_div);

            var report_name = $('#report_type').val();
            $('.test').val(report_name);


            $('#customFile' + str_send).on('change', function() { //selecter class custom และ ดักจับ event(change)
                var fileName = $(this).val().split('\\').pop(); //ดึงค่าข้อมูลของตัว path และแยกข้อมูลด้วย split และใช้ pop ในการแยกข้อมูลด้านหลังสุดของ array
                $(this).siblings('#custom-file-label').html(fileName) //siblings(เลือกทุกอย่างยกเว้นตัวเอง แต่จะเลือกตัวlabel) html(แสดงในส่วนของข้อความออกมา)
                if (this.files[0]) { //ถ้ามีการรับค่าจาก array ของ file
                    var reader = new FileReader() //สร้างฟังก์ชันขึ้นใหม่
                    $('.figure').addClass('d-block') //selecter ไปที่ class figure , add class 'd-block' เพื่อโชว์รูปภาพ
                    reader.onload = function(e) { //เรียกค่าข้อมูลของ file
                        $('#imageUpload' + str_send).attr('src', e.target.result).width(240) //selecter id ของ img และเซ็ต attr ของข้อมูล
                        $('#imageUpload2' + str_send).attr('src', e.target.result).width(240) //selecter id ของ img และเซ็ต attr ของข้อมูล

                    }
                    reader.readAsDataURL(this.files[0]) //อ่านค่าของ array file
                }
            })
            img_send = img_send + 1;
        }

        function delete_text(elem) {

            var id = $(elem).attr("id");
            $("#form" + id + "").remove();
            console.log(id);
        }

        function delete_img(elem) {

            var id = $(elem).attr("id");
            $("#form_img" + id + "").remove();
            console.log(id);
        }

        /* $('#submit').click(function() {




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
        }); */


        function send_line() {


            var text = $("textarea").attr("name");
            var oa_id = $("#oa_id").val();
            console.log(oa_id);

            var status = $("#status").val();
            var sub_status = $("#sub_status").val();

            /* var text = $(text).val(); */
            $.ajax({
                type: "post",
                url: "../backend/report_line2.php",
                data: {

                    text: text,
                    oa_id: oa_id,
                    status: status,
                    sub_status: sub_status

                },

                success: function(data) {

                    console.log(data);


                }
            });
        }
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
                    $('#imageUpload2').attr('src', e.target.result).width(240) //selecter id ของ img และเซ็ต attr ของข้อมูล

                }
                reader.readAsDataURL(this.files[0]) //อ่านค่าของ array file
            }
        })


        $('#report_type').change(function() {

            var report_name = $('#report_type').val();
            $('.test').val(report_name);
            console.log(report_name);

        });
    </script>
</body>

</html>