<script setup>
import Section from '@/Layouts/Section.vue';
import Socials from '@/MyComponents/Socials.vue';
import Form from '@/Partials/Contact/Form.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
</script>
<template>
    <Section>
        <template #header>
            Get In Touch
        </template>
        <template #desc>
            Do you want to get in touch with us?
        </template>
        <div class="contact-cont">
            <Socials />
            <Form />
        </div>
    </Section>
</template>

<style>
.contact-cont{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

</style>

<!-- <script>
    import { mapState, mapActions, mapGetters } from 'vuex';
    export default{
        name: 'ContactSec',
        data() {
            return {
                cfd:{
                    name: '',
                    email: '',
                    subject: '',
                    message: '',
                },
            }
        },
        computed:{
            ...mapState('details',['contactmessage']),
            ...mapGetters('details',['files']),
            brand(){
                return this.files['Brand Picture']
            }
        },
        methods: {
            ...mapActions('details', ['submitForm']),
            submit(){
            const formData = new FormData();
                formData.append('name', this.cfd.name);
                formData.append('email', this.cfd.email);
                formData.append('subject', this.cfd.subject);
                formData.append('message', this.cfd.message);
                this.submitForm(formData)
                // axios.post(`https://vorteks.pythonanywhere.com/api/contactform/`, formData)
                // .then(() => {
                //     this.messageFromServer = response.data.message;
                    
                //     })
                //     .catch((error) => {
                //     console.error('Error sending contact message:', error);
                //     this.messageFromServer = 'An error occurred while sending the message. Please try again later.';
                //     });
            },
        },
    } -->
    
<!-- </script> -->