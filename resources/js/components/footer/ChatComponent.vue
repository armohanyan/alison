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

<script>
import { Chat } from 'vue-quick-chat';
import 'vue-quick-chat/dist/vue-quick-chat.css';

export default {
    components: {
        Chat
    },
    data() {
        return {
            visible: true,
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
            hideCloseButton: false,
            submitIconSize: 25,
            closeButtonIconSize: "20px",
            asyncMode: false,
            toLoad: [],

            scrollBottom: {
                messageSent: true,
                messageReceived: false
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
        this.getMessages()
    },

    methods: {
        async getMessages(){
            await this.axios.get('/get/messages')
            .then(response => {

                const sortedMessages = response.data.messages.sort( (a,b) =>  new Date(a.timestamp) - new Date(b.timestamp) );

                sortedMessages.forEach((item, index) => {
                    this.messages.push(sortedMessages[index])
                })

                this.myself = response.data.authUser
                this.participants = response.data.userParticipant
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
            this.messages.push(message);
            let participantsId = this.participants.map( item => item.id );

            console.log(participantsId)
            this.axios.post('/post/message', {message, participantsId } )
                .then(function (response){
                    // console.log(response);
                })
                .catch(err => {
                    console.log('error')
                })


            /*
            * you can update message state after the server response
            */
            // timeout simulating the request

            setTimeout(() => {
                message.uploaded = true
            }, 2000)
        },
        onClose() {
            this.visible = false;
        },
    }
}
</script>

<style scoped>

#chat-inner {
    position: absolute;
    top: 0;
    right:180px;
    height:100%
}
.quick-chat-container {
    width: 150%;
}


</style>
