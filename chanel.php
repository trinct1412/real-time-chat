<?php 

    class chanel{
        private $host='localhost';
        private $port=3000;
        private $socket;

        private function connect(){
            if($this->socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)){
            return socket_connect($this->socket,$this->host,$this->port);
            }
            else
            return false;
        }
        
        public function close(){

        }

        public function send($buffer){
            try{
                if($this->connect()){
                    if(socket_write($this->socket,$buffer,strlen($buffer))){
                        socket_close($this->socket);
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }catch(Exception $ex){
                return false;
            }
    }
    
    }
?>