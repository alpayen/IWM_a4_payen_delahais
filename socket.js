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
    console.log('client connected to gloabal room');

    //Rooms
    socket.on('joinRoom', function (e) {
        socket.join(e.room);
        socket
            .in(e)
            .emit('msgTo'+e.room, {
                user : e.user,
                text: 'Joined the chat'
            });
    });

    socket.on('msgToServer', function (e) {
        socket
            .in(e.room)
            .emit('msgTo'+e.room, {
                user : e.user,
                text: e.text
            });
    });


    socket.on('disconnect', function() {
        console.log('client left');
    });
});