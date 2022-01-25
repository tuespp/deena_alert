<?php
require_once('../dbconnect.php');

@ini_set('display_errors', '0');
$_SESSION['oa_id'] = $_GET['oa_id'];




if (isset($_POST['submit'])) {

    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM users_info 
                  WHERE  username='" . $username . "' 
                  AND  password='" . $password . "' ";

    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!empty($row)) {

        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["address"] = $row["address"];
        $_SESSION["tel"] = $row["tel"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["level"] = $row["level"];
        $_SESSION["img"] = $row["img"];

        header("location: index.php");

        // if($_SESSION['level'] == 'admin'){
        //     header("location: index.php");
        // }
        // if($_SESSION['level'] == 'employee'){
        //     header("location: index.php");
        // }
        // if($_SESSION['level'] == 'member'){
        //     header("location: index.php");
        // }

    } else {
        echo "<script>";
        echo "alert(\" username หรือ  password ไม่ถูกต้อง\");";
        echo "</script>";
        header('Refresh:0; url=login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<!--===============================================================================================-->
<!--===============================================================================================-->
	
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('../images/macos-monterey-wwdc-21-stock-dark-mode-5k-6016x6016-5585.jpg');">
		
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<img style="display: block; margin: auto; ;" src="../images/LOGODEENA-หนา-1.jpeg" alt="" width="80" >

			<form class="login100-form validate-form" action="" method="post">
				<span class="login100-form-title p-b-37" >
					Sign in
				</span>
				
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email" >
                <input class="input100" type="text" class="form-control" placeholder="Username" name="username" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                <input class="input100" type="password" class="form-control" placeholder="Password" name="password" required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="submit">
						Sign In 
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>

				

			
			</form>
            <div class="flex-c p-b-112">
					<a class="login100-form-btn2" href="line_login.php">
						Sign In With Line &nbsp;&nbsp;&nbsp; <i class="fab fa-line" style="font-size: 1.5rem;"></i>
					</a>
					
					
				</div>
			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	

    <!-- /.login-box -->

   
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>

    <script>
        function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
            console.log('statusChangeCallback');
            console.log(response); // The current login status of the person.
            if (response.status === 'connected') { // Logged into your webpage and Facebook.
                /*  window.location.href = "index.php"; */
                
                testAPI();
            } else { // Not logged into your webpage or we are unable to tell.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this webpage.';
            }
        }


        function checkLoginState() {


            // Called when a person is finished with the Login Button.
            FB.getLoginStatus(function(response) { // See the onlogin handler
                statusChangeCallback(response);
            });


        }


        window.fbAsyncInit = function() {
            FB.init({
                appId: '321524643188530',
                /*  access_token : 'e11d118b39609e56ce6981467622eada', */
                cookie: true, // Enable cookies to allow the server to access the session.
                xfbml: true, // Parse social plugins on this webpage.
                version: 'v12.0' // Use this Graph API version for this call.
            });


            FB.getLoginStatus(function(response) { // Called after the JS SDK has been initialized.
                statusChangeCallback(response); // Returns the login status.
            });


        };

        function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=id,name,email,first_name,picture', function(response) {
                console.log('Successful login for: ' + response.name);
                console.log('Successful login for: ' + response.id);
                console.log('Successful login for: ' + response.email);

                console.log(response.picture);

                console.log(response.picture.data.url);

               


                $(document).ready(function() {
                   
                    var id = response.id;
                    var name = response.name;
                    var email = response.email;
                    var picture = response.picture.data.url;
                   

                    $.ajax({
                        type: "POST",
                        url: "../backend/facebook_insert.php",
                        data: 
                        {
                            id: id, name: name, email: email, picture: picture
                        },

                        success: function(data) {
                            console.log(data);
                            
                            window.location.href = "index.php";
                        }
                    });



                });

            });


        }

       
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>


<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v12.0&appId=321524643188530&autoLogAppEvents=1" nonce="fhMla018"></script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

</body>

</html>