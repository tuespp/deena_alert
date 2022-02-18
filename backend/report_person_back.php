<?php

require_once('../dbconnect.php');

$oa_id = $_POST['oa_id'];

$sql2 = "SELECT * FROM users_info WHERE oa_id = '$oa_id' ";
$result2 = mysqli_query($con, $sql2);
?>


<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">รายงาน</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form action="../page/report_person_detail.php" method="POST">

        <div class="card-body">
            <div class="col-sm-12">
                <!-- select -->
                <div class="form-group">

                    <div id="detail" style="display: none;" class="text-right">
                    </div>
                </div>

            </div>
            <input type="text" hidden name="oa_id" value="<?php echo $oa_id ?>">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"> CheckAll</th>
                        <th>Name</th>



                    </tr>
                </thead>
                <tbody>

                    <?php while ($row = mysqli_fetch_array($result2)) { ?>
                        <tr>
                            <td><input type="checkbox" id="line_id" class="line_id" name="line_id[]" value="<?php echo $row['user_id']; ?>"></td>




                            <td><input type="text" name="name[]" value="<?php echo $row['name']; ?>" hidden> <?php echo $row['name']; ?></td>



                        </tr>


                    <?php  } ?>
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->


        <div class="card-footer">
            <button type="submit" name="submit" id="submit" class="btn btn-danger d-block m-auto">ถัดไป</button>
        </div>

    </form>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 -->
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
</script>