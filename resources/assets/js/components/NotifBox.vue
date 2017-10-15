<template id="notifbox-template">
    <div>
        <ul>
            <li v-for="msg in messages">
                <p><span>[{{msg.date}}]</span> {{msg.user.name}} :  {{msg.text}}</p>
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

    //let io = require('socket.io-client');
    //let socket = io.connect('http://localhost:3000');

    function callEventListner() {

    }

    //console.log(id);
    export default {
        data: function () {
            return {
                chatMsg: "",
                messages: [],
            }
        },
        props: ['user', 'project'],
        mounted() {
            //console.log(this);
            this.$parent.socket.emit('joinRoom', {
                room: this.project,
                user: this.user,
                msg: this.chatMsg
            });
            let $this = this;
            this.$parent.socket.on('msgTo' + this.project, function (e) {
                //console.log(this);
                $this.messages.push({
                    user: e.user,
                    text: e.text,
                    date: this.getTime

                })
            });
        },
        methods: {
            getTime : function () {
                let currentTime = new Date(),
                    hours = currentTime.getHours(),
                    minutes = currentTime.getMinutes();

                if (minutes < 10) {
                    minutes = "0" + minutes;
                }

                return hours + ":" + minutes;
            },
            chatSubmit: function () {
                if (this.chatMsg) {
                    this.$parent.socket.emit('msgToServer', {
                        room: this.project,
                        user: this.user,
                        text: this.chatMsg
                    });
                    this.chatMsg = '';
                }
            }
        }
    }


</script>

