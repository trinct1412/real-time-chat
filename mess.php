<?php 

require_once("database.php");
class mess{
    private $mess_Id;
    private $user_Id_1;
    private $user_Id_2;
    private $time;



    public function mess($User_Id_1,$User_Id_2,$Time){
        //$this->mess_Id = $mess_Id;
        $this->user_Id_1=$User_Id_1;
        $this->user_Id_2=$User_Id_2;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->time=date("h:i:s");
    } 

    public function getter_Mess_Id(){
        return $this->mess_Id;
    }

    public function getter_User_Id_1(){
        return $this->user_Id_1;
    }

    public function getter_User_Id_2(){
        return $this->user_Id_2;
    }

    public function getter_time(){
        return $this->time;
    }

    public function setter_Mess_Id($mess_Id){
        $this->mess_Id=$mess_Id;
    }

    public function setter_User_Id_1($User_Id_1){
        $this->user_Id_1=$User_Id_1;
    }

    public function setter_User_Id_2($User_Id_2){
        $this->user_Id_2=$User_Id_2;
    }

    public function insert_Mess(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $localtime=date("h:i:s");
        $dts=new database();
        $result=$dts->command("INSERT INTO `MESS`(`user_Id_1`, `user_Id_2`, `time`) VALUES ('$this->user_Id_1','$this->user_Id_2','$localtime') ");
    }

    public function get_and_check_mess_id(){
        $dt = new database();
        $dt->select("SELECT * FROM MESS WHERE (Mess.user_Id_1 ='$this->user_Id_1' AND Mess.user_Id_2 ='$this->user_Id_2') OR (Mess.user_Id_2 ='$this->user_Id_1' AND Mess.user_Id_1 ='$this->user_Id_2') ");
        $row = $dt->fetch();    
        if($this->user_Id_1 == $this->user_Id_2){
            $this->mess_Id = $row['mess_id'];
            return false;
        }
        if ($row == 0 ){      
            return true;    
        }
        $this->mess_Id = $row['mess_id'];
        return false;
    }

    public function update_last_mess($current_user_image,$current_user_name){
        try {
            $servername = "localhost";
            $username="root";
            $password="";
            $pdo = new PDO("mysql:host=$servername;dbname=chat", $username, $password);
            $sql = 'CALL get_Last_Time_Of_Reply(:id,@lasttime,@lastconten,@lasreplyid)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $this->mess_Id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
            $row = $pdo->query("SELECT @lasttime AS lasttime,  @lastconten AS lastcontent,@lasreplyid AS replyid")->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                echo " <div class=".'"Container Darker"'.">";
                echo "<img src = " . '"' . $current_user_image . '"' . " alt = " . '"Avatar"' .">";
                echo "<strong class=" . '"' . "float:left" . '"'.">". $current_user_name . "</strong>"; 
                echo   "<p style=".'"float:right;"'.">". $row['lastcontent'] ."</p>";
                echo  " <span class=" . '"time-right"' .">". $row['lasttime'] . "</span>";
                echo "  </div>";      
                    }
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
    }

    public function get_rest_of_userid_by_mess_id($currentuserid){
        $dt = new database();
        $dt->select("CALL get_rest_of_userid_by_mess_id($this->mess_Id,$currentuserid)");
        while($row = $dt->fetch()){
            return $row['rest_user_id'];
        }
        return false;
    }

    public function get_last_mess() {
        try {
            $servername = "localhost";
            $username="root";
            $password="";
            $pdo = new PDO("mysql:host=$servername;dbname=chat", $username, $password);
            $sql = 'CALL get_Last_Time_Of_Reply(:id,@lasttime,@lastconten,@lasreplyid)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $this->mess_Id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
            $row = $pdo->query("SELECT @lasttime AS lasttime,  @lastconten AS lastcontent,@lasreplyid AS replyid")->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                echo "<div class=".'"'."replyid".'"' ."id=".'"'.$row['replyid'].'"'.">";
                echo "<div id=".'"'."lastcontent".'"'.">". $row['lastcontent'] ."</div>";
                echo "<div id=".'"'."lasttime".'"'.">". $row['lasttime']  ."</div>"; 
                echo "</div>";
             return $row !== false ? $row['lasttime'] ."</br>". $row['lastcontent'] ."</br>".$row['replyid'] : null;
            }
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
        return null;
    }
}
?>