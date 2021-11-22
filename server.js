// let https = require('https').Server();
// let io = require('socket.io')(https);
// let Redis = require ('ioredis');    

// let redis  = new Redis(); 
// redis.subscribe('chat'); 

// redis.on('message', function (channel, message){
//     console.log("message received: " + message); 
//     console.log("Channel:" + channel); 
//     message = JSON.parse(message); 
//     io.emit(channel + ":" + message.event, message.data);
// });

// https.listen(3000, function(){
//     console.log('Lestening on Port :3000')
// }); 



'use strict';

const express = require('express');
const socketIO = require('socket.io');

const PORT = process.env.PORT || 3000;
const INDEX = '/index.html';

const server = express()
  .use((req, res) => res.sendFile(INDEX, { root: __dirname }))
  .listen(PORT, () => console.log(`Listening on ${PORT}`));

const socket = socketIO(server);

socket.on('connection', (socket) => {
  console.log('Client connected');
  socket.on('disconnect', () => console.log('Client disconnected'));
});

