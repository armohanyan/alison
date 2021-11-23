// let http = require('http').Server();
// let io = require('socket.io')(http);

let Redis = require ('ioredis');    
var express = require('express');
var app = express();
var server = app.listen(3000);
var io = require('socket.io')(server);

var redis = require('redis');
var url = require('url');
var redisURL = url.parse(process.env.REDISCLOUD_URL);
var client = redis.createClient(redisURL.port, redisURL.hostname, {no_ready_check: true});
client.auth(redisURL.auth.split(":")[1]);

let redis  = new Redis();   
redis.subscribe('chat'); 

redis.on('message', function (channel, message){
    console.log("message received: " + message); 
    console.log("Channel:" + channel); 
    message = JSON.parse(message); 
    io.emit(channel + ":" + message.event, message.data);
});

app.listen(8080, () => {
    console.info("Server started on http://localhost:8080");
  });
  