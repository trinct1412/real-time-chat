
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome login to ChatApp</title>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="static/css/login.css">
 
  </style>
</head>
<body>

  
<?php
    require_once("user.php");
    session_start();
    $current_User = new user();
    if(isset($_POST["login"])){
        if(empty($_POST["userEmail"])|| empty($_POST["userPass"])){
            echo "cac o chua duoc dien";
        }
        else{
          $current_User->setter_User_Email($_POST["userEmail"]);
          $current_User->setter_User_Pass($_POST["userPass"]);    
        if($current_User->check_Login()){
            $_SESSION['user_Id'] = $current_User->getter_User_Id();
            $_SESSION['user_Name'] = $current_User->getter_User_Name();
            $_SESSION['user_Email'] = $current_User->getter_User_Email();
            $_SESSION['user_Pass'] = $current_User->getter_User_Pass();
            $_SESSION['user_Image']= $current_User->getter_User_Image();
            header("Location: index.php");           
        }
            else
            echo "that cmn bai";
     }
    }
?>

  <div class="center">
<div id="login">
  <h2 class="headtag">Login To ChatApp</h2>
   <div class="eye">
      <div class="shut"></div>
      <div class="ball">
      <div class="shine"></div>
      </div>      
   </div>
   <!-- <div class="mouth">
   </div> -->
   <form action="login.php" method="POST">
   <span class="icon"><i class="fa fa-user"></i></span>
   <input type="text" name="userEmail" placeholder="Your User Email">
   <br />
   <span class="icon lock"><i class="fa fa-lock"></i></span>
   <input type="password" name="userPass" placeholder="Your Password">
   
   <div class="btns">
        <a class="btn-login" href="register.php" style="color:rgb(146, 146, 146)"> register </a>
      <input type="submit" name="login" class="btn-login" value="Login" />
   </div>
    </form>
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
   <script type="text/javascript" src="static/js/login.min.js"></script>
</body>

</html>
