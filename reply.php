<?php
require_once("mess.php");
require_once("user.php");
class reply{
    private $mess_Id;
    private $user_Id_Rp;
    private $content;
    private $time;


    public  function cr_reply($mess_id,$user_id_rp,$content){
        $this->mess_Id=$mess_id;
        $this->user_Id_Rp=$user_id_rp;
        $this->content=$content;
    }

    public function getter_Content(){
        return $this->content;
    }

    public function setter_Content($content){
        $this->content=$content;
    }
    
    public function getter_User_Id(){
        return $this->user_Id_Rp;
    }

    public function setter_User_Id($user_Id){
        $this->user_Id_Rp=$user_Id;
    }

    public function getter_Mess_Id(){
        return $this->mess_Id;
    }

    public function setter_Mess_Id($mess_Id){
        $this->mess_Id=$mess_Id;
    }

    public function reply(){

    }
    // $user_Id_Rp = current user
    public function create_reply(){
        $dt=new database();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $localtime=date("h:i:s");
        $result=$dt->command("INSERT INTO `REPLY`(`mess_Id`, `user_Id_Rp`, `content`, `time`) VALUES ('$this->mess_Id','$this->user_Id_Rp','$this->content','$localtime')");
        
    }

   

    public function Show_Content($CurrentUserID){
        $dt =  new database();
        $dt->select("SELECT m.mess_Id,r.content,r.time,r.user_Id_Rp,u.user_Image,r.reply_Id,u.user_Name FROM MESS m, REPLY r, USER u WHERE m.mess_id = r.mess_Id AND r.user_Id_Rp = u.user_Id AND m.mess_id='$this->mess_Id' ORDER BY r.reply_Id ASC ");
        while ($row = $dt->fetch()){    
            if ($CurrentUserID == $row["user_Id_Rp"]){
            echo " <div class=".'"Container Darker"'.">";
            echo "<img src = " . '"' . $row["user_Image"] . '"' . " alt = " . '"Avatar"' .">";
            echo "<strong class=" . '"' . "float:left" . '"'.">". $row["user_Name"] . "</strong>"; 
            echo   "<p style=".'"float:right;"'.">". $row["content"] ."</p>";
            echo  " <span class=" . '"time-right"' .">". $row["time"] . "</span>";
            echo "  </div>";      
        }
            else{
                echo " <div class=".'"Container"'.">";
                echo "<img src = " . '"' . $row["user_Image"] . '"' . "class = " . '"right"' . " alt = " . '"Avatar"' .">"; 
                echo "<strong style=" . '"' . "float:right"  . '"'.">". $row["user_Name"] . "</strong>";
                echo   "<p>". $row["content"] ."</p>";
                echo  " <span class=" . '"time-left"' .">". $row["time"] . "</span>"; 
                echo "  </div>";           
            }
    }
    }
}

?>