<template id="notifbox-template">
    <div>
        <ul>
            <li v-for="msg in messages">
                <p><span>[{{msg.date}}]</span> {{msg.text}}</p>
            </li>
        </ul>
        <div class="chatForm">
            <form v-on:submit.prevent="chatSubmit">
                <input class="form-control" v-model="chatMsg">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</template>
<script>
    let io = require('socket.io-client');
    let socket = io.connect('http://localhost:3000');
    export default {
        data: function () {
            return {
                chatMsg: "",
                messages: []
            }
        },
        props : ['user', 'project'],
        mounted() {
            console.log(this.user);
            console.log(this.project);
            socket.emit('joinRoom', {
                room : this.project,
                user : e.user,
                msg : this.chatMsg
            });
            //socket.emit('msgToServer', this.user.name + ' joined');
            let $this = this;
            socket.on('msgTo'+this.project, function (e) {
                //console.log(this);
                $this.messages.push({
                    user : e.user,
                    text: e.text,
                    date: Date.now()

                })
            })
        },
        methods: {
            chatSubmit: function () {
                if (this.chatMsg) {
                    socket.emit('msgToServer', {
                        room : this.project,
                        user : e.user,
                        msg : this.chatMsg
                    });
                    this.chatMsg = '';
                }
            },
        }
    }

</script>

