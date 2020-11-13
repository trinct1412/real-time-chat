
<?php
session_start();
if (isset($_GET['do'])&& $_GET['do']=='logout'){
    unset($_SESSION['user_Id']) ;
    unset($_SESSION['user_Name']);
    unset($_SESSION['user_Email']);
    unset($_SESSION['user_Pass']);
    unset($_SESSION['user_Image']);
    header('Location: Login.php');
}
?>