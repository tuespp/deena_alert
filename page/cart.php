<?php
require('../env.php');
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--ปรับแต่ง-->
    <style>
        .w3-sidebar a {
            font-family: "Roboto", sans-serif
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,

        .w3-wide {
            font-family: "Montserrat", sans-serif;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>


</head>

<body>

    <!--แถบบาร์บน-->
    <div class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="nav-link" href="compare.php">Back</a>
    </div>

    <!--ตาราง-->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h1 class="text-center pt-5">Product Data</h1>
                <table class="table table-bordered">

                    <tbody>
                        <thead class="content">
                            <tr>
                                <th class="w3-cyan">ลำดับ</th>
                                <th class="w3-cyan">ชื่อสินค้า</th>
                                <th class="w3-cyan">รูปสินค้า</th>
                                <th class="w3-cyan">รายละเอียดสินค้า</th>
                                <th class="w3-cyan">ราคาสินค้า</th>
                                <th class="w3-cyan">ลบ</th>

                            </tr>

                            <?php
                            $i = 0;
                            $i++;
                            $total_price = 0;
                            $sql = "SELECT * FROM custom_p";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['p_name']; ?></td>
                                    <td><img src="<?php echo $row['p_image']; ?>" width="150px" height="150px"> </td>
                                    <td><?php echo $row['p_detail']; ?></td>
                                    <td><?php echo $row['p_price']; ?> บาท</td>
                                    <td><a href="../backend/delete.php?id=<?php echo $row['p_id']; ?>">Delete</a></td>
                                </tr>

                            <?php

                                $total_price = $total_price + $row['p_price'];

                            }
                            ?>
                        </thead>
                    </tbody>
                </table>
                <div class="text-right">
                    <h5><b>ราคารวมทั้งสิ้น</b>   <span class=""><?= $total_price ?></span> <b>บาท</b> </h5>
                    <button onclick="payment()" class="btn btn-primary">ชำระเงิน</button>
                </div>
                <!--พิมพ์-->
                <div class="text-center">
                    <button onclick="window.print()" class="btn w3-cyan">Print</button>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>

</body>

<script>
    function payment(){
        alert('จ่ายเงินนะ');
        window.location.href = "<?= $path_line?>payment_method.php?amount=<?= $total_price?>";
    }
</script>

</html>