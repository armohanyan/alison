// // let http = require('http').Server();
// // let io = require('socket.io')(http);

// let Redis = require ('ioredis');    
// var express = require('express');
// var app = express();
// var server = app.listen(3000);
// var io = require('socket.io')(server);


// let redis  = new Redis(); 
// redis.subscribe('chat'); 

// redis.on('message', function (channel, message){
//     console.log("message received: " + message); 
//     console.log("Channel:" + channel); 
//     message = JSON.parse(message); 
//     io.emit(channel + ":" + message.event, message.data);
// });

// app.listen(8080, () => {
//     console.info("Server started on http://localhost:3000");
// });
  

const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server, {
    cors: {
      method:['get','post'],
      locals:'http://localhost:3000/', // for local
      credentials:true
    }
});
io.on('connection', (socket) => {
    console.log('connection');
    socket.on('sendChatToServer', (message) => {
        // console.log(message);
        io.sockets.emit('sendChatToClient', message);
    });
    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});
server.listen(3000, () => {
  console.log('Server is running --port 3000');
}); //for local

