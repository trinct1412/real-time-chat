<?php
class database{
    private $conn    = null ;
    private $host    = 'localhost' ;
    private $user    = 'root' ;
    private $pass    = '' ;
    private $db_Name = 'chat' ;
    private $result  = null ;

    // destructor 
    public function __destruct() {
        $this->conn->close();
    }


    public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
    
    
    public function change_Database($Host,$User,$Pass,$Db_Name){       
        $this->conn=null;
        $this->host=$Host;
        $this->user=$user;
        $this->pass=$Pass;
        $this->db_Name=$Db_Name;
        $this->result = null;
    }

    private function connect(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db_Name);
        if ($this->conn->connect_error) {
            die("khong connect duoc den Co So Du Lieu : " . $conn->connect_error);
        }
        $this->conn->query('SET NAMES UTF8');
    }

    public function select($sql){
        $this->connect();
        $this->result = $this->conn->query($sql);
    }

    public function fetch(){
        if($this->result->num_rows>0){ 
            $row = $this->result->fetch_assoc();
            }     
        else
            $row=0;
            return $row;
    }

    public function command($sql){
        $this->connect();
        $this->conn->query($sql);       
    }

}
?>
