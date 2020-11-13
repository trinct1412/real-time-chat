<?php
    require_once("database.php");
    class user{
        private $user_Id;
        private $user_Name;
        private $user_Email;
        private $user_Pass;
        private $user_Image;

        public function user(){

        }

        public function cr_user($User_Id,$User_Name,$User_Email,$User_Pass,$User_Image){
            $this->user_Id=$User_Id;
            $this->user_Name=$User_Name;
            $this->user_Pass= $User_Pass;
            $this->user_Email= $User_Email;
            $this->user_Image = $User_Image;
        }

        public function getter_User_Id(){
            return $this->user_Id;
        }

        public function getter_User_Name(){
            return $this->user_Name;
        }
        public function getter_User_Email(){
            return $this->user_Email;
        }
        public function  getter_User_Pass(){
            return $this->user_Pass;
        }
        public function  getter_User_Image(){
            return $this->user_Image;
        }
        public function setter_User_Id($user_Id){
            $this->user_Id=$user_Id;
        }
        public function  setter_User_Image($user_Image){
            $this->user_Image=$user_Image;
        }
        public function setter_User_Name($User_Name){
            $this->user_Name=$User_Name;
        }
        public function setter_User_Email($User_Email){
            $this->user_Email=$User_Email;           
        }
        public function setter_User_Pass($User_Pass){
            $this->user_Pass=$User_Pass;
        }
        
        public function update_User(){
            $dt = new database();
            $dt->command("UPDATE `USER` SET `user_Name`='$this->user_Name',`user_Email`='$this->user_Email',`user_Image`='$this->user_Image' WHERE `user_Id`='$this->user_Id' ");
            return true;
        }

        public function insert_User(){
            $dt=new database();
            $result=$dt->command("INSERT INTO `USER`(`user_Name`, `user_Email`, `user_Pass`, `user_Image`) VALUES ('$this->user_Name','$this->user_Email','$this->user_Pass','$this->user_Image')");
            return true;
        }

        public function check_Login(){
            $dt =  new database();
            $dt->select("SELECT * FROM USER WHERE user_Email='$this->user_Email' AND user_Pass='$this->user_Pass'");
            while($row = $dt->fetch() ){
                $this->user_Id = $row["user_Id"];
                $this->user_Name=$row["user_Name"];
                $this->user_Image = $row["user_Image"];
            }
            if(empty($this->user_Id))
                {           
                    return false; 
                }       
            return true;
        }

       
        public function get_user_chatted(){
            require_once("mess.php");
            $dt = new database();
            $dt->select("CALL get_rest_of_user($this->user_Id)");
            while($row = $dt->fetch()){
            $dts = new database();
            echo  " <a href=" . '"'."index.php?mess_Id=". $row["messId"] .'"' ."id=" .'"'. "messid" .$row["messId"] .'"'. ">";
            $dts->select("SELECT user_Id,user_Name,user_Image from USER where user_Id=". "'" . $row["userId"] . "'");
            while($row1 = $dts->fetch()){
            $currentmess= new mess($this->user_Id,$row1["user_Id"],"00:00:00");
            $currentmess->setter_Mess_Id($row["messId"]);
            echo " <div class= " . '"container"' . ">";
            echo " <img style=" . '"float: left;"' . "src=" . '"'.$row1["user_Image"].'"' . "alt=" . '"Avatar"' . ">";
            echo " <div class=" . '"'. "username" .'"'  .  "><strong>" .  $row1["user_Name"]  ."</strong></div>";
            $currentmess->get_last_mess();
            echo " </div>";
            
        }
            echo " </a> ";
        }
        }

        public function get_List_User(){
            $dt =  new database();
            $dt->select("SELECT * FROM USER WHERE USER.user_Email NOT IN ('$this->user_Email')");
            while ($row = $dt->fetch()){
                echo "<a href=". '"'. "index.php?user_Id="  . $row["user_Id"] . '"'. ">" ."<div class=" . "container" .">". "<img src=" .'"'. $row["user_Image"] . '"' . " class = " . "'img_res'".">" ."<strong>" . $row["user_Name"]."</strong>" ."</div> </a>";               
            }
        }

        public function register_User(){
            $dt = new database();
            $dt->command("SELECT ");
        }

    }
?>