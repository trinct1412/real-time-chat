var net=require('net');
var http=require('http');
var url = require('url');

var clientlist={};

var client = function(res,userid){
    this.userid = userid;
    this.buffer=[];
    this.response=res;
    this.status = false;
    this.send = function(){
        if(this.status == true){
            console.log(this.buffer.join(',').toString());
            this.response.setHeader('Access-Control-Allow-Origin','*');
            this.response.writeHead(200,{'Content-Type' : 'application/json'});
            this.response.end(this.buffer.join(',').toString());
            this.buffer=[];
        }
        this.status = false;
    }
}

setInterval( function clientsenddata(){
    for (i in clientlist){
          clientlist[i].send();
    }
},1000);

function get_key_by_userid(userid){
    for (i in clientlist){
        if(clientlist[i].userid.toString() === userid.toString()){   
            return i;
        }
    }
    return "";
}

var listener = net.createServer((c)=>{
    c.on('data',(data)=>{
        var useridRC = JSON.parse(data.toString());
        var sessionidRC =  get_key_by_userid(useridRC.useridRC);
        if(sessionidRC in clientlist){
            clientlist[sessionidRC].status=true;
            clientlist[sessionidRC].buffer.push(data.toString());
        }
        c.end();
    });
  
    c.on('end',()=>{

    });

    c.on('err',(err)=>{

    }); 
}).listen(3000,()=>{
    console.log("listener client on port 3000");
});


var server = http.createServer(function(req,res){
    var qr = url.parse(req.url,true).query;  
    if(qr.key && qr.userid){ 
        clientlist[qr.key]= new client(res,qr.userid);  
    }
}).listen(3001,()=>{
    console.log("ajax long polling active on port 3001")
});






