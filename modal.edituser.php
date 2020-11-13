<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
       
      $expensions= array("jpeg","jpg","png");
       
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
      }
       
      if($file_size > 2097152) {
         $errors[]='Kích thước file không được lớn hơn 2MB';
      }
      
      $_SESSION['user_Name']=$_POST["userName"];
      $current_User->setter_User_Name( $_SESSION['user_Name']);
      $_SESSION['user_Email']=$_POST["userEmail"];
      $current_User->setter_User_Email($_SESSION['user_Email']);

      if(empty($file_name)){
      $current_User->update_User();
      }
      else{
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         $_SESSION['user_Image']="images/".$file_name;
         $current_User->setter_User_Image($_SESSION['user_Image']);
         $current_User->update_User();
         echo '<script type="text/javascript">alert("Success");</script>';
      }else{
        echo '<script type="text/javascript">alert("thất bại");</script>';
      }
    }

   }
?>

<div>
  <div class="modal fade" id="thongtinuser" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">Thông Tin Người Dùng</h4>
        </div>
        <form action ="" method = "POST" enctype = "multipart/form-data">
        <div class="modal-body" style="padding:20px">
          <div>
            <table class="col-lg-8 col-sm-8 col-xs-8 col-md-8" style="top:45px;">
              <tr>
                <th style="padding-bottom: 20px">Tên Bạn :</th>
                <td style="padding-bottom: 20px"><input type="text" name="userName" value="<?php echo $current_User->getter_User_Name();?>" style="width: 80%"></td>
              </tr>
              <tr>
                <th style="padding-bottom: 20px">Email:</th>
                <td style="padding-bottom: 20px"><input type="text" name="userEmail" style="width: 80%" value="<?php echo $current_User->getter_User_Email();?>"></td>
              </tr>
            
              <tr>
                <th style="padding-bottom: 20px">Password</th>
                <td style="padding-bottom: 20px"><input type="password" name="userPass" value="<?php echo $current_User->getter_User_Pass();?>" style="width: 80%" disabled></td>
              </tr>
            </table>
            <table class="col-lg-3 col-sm-3 col-xs-3 col-md-3" style="margin-top:20px">
              <tr>
                <td><img class="flip animated boxshadownimg img-thumbnail" src="<?php echo $current_User->getter_User_Image();?>" style="width: 150px;height: 150px" alt=""></td>
              </tr>
              <tr>
                <td>
                <span class="btn btn-info btn-file" style="margin-left: 20%;margin-top: 10px"> Browse <input type = "file" name = "image" /></span>
                </td>
              </tr>
              <tr>
                <td><h4 style="text-align:center">Ảnh Đại Diện</h4></td></tr>
            </table>
            
          </div>  
        </div>
        <div class="modal-footer" style="clear:left;position:relative;top:10px">
          <input type="submit" class="btn btn-success" value="Cập Nhật" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
</div>