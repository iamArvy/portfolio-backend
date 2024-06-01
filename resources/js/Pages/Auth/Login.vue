<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import {ref} from 'vue'
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
const passwordVisibility = ref(false);
const inputType = ref('password');

const togglePasswordVisibility = () => {
  passwordVisibility.value = !passwordVisibility.value;
  inputType.value = inputType.value === 'password' ? 'text' : 'password';
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" name="login-email" id="login-email" v-model="form.email" required autofocus autocomplete="username" placeholder="Username">
                <span class="sidebutton"><i class="fa-solid fa-user"></i></span>
            </div>
            <div class="input-box">
                <input name="password" id="password" v-model="form.password" required autocomplete="password" :type="inputType" placeholder="Password">
                <button @click.prevent="togglePasswordVisibility()">
                    <i class="fa-solid fa-eye-slash" v-if="passwordVisibility"></i>
                    <i class="fa-solid fa-eye" v-else></i>
                </button>
            </div>
            <div class="remember-forgot">
                <label for="remember-me" class="remember">
                    <input type="checkbox" name="remember-me" id="" v-model="form.remember">
                    <span>Remember me</span>
                </label>
                <label for="forget-password">
                    <Link v-if="canResetPassword" :href="route('password.request')" id="forget-password">
                        Forgot your password?
                    </Link>
                </label>
            </div>
            <div>
                <button type="submit" class="btn">Log in</button>
            </div>
        </form>

        <!-- <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form> -->
    </AuthenticationCard>
</template>
<style>
@import url(
    "https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
);
*{
    margin:0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    color: white;
}
form h1{
    font-size:36px;
    text-align: center;
}
.input-box{
    width: 100%;
    height: 50px;
    /* background: red; */
    margin: 30px 0;
    display: flex;
    flex-direction: row;
    border: 2px solid white;
    border-radius: 40px;
    padding: 10px;

}
.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
}
.input-box input:focus{
    border: none !important; 
    outline: none !important; 
    box-shadow: none;
    background: transparent;

}
input::placeholder{
    color: white;
}
.input-box input:focus:not(:focus):not(:placeholder-shown).filled{
    background: transparent;
}
.spanbutton{
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
}
.remember-forgot{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.remember{
    display: flex;
    flex-direction: row;
    gap: 7px;
    text-align: center;
    justify-content: center;
    align-items: center;
}
.remember-forgot label>input:focus{
    outline: none;
    box-shadow: none;
}
.remember-forgot label>input:checked{
    color: black;
}
.btn{
    width: 100%;
    height: 45px;
    background: white;
    border: none;
    outline: none;
    border-radius: 40px;
    font-size: 16px;
    font-weight: 600;
    color: black;
    margin-top: 10px;
}
</style>
