<template>
    <form class="contact-form" @submit.prevent="submit" >
            <div class="contact-form-line">
                <input class="form-control" v-model="form.name" type="text" name="name" id="" placeholder="Your Name" autocomplete="off" required>

            </div>
            <div class="contact-form-line">
                <input class="form-control" v-model="form.email" type="email" name="email" id="" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="contact-form-line">
                <textarea class="form-control" v-model="form.message" name="message" id="" cols="30" rows="10" placeholder="Enter Message Here" required></textarea>
            </div>
            <div class="submit-button-cont">
                <input type="submit" class="submit-button"  value="Send Message">
            </div>
        </form>
</template>
<script setup>
import { useForm, router } from '@inertiajs/vue3';

const form = useForm({
    name:null,
    email: null,
    message:null
})
</script>
<style scoped>
form{
    width: 100%;
}
.form-control{
    width: 100%;
    border: unset;
    border-bottom: 2px solid var(--herotext);
    background: transparent;
    outline: none;
    color: var(--heading);
    font-weight: 600;
}
.form-control:focus{
    outline: none; 
    border-bottom: 2px solid var(--herotext);
    box-shadow: none;
    background: transparent;
}
.form-control::placeholder{
    color: var(--heading);
    text-transform: uppercase;
    font-weight: 600;
}
.submit-button{
    color: var(--heading);
    font-weight: 600;
    background-color: var(--herotext);
    width: 150px;
    height: 40px;
    cursor: pointer;
}
.submit-button-cont{
    display: flex;
    flex-direction: row;
    align-items: right;
    justify-content: flex-end;
}
</style>