<template>
    <button @click="login"><i class="fa-solid fa-right-to-bracket"></i></button>
</template>
<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

const login = () => {
    router.get(route('login'));
};
</script>
<style scoped>
    button{
        cursor: pointer;
    }
    button:hover{
        color: var(--herotext);
        transition: ease-in-out all .2s;
    }
</style>