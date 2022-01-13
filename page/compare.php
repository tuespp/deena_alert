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
  <title>Compared Products</title>
  <link rel="stylesheet" href="../css/style.css">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="height: 100vh;">

  <nav class="w3-sidebar w3-bar-block w3-cyan w3-collapse w3-top" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
      <a href="index.php" class="w3-bar-item w3-button">
        <div class="img-logo">
          <img src="../img/logo.jpg">
        </div>
      </a>
      <h3>CART PRODUCTS</h3>
    </div>

    <div class="w3-wide menu">
      <a href="cart.php">Cart</a>
    </div>
  </nav>

  <nav class="mobile">
    <div class="w3-container w3-display-container w3-padding-16">
      <a href="index.php" class="w3-bar-item w3-button">
        <div class="img-logo">
          <img src="../img/logo.jpg">
        </div>
      </a>
      <h3>CART PRODUCTS</h3>
    </div>

    <div class="w3-wide menu">
      <a href="cart.php">Cart</a>
    </div>
  </nav>
  <!--ขยับเนื้อหา-->
  <div class="w3-main">

    <!--หัว-->
    <header id="products">
      <div class="w3-light-grey w3-content">
        <h1>Products</h1>
        <!-- <div class="w3-section w3-bottombar w3-padding-16">
            <span class="w3-margin-right"></span>
            <button onclick="compage()" class="w3-button w3-green"><i class="fa fa-diamond w3-margin-right">
            </i>COMPARE</button>
          </div> -->
      </div>
    </header>

    <!-- สินค้า -->
    <div class="w3-row container-item">
      <!--ดึง table_p มา-->
      <?php
      $sql = "SELECT * FROM table_p ORDER BY p_id ASC";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <!--แถวสินค้า-->
        <div class="box">
          <div class="w3-container">
            <div class="item">
              <div class="w3-display-container item-img">
                <div class="img">
                  <img src="<?php echo $row['p_image']; ?>">
                  <div class="w3-display-middle w3-display-hover">
                    <button onclick="document.getElementById('<?php echo $row['p_id']; ?>').style.display='block'">
                      View <i class="fa fa-shopping-cart"></i>
                    </button>
                    <div class="checkbox">
                      <!--ปุ่มเลือกเปรียบเทียบ-->
                      <input onclick="addProduct('<?= $row['p_name'] ?>',
                      '<?= $row['p_price'] ?> $',
                      '<?= $row['p_detail'] ?>',
                      '<?= $row['p_image'] ?>')" name="pid" class="more" href="#" type="checkbox" data-toggle="modal" data-target="#myModal">
                      <span class="ProdId" style="display:none">
                        <?php echo $row['p_name']; ?>
                      </span>
                      <span class="ProdPrice" style="display:none">
                        <?php echo $row['p_price']; ?> $
                      </span>
                      <span class="ProdIdImg" style="display:none">
                        <?php echo $row['p_image']; ?>
                      </span> เลือกเปรียบเทียบ
                    </div>
                  </div>
                </div>
              </div>
              <div class="item-detail">
                <div class="detail">
                  <p><span class="name"><?php echo $row['p_name']; ?></span></p>
                  <span><?php echo $row['p_price']; ?> $</span>
                </div>
                <form method="post" action="../backend/add.php?id=<?php echo $row['p_id'] ?>">
                  <button onclick="alert('เพิ่มสินค้าสำเร็จ')" class="" type="submit"><i class="material-icons">add_shopping_cart</i></button>
                </form>
              </div>



            </div>
          </div>
        </div>

        <!-- view สินค้า-->
        <div id="<?php echo $row['p_id']; ?>" class="w3-modal">
          <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
              <i name="p_id" onclick="document.getElementById('<?php echo $row['p_id']; ?>').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
              <h2 class="w3-wide"><?php echo $row['p_name']; ?></h2>
              <img src="<?php echo $row['p_image']; ?>" style="width:25%; height:25%">
              <p>
                <?php echo $row['p_name']; ?><br>
                <?php echo $row['p_detail']; ?><br>
                <?php echo $row['p_price']; ?> $</br>
              </p>
            </div>
          </div>
        </div>

      <?php
      }
      ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="text-center">ตารางเปรียบเทียบสินค้า</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!--พิมพ์-->
          <div id="printThis">
            <div class="modal-body">
              <table class="table text-center table-bordered" id="table">
                <thead>
                  <tr>
                    <!-- <button type="button" class="close">&times;</button> -->
                    <th scope="col">#</th>
                    <th scope="col">สินค้าที่ 1 </button></th>
                    <th scope="col">สินค้าที่ 2 </button></th>
                    <th scope="col">สินค้าที่ 3 </button></th>
                  </tr>
                </thead>
                <tbody>
                  <!--สร้าง td ตามชื่อ id -->
                  <tr id="myProductImage">
                    <th scope="row">รูปภาพ</th>

                  </tr>
                  <tr id="myProductName">
                    <th scope="row">ชื่อสินค้า</th>

                  </tr>
                  <tr id="myProductDetail">
                    <th scope="row">รายละเอียดสินค้า</th>

                  </tr>
                  <tr id="myProductPrice">
                    <th scope="row">ราคาสินค้า</th>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!--ปุ่ม print-->
          <div class="modal-footer">
            <button id="btnPrint" type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModal">
              Generate PDF
            </button>
          </div>
        </div>

      </div>
    </div>


  </div>
  <!--footer-->
  <footer class=" footer w3-container w3-dark-grey w3-padding-32 w3-margin-top">
    <div class="wrapper">
      <count>Select 0 of 3.</count>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        เปรียบเทียบ
      </button>
    </div>
    <!-- <a href="\compare.html?a=123&b=124&c=125">Compare</a> -->
    <div name="text" id="container" class="hidden select-card"></div>
  </footer>
</body>

<!--http://jsfiddle.net/DBfKz/-->

<!-- ทำงานเลือกเปรียบเทียบสินค้า -->
<script>
  function getSelectedIds() {
    return $('.card .prod-id').map(function() {
      return $(this).text();
    }).toArray();
  }

  function updateLinkAndCounter() {
    var ids = getSelectedIds().map(function(x, i) {
      return ['P', ++i, '=', x].join('');
    });
    // $('#container > a').attr('href', 'Compare.html?' + ids.join('&'));
    $("count").text(ids.length == 1 ? 'Select 1 of 3.' : 'Select ' + ids.length + ' of 3.');
  }

  $(".more").click(function() {
    var id = $(this).next('.ProdId').html();
    console.log(id);
    var img = $(this).nextAll('.ProdIdImg').html();
    console.log(img);
    var price = $(this).nextAll('.ProdPrice').html();
    console.log(price);

    var selected = getSelectedIds();
    if (selected.length == 3) return; // กำหนดรับ 3 ตัว
    if (selected.indexOf(id) != -1) return; // กำหนดให้เลือกไม่ซ้ำกัน
    if (selected.indexOf(img) != -1) return; // กำหนดให้เลือกไม่ซ้ำกัน

    $('<div/>', {
        'class': 'card'
      })
      .append($('<img />', {
        class: 'prod-img',
        src: img,
        width: '54px',
        height: '54px'
      }))
      .append($('<span/>', {
        class: 'prod-id',
        text: id
      }))
      .append($('<span/>', {
        class: 'prod-price',
        text: price
      }))
      // .append($('<a href="#"><i class="fas fa-times"></i></a>', {}))

      .append($('<a/>', {
        href: "#",
        class: 'fas fa-times '
      }))

      .appendTo('#container');


    updateLinkAndCounter();
    $("#container").removeClass("hidden");

    $(".card a").on("click", function(event) {
    event.preventDefault();
    $(this).parent().remove();
    updateLinkAndCounter();
  });

  });
</script>

<!--ทำงาน gen PDF-->
<script>
  document.getElementById("btnPrint").onclick = function() {
    printElement(document.getElementById("printThis"));
  }

  function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
      var $printSection = document.createElement("div");
      $printSection.id = "printSection";
      document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "Deena Report";
    $printSection.appendChild(domClone);
    window.print();
  }
</script>

<!--นำข้อมูลมาแสดงในตารางเปรียบเทียบ-->
<script>
  var count = 0;

  function addProduct(name, price, detail, img) {
    // var count = document.getElementById('add');

    count++;
    if (count <= 3) {
      // alert(`เพิ่มสินค้า ${name} ในตารางเปรียบเทียบสำเร็จ`);

      let myTName = document.querySelector('#myProductName'); //น้ำไปใส่ในชื่อตารางนี้
      let myName = document.createElement('td'); // สร้าง td
      myName.innerText = name;
      myTName.appendChild(myName);

      let myTPrice = document.querySelector('#myProductPrice');
      let myPrice = document.createElement('td');
      myPrice.innerText = price;
      myTPrice.appendChild(myPrice);

      let myTDetail = document.querySelector('#myProductDetail');
      let myDetail = document.createElement('td');
      myDetail.innerText = detail;
      myTDetail.appendChild(myDetail);

      let myTImg = document.querySelector('#myProductImage');
      let myImage = document.createElement('td');
      myImage.innerHTML = "<img src=" + img + ">";
      myTImg.appendChild(myImage);
      // } else {
      //   alert('ตารางเปรียบเทียบเต็มแล้ว กรุณาล้างตารางเปรียบเทียบก่อน');
    }

  }
</script>

<!--https://stackoverflow.com/questions/44786530/php-product-comparison-table-->