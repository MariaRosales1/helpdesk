<template>
    <div class="chat-app">
        <Conversation :contact = "selectedContact" :messages = "messages" @new = "saveNewMessage"/>
        <ContactList :contacts = "contacts" :user = "user" :consultantassigned = "consultantassigned" @selected="starConversationWith"/>
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactList from './ContactList';
    export default {
        props: {
            user:{
                type: Object,
                required: true
            }
        },

        data(){
            return {
                selectedContact: null,
                messages:[],
                contacts:[],
                consultantassigned: 1
            };
        },

        mounted() {
            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage',(e) =>{
                    this.hanleIncoming(e.message)
                });

            //console.log(this.user);
            axios.get('/contacts')
                .then((response) => {                    
                    // console.log("inicio");
                    // console.log(response.data);
                    // console.log('fin');
                    this.contacts = response.data;
                });
            //console.log('Component mounted.')
            
            axios.get('/consultantassigned')
                .then((response) => {                    
                     console.log("inicio");
                    console.log(response.data);
                    console.log('fin');
                    this.consultantassigned = response.data;
                });

        },
        methods:{
            starConversationWith(contact){
                axios.get(`/conversation/${contact.id}`)
                    .then(response=>{
                        this.messages = response.data;
                        this.selectedContact = contact;
                    });
            },
            saveNewMessage(text){
                this.messages.push(text);
            },
            hanleIncoming(message){
                if(this.selectedContact && message.from == this.selectedContact.id){
                    this.saveNewMessage(message); 
                    return;               
                }
                alert(message.text);
            }
            
        },
        components: {Conversation, ContactList}
    }
</script>


<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>