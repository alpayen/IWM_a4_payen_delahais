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
            console.log(this.project    );
            let $this = this;
            socket.on('msgToClient', function (e) {
                //console.log(this);
                $this.messages.push({
                    text: e,
                    date: Date.now()

                })
            })
        },
        methods: {
            chatSubmit: function () {
                if (this.chatMsg) {
                    socket.emit('msgToServer', this.chatMsg);
                    this.messages.push({
                        text : this.chatMsg,
                        date : Date.now()
                    });
                    this.chatMsg = '';
                }
            },
        }
    }

</script>

