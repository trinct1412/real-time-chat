

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Register Account</title>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="static/css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
  </style>
</head>
<body>
    <?php
     require_once("user.php");
         if(isset($_POST['register'])){
           if (isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPass']) && isset($_POST['userImage'])){
            echo '<script type="text/javascript">alert("không được để trống các ô");</script>';
           }
           else{
            $register_User = new user();    
            $register_User->setter_User_Name($_POST['userName']);
            $register_User->setter_User_Email($_POST['userEmail']);
            $register_User->setter_User_Pass($_POST['userPass']);
            $register_User->setter_User_Image($_POST['userImage']);
            $register_User->insert_User();
            header('Location: login.php');
           }
        }
    ?>
  <div class="center">
<div id="login">
  <h2 class="headtag">Register Account</h2>
   <div class="eye">
      <div class="shut"></div>
      <div class="ball">
      <div class="shine"></div>
      </div>      
   </div>
   <!-- <div class="mouth">
   </div> -->
   <form  style="margin-top: 232px;" action="register.php" method="POST">
   <span class="icon"><i class="fa fa-user"></i></span>
   <input style="    margin-top:0;" type="text" name="userName" placeholder="Your Name">
   <br />
   <span class="icon"><i class="fa fa-user"></i></span>
   <input style="    margin-top:0;" type="text" name="userEmail" placeholder="Your User Email">
   <br />
   <span class="icon lock"><i class="fa fa-lock"></i></span>
   <input style="    margin-top:0;    margin-bottom: 30px;" type="password" name="userPass" placeholder="Your Password">
   <br/>
   <span class="icon"><i class="fa fa-picture-o"></i></span>
   <input style="    margin-top:0; margin-bottom: 0px;" type="text" name="userImage" placeholder="input in file online begin http://">
   <br/>
   <div class="btns">
      <input type="submit" name="register" class="btn-login" value="register" />
   </div>
    </form>
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
   <script type="text/javascript" src="static/js/login.min.js"></script>

</body>

</html>
