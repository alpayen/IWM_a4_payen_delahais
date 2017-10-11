var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(
    server,
    {origins:'localhost:* http://locahost:* *.http://locahost:*'});

server.listen(3000, function(){
    console.log("Server up and running...");
});

io.on('connection', function (socket) {
    console.log('client connected to gloabal room');

    //Rooms
    socket.on('joinRoom', function (e) {
        socket.join(e.room);
        console.log('client joined room '+ e.room);
        io
            .in(e.room)
            .emit('msgTo'+e.room, {
                user : e.user,
                text: ' joined the chat'
            });
        console.log('might have send a message to the dudes')
    });

    socket.on('msgToServer', function (e) {
        io
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