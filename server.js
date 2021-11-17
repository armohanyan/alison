'use strict';

const express = require('express');
const socketIO = require('socket.io');

const PORT = process.env.PORT || 3000;
const INDEX = '/index.html';

const server = express()
    .use((req, res) => res.sendFile(INDEX, { root: __dirname }))
    .listen(PORT, () => console.log(`Listening on ${PORT}`));

const io = socketIO(server);

io.on('connection', (socket) => {
    console.log('connection');

    socket.on('sendChatToServer', (message) => {
        // console.log(message);
        io.sockets.emit('sendChatToClient', message);
        // socket.broadcast.emit('sendChatToClient', message);
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

setInterval(() => io.emit('time', new Date().toTimeString()), 1000);
