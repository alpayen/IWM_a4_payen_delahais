var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(
    server,
    {origins:'localhost:* http://locahost:*'});

server.listen(3000, function(){
    console.log("Server up and running...");
});

io.on('connection', function (socket) {
    console.log('client connect');

    socket.on('msgToServer', function (e) {
        socket.broadcast.emit('msgToClient', e);
    });


    socket.on('disconnect', function() {
        console.log('client left');
    });
});