<template>
    <MainLayout title="Home">
        <div id="hero">
            <Hero/>
        </div>
        <div id="about" class="plus">
            <About />
        </div>
        <div id="stack" class="plus">
            <Stack/>
        </div>
        <div id="projects" class="plus">
            <Project/>
        </div>
        <div id="contact" class="plus">
            <Contact/>
        </div>
    </MainLayout>
</template>
<style scoped>
    .plus{
        padding-top: 70px;
    }
</style>
<script setup>
import MainLayout from '@/Layouts/Layout.vue';
import Hero from '@/Sections/Main/Hero.vue';
import About from '@/Sections/Main/About.vue';
import Project from '@/Sections/Main/Projects.vue';
import Stack from '@/Sections/Main/Stacks.vue';
import Contact from '@/Sections/Main/Contact.vue'
import { defineProps, onMounted } from 'vue';

const props = defineProps({
    data: Object,
});

onMounted(() => {
    console.log(props);
});
</script>