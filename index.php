<!<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ChatBox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="static/css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="static/css/avatar.css">
   <style>
   .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
   </style>
</head>
<body>

    <?php 
    if (!isset($_SESSION['user_Id'])) {
            header('Location: Login.php');
    }
   else{
            require_once("user.php");
            $current_User = new user();
            $current_User->setter_User_Id($_SESSION['user_Id']) ;
            $current_User->setter_User_Name($_SESSION['user_Name']);
            $current_User->setter_User_Email($_SESSION['user_Email']);
            $current_User->setter_User_Pass($_SESSION['user_Pass']);
            $current_User->setter_User_Image($_SESSION['user_Image']);
            require_once("chanel.php");
            $current_chanel = new chanel();
            require_once("modal.edituser.php");
    }
   ?>

  <header>
  <header class="w3-sidebar-top w3-white w3-animate-top w3-text-black w3-collapse w3-top w3-center shadownavtop" id="mySidebar">
            <div class="container-fluid">      
        <div class="row">
                     <div class="col-lg-1 col-xs-1 col-md-1 coi-sm-1" style="padding-top: 20px"> 
                         <a href="index.php"><i style="font-size:50px;top:-15px" class="fa fa-comments"></i></a>  </div>
                    <div class="col-lg-6 col-xs-7 col-md-5 coi-sm-7">
                        <ul id="menu-flat" class="list-inline" style="float: left">
                                <li><a href="index.php" class="btn btn-lg"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                                <li><a href="#" class="btn btn-lg"><i class="glyphicon glyphicon-cd"></i> Test 1</a></li>
                                <li><a href="#" class="btn btn-lg"><i class="glyphicon glyphicon-music"></i> Test 2</a></li>
                            </ul>
                     </div>
                      <div class="col-lg-5 col-xs-4 col-md-6 col-sm-4">
                            <ul class="list-inline" style="float: right;position: relative;left: 0;display: inline;">
                            <a style="position: relative;float: right;" data-toggle="collapse" href="#thaotac" class=" boxshadownimgforavatar"><img class="img-reponsive border rounded-circle" style="border-radius:50%" src=" <?php echo $current_User->getter_User_Image(); ?>" width="50px" height="50px" alt=""><h4 style="float:right;"><?php echo $current_User->getter_User_Name(); ?></h4></a>
                                <ul class="panel-colllapse collapse"  style="position: absolute;top: 55px;left: 40%;" id="thaotac">                                
                                    <li>
                                        <button data-toggle="modal" data-target="#thongtinuser" style="text-align: center;background-color: #1d1d1d;border-radius: 5px;border:2px solid #eff4ff;width:120px;height:40px" ><span style="color:white"> <i  class="glyphicon glyphicon-user"></i> Thông Tin</span></button>
                                    </li>
                                    <li>
                                    <a href="logout.php?do=logout"><button data-toggle="modal" data-target="#dangxuat" style="height:40px;text-align: center;background-color: #1d1d1d;border-radius: 5px;border:2px solid #eff4ff;width:120px;" ><span style="color:white"><i  class="glyphicon glyphicon-log-out"></i> Đăng Xuất</span></button></a>
                                    </li>
                                    
                                </ul>

                            
                            </ul>
                     </div>
        </div>
            
       
      </header>
      <div class="spacer">
          &nbsp;
      </div>
      <!-- Top menu on small screens -->
      <header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16" id="topsmallmenu">
       
                <div class="container-fluid" >      
                        <div class="row">
                                     <div class="col-lg-2 col-xs-2 col-md-2 coi-sm-2" style="padding-top: 30px"> 
                                         <a href=""><i style="font-size:50px;" class="fa fa-comments"></i></a>  </div>
                                
                                    <div class="col-lg-2 col-xs-2 col-md-2 coi-sm-2" style="padding-top: 30px;float:right">
                                            <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">&#9776;</a>
                                    </div>
                        </div>     
                        </div>
      </header>
      
      <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-black w3-collapse w3-top w3-center" style="z-index: 3; width: 300px; font-weight: bold; display: none;" id="mySidebarleft"><br>
        <div class="site-name">      
         <h3 class="w3-padding-bottom-30 w3-center">
         <?php echo "Welcome " ."<h4 style=".'"'."color:red;".'"'.">" . $current_User->getter_User_Name() ."</h4>"." come to App Chat "; ?>
                </h3>
            <div class="description"><p>Chat Together</p></div>
            </div> 
                  
                                    <ul id="menu-flat" class="menu-flatwide" style="float: left;list-style-type:none" >
                                            <li><a href="index.php" class="btn btn-lg"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                                            <li><a href="#" class="btn btn-lg"><i class="glyphicon glyphicon-cd"></i> Test 1</a></li>
                                            <li><a href="#" class="btn btn-lg"><i class="glyphicon glyphicon-music"></i> Test 2</a></li>
                                            <li><a href="logout.php?do=logout" class="btn btn-lg"><i class="	glyphicon glyphicon-log-out"></i> logout</a></li>
                                            <li><img class="img-reponsive border rounded-circle" style="border-radius:50%" src=" <?php echo $current_User->getter_User_Image(); ?>" width="50px" height="50px" alt=""></li>
                                           <li><h4><?php echo $current_User->getter_User_Name(); ?></h4></li>
                                        </ul>
                
                               
      </nav>
      
      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
       
    </header>

<!-- noi dung conversation -->
      <article>
    <div class="row">
    
    <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2" id="chat">
            <div> <h3 style="text-align:center">List Register</h3> </div>
            <?php $current_User->get_List_User(); ?>
    </div>
    
    <div class="col-lg-7 col-sm-7 col-xs-7 col-md-7" id="conversation" style="height:890px">
    <div> <h3 style="text-align:center">conversation </h3></div>
    <div style="position:relative;border:1px solid black;background-color: #f1f1f1;padding: 30px;height: 800px;overflow: scroll;">
    <div class="converstt">
        <?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $localtime=date("h:i:s");
        require_once("mess.php");
        if(empty($_GET['mess_Id'])){
            if(!empty($_GET['user_Id'])){
            $current_mess = new mess($current_User->getter_User_Id(),$_GET['user_Id'],"00:00:00");
            if($current_mess->get_and_check_mess_id()){
                $current_mess->insert_Mess();
            }
            else{
                require_once("reply.php"); 
                $reply = new reply();
                $reply->setter_Mess_Id($current_mess->getter_Mess_Id());
                $reply->Show_Content($current_User->getter_User_Id());
                if(isset($_POST["send"])){
                   if(empty($_POST["send"])){
                    $buffer = json_encode(['messid'=>$current_mess->getter_Mess_Id(),'img'=>$_SESSION['user_Image'],'username'=>$current_User->getter_User_Name(),'mess'=>$_POST['textchat'],'time'=>$localtime ,'useridRC'=> $current_mess->get_rest_of_userid_by_mess_id($_SESSION['user_Id'])]);   
                    if($current_chanel->send($buffer)){              
                    $reply->setter_User_Id($current_User->getter_User_Id());      
                    $reply->setter_Content($_POST['textchat']);
                    $reply->create_reply();
                    $current_mess->update_last_mess($current_User->getter_User_Image(),$current_User->getter_User_Name());
                }
                   }
               }
            }   
        }
        else {
            echo "moi ban chon nguoi muon chat.";
        }         
        }
        else{
        require_once("reply.php"); 
         $current_mess = new mess(0,0,"00:00:00");
         $current_mess->setter_Mess_Id($_GET['mess_Id']);
         $reply = new reply();
         $reply->setter_Mess_Id($_GET['mess_Id']);
         $reply->Show_Content($current_User->getter_User_Id());
         if(isset($_POST["send"])){
            if(empty($_POST["send"])){
                $buffer = json_encode(['messid'=>$_GET['mess_Id'],'useridsend'=>$_SESSION['user_Id'],'img'=>$_SESSION['user_Image'],'username'=>$current_User->getter_User_Name(),'mess'=>$_POST['textchat'],'time'=>$localtime ,'useridRC'=> $current_mess->get_rest_of_userid_by_mess_id($_SESSION['user_Id'])]);   
                if($current_chanel->send($buffer)){              
                $reply->setter_User_Id($current_User->getter_User_Id());      
                $reply->setter_Content($_POST['textchat']);
                $reply->create_reply();
                $current_mess->update_last_mess($current_User->getter_User_Image(),$current_User->getter_User_Name());
            }
        }
        }
    }
         ?>
         <div id="rtconversation"></div>
   </div>

   
    

    </div>
    <div class="msj-rta macro" style="    margin: auto;width: 100%;right: 0px;border: 1px solid black;border-radius:0;border-top:none">                        
                    <div class="text text-r" style="background:whitesmoke !important;width:95.5%">
                        <form id="sendata" action="" method="POST">
                        <input class="mytext" name="textchat" style="width:100%" placeholder="Type a message"/>
                        <input type="hidden" name="send" id="send" >
                        </form>
                    </div> 
                </div>
     </div>
     <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
          <div> <h3 style="text-align:center">Messenger</h3> </div>
          <div style="position: relative;left:0">
        <input type="text" class="form-control" style="width: 100%;height: 35px;" placeholder="Find user Chatted">
        <div style="position: absolute;top:7px;right: 5px">
        <button type="submit" style="border: 0;outline: none"> <i class="glyphicon glyphicon-search"></i></button></div>
      </div>
        <div id="chatted">  <?php $current_User->get_user_chatted(); ?>  
        <div id="newchatted"></div>
        </div>
    </div>
    
    </div>
</article>

<!-- noi dung conversation -->
    
    <script>
            // Script to open and close sidebar
            function w3_open() {
                document.getElementById("mySidebar").style.display = "none";   
                document.getElementById("mySidebarleft").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }
             
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
                document.getElementById("mySidebarleft").style.display = "none";
            }
            
            // Modal Image Gallery
            function onClick(element) {
              document.getElementById("img01").src = element.src;
              document.getElementById("modal01").style.display = "block";
              var captionText = document.getElementById("caption");
              captionText.innerHTML = element.alt;
            }
            
            
            </script>
            
            <script type="text/javascript">
             $(".mysidebar .widget_meta .widgettitle").click(function(){
                 $(".mysidebar .widget_meta ul").slideToggle();
            
            });
            </script>
            
           
            <script>
        
        function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
 
function check_id_chatted(messid){
                            var idarray = $("#chatted").find("a").map(function() { return this.id; }).get();
                            for( i in idarray){
                            if(idarray[i].toString() == messid.toString())
                                    return  true;
                                }
                            return false;
                        }
       
        (function a(){
            $.ajax({
                url:'http://localhost:3001/?key=<?=session_id()?>&userid=<?=$_SESSION['user_Id']?>',
                type:'get',
                dataType:'json',    
                success:function(data){
                    if(!check_id_chatted("messid"+data.messid.toString())){
                          $('#chatted #newchatted').append("<a href=index.php?mess_Id=" +data.messid.toString()+" " + "id=messid"+data.messid.toString()+"> <div class=container> <img style=float: left; src="+ data.img.toString()+" alt=Avatar> <div class=username><strong>"+data.username.toString()+"</strong></div><div class=replyid id=><div id=lastcontent> <strong>"+data.mess.toString()+"</strong></div><div id=lasttime><strong>"+data.time.toString()+"</strong></div></div> </div> </a>");
                        }    
                        else{
                    var x = '#messid'+ data.messid.toString() + ' .container .replyid #lastcontent'; 
                    var y = '#messid'+ data.messid.toString() + ' .container .replyid #lasttime'; 
                    $(x).html("<strong>"+data.username.toString()+ " : "+data.mess+"</strong>");
                    $(y).html("<strong>"+data.time.toString()+"</strong>");
                    if(getQueryVariable("mess_Id").toString()===data.messid.toString()||getQueryVariable("user_Id").toString()===data.useridsend.toString()){
                       $( "#rtconversation" ).append("<div class=Container> <img src="+data.img.toString()+" class=right alt=Avatar><strong style=float:right>"+data.username.toString()+"</strong><p>"+data.mess.toString()+"</p> <span class=time-left>"+data.time.toString()+"</span>  </div>");
                    }
                }
                  console.log( data.username + " send mess : " +data.mess + " "+data.time);
                },complete:a
            });
        })();
     </script>
    <script>
    $(document).ready(function(){
       var $array_user_chatted = $('#chatted').find('.container').text();
      // .each(function(){
        	alert(array_user_chatted.html());
       //});
    });
    </script>


</body>
</html>