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
            hideCloseButton: true,
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
        this.getAuthUser()

        if( localStorage.getItem('myself') != 1 ){
            this.getMessages()
        }

        var socket = io.connect("https://tranquil-badlands-87155.herokuapp.com/", {secure: true, port: '3000',transports : ['websocket'] });

        socket.on("sendChatToServer", response  => {  
            console.log(response) 
             if( ! this.participants.some( item => item.id == response.data['senderUser']['id']) ){
                this.participants.push(response.data['senderUser'])   
                this.visible = true 
            }
            this.messages.push(response.data['senderMessage'])
        })
    },

    methods: {

        async getAuthUser(){
            await this.axios.get('/get/authuser')
            .then( response => {
                if(response.data.authUser != null){
                    localStorage.setItem('myself', response.data.authUser.id)
                    this.myself = response.data.authUser
                      this.visible = true
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
          const socket = io.connect("https://tranquil-badlands-87155.herokuapp.com/");
          this.messages.push(message); 
          socket.emit('sendChatToServer', message)
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
        },
    },
    
    // sockets: {
    //     connect(data) {
    //         // console.log(data);
    //     },
    //     sendChatToClient(data) {
    //         this.messages.push(data);
    //     }
    // }
}
</script>

<style scoped>

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
