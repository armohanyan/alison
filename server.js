let https = require('https').Server();
let io = require('socket.io')(https);
let Redis = require ('ioredis');    

let redis  = new Redis(); 
redis.subscribe('chat'); 

redis.on('message', function (channel, message){
    console.log("message received: " + message); 
    console.log("Channel:" + channel); 
    message = JSON.parse(message); 
    io.emit(channel + ":" + message.event, message.data);
});

https.listen(3000, function(){
    console.log('Lestening on Port :3000')
}); 
