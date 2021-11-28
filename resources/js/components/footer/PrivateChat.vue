<template>
    <div id="chat-inner">
        <Chat v-if="visible"
              :participants="participants"
              :myself="myself"
              :messages="messages"
              :chat-title="chatTitle"
              :placeholder="placeholder"
              :colors="colors"
              :border-style="borderStyle"
              :hide-close-button="hideCloseButton"
              :close-button-icon-size="closeButtonIconSize"
              :submit-icon-size="submitIconSize"
              :load-more-messages="toLoad.length > 0 ? loadMoreMessages : null"
              :async-mode="asyncMode"
              :scroll-bottom="scrollBottom"
              :display-header="true"
              :send-images="true"
              :profile-picture-config="profilePictureConfig"
              @onMessageSubmit="onMessageSubmit"
              @onType="onType"
              @onClose="onClose"/>
    <div v-if="isAuthUserAdmin"  class="isAuthUser">
        <div v-if="hoverNotificationButton"  class="button-notfication">
            <button @click="hoverNotification" type="button" class="icon-button">
                <span class="material-icons"><i class="fa fa-comment" aria-hidden="true"></i></span>
                <span v-if="countMessage > 0" class="icon-button__badge">{{ countMessage }}</span>
            </button>
        </div>
    </div>

    </div>
</template>
    <script src="socket.io/socket.io.js"></script>
<script>

import { Chat } from 'vue-quick-chat';
import 'vue-quick-chat/dist/vue-quick-chat.css';
export default {
    name : 'PrivateChat',
    components: {
        Chat
    },
    data() {
        return {
            isAuthUserAdmin : false,
            visible: false,
            participants: [],
            myself : {},
            messages: [

            ],
            hoverNotificationButton : true,
            countMessage : 0,
            chatTitle: 'Alison chat',
            placeholder: 'Send your message',
            colors: {
                header: {
                    bg: '#212529',
                    text: '#fff'
                },
                message: {
                    myself: {
                        bg: '#212529',
                        text: '#fff'
                    },
                    others: {
                        bg: '#fff',
                        text: '#212529'
                    },
                    messagesDisplay: {
                        bg: '#fff'
                    }
                },
                submitIcon: '#b91010',
                submitImageIcon: '#b91010',
            },
            borderStyle: {
                topLeft: "10px",
                topRight: "10px",
                bottomLeft: "10px",
                bottomRight: "10px",
            },
            hideCloseButton: false,
            submitIconSize: 25,
            closeButtonIconSize: "20px",
            asyncMode: false,
            toLoad: [],

            scrollBottom: {
                messageSent: true,
                messageReceived: true
            },

            displayHeader:true,
            profilePictureConfig: {
                others: true,
                myself: true,
                styles: {
                    width: '30px',
                    height: '30px',
                    borderRadius: '50%'
                }
            }
        }
    },

    mounted() {

        //Server for local
        var socket = io.connect("http://localhost:3000");
        // Server for HEROKU

        // var socket = io.connect("https://tranquil-badlands-87155.herokuapp.com/", {secure: true, port: '3000',transports : ['websocket'] });

        this.getAuthUser()

        if( localStorage.getItem('myself') != 1 ){
            this.getMessages()
        }


        socket.on("sendChatToClient", data => {
            if( data['senderMessage']['participantId'] != this.myself.id ){
                this.countMessage++
                this.messages.push(data['senderMessage'])
                if( ! this.participants.some( item => item.id == data['senderUser']['id']) ){
                      this.participants.push(data['senderUser'])
                }
            }
        });
    },

    methods: {

        async getAuthUser(){
            await this.axios.get('/get/authuser')
            .then( response => {
                if(response.data.authUser != null){
                    localStorage.setItem('myself', response.data.authUser.id)
                    this.myself = response.data.authUser
                    this.isAuthUserAdmin = true;
                 }
            })
        },

        async getMessages(){
          await this.axios.get('messages')
                .then(response => {
                    let allMessages = [];
                    this.participants[0] = response.data.admin

                    response.data.mergeMessages.forEach((message) => {
                        let myself = this.myself.id == message.user_id ? myself = true : myself = false;

                        let currectType = {
                            'content' : message.message,
                            'myself' : myself,
                            'participantId' : response.data.admin.id,
                            'timestamp' : message.created_at,
                            'type' : 'text',
                        };

                        allMessages.push(currectType)
                    })

                    this.messages = allMessages.sort( (a,b) =>  new Date(a.timestamp) - new Date(b.timestamp) );

                })
                .catch(error => {
                    console.log(error)
                })

        },

        hoverNotification:function(){
            this.visible = true;
            this.countMessage = 0;
            this.hoverNotificationButton = false
        },

        onType: function (event) {
            //here you can set any behavior
        },

        loadMoreMessages(resolve) {
            setTimeout(() => {
                resolve(this.toLoad);
                this.messages.unshift(...this.toLoad);
                this.toLoad = [];
            }, 1000);
        },

        onMessageSubmit: function (message) {
            this.messages.push(message);
            const socket = io.connect("http://localhost:3000");
            // var socket = io.connect("https://tranquil-badlands-87155.herokuapp.com/", {secure: true, port: '3000',transports : ['websocket'] });

            let senderMessage = {
                'content' : message['content'] ,
                'myself' : false,
                'participantId' : this.myself.id,
                'timestamp' : message['timestamp'],
                'type' : 'text',
            }

            socket.emit('sendChatToServer', {
                'senderMessage' : senderMessage,
                'senderUser' : this.myself,
            })

            if( this.participants.length > 0 ) {
                var participantsId = this.participants[0].id
            }

            this.axios.post('message', {message, participantsId } )
                .then(function (response){
                    console.log('send message')
                })
                .catch(err => {
                    console.log('error')
                })

            setTimeout(() => {
                message.uploaded = true
            }, 2000)
        },
        onClose() {
            this.visible = false;
            this.hoverNotificationButton = true;
            this.countMessage = 0;
        },
    },
}
</script>

<style scoped>

/*.isAuthUser{*/
/*    position: fixed;*/
/*}*/

.button-notfication {
    position: fixed;
    bottom: 6px;
    right: 10px;
}

.icon-button {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    color: #333333;
    background: #dddddd;
    border: none;
    outline: none;
    border-radius: 50%;
}

.icon-button:hover {
     cursor: pointer;
}

.icon-button:active {
     background: #cccccc;
}

.icon-button__badge {
    position: absolute;
    top: -10px;
    right: -10px;
    width: 25px;
    height: 25px;
    background: red;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
}


#chat-inner {
    position: absolute;
    top: -5px;
    right:10px;
    height:100%
}
.quick-chat-container{
    max-width: 310px;
    min-width: 310px;
}

.quick-chat-container .container-message-manager .message-input{
    overflow:auto;
}

</style>
