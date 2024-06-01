<template>
    <Head :title="title" />
    <div class="body">
        <HeaderBar class="sticky" />
        <!-- Page Heading -->
            <!-- Page Content -->
            <main>
                <slot />
            </main>
        <FooterBar />
    </div>
</template>
<script setup>
import HeaderBar from './Partials/HeaderBar.vue';
import FooterBar from './Partials/FooterBar.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String,
})
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,500&family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
:root{
    --gradient: linear-gradient(to left, #0000ff, #00ffff);
    --heading: #101357;
    --subheading: #00FF00;
    --headerbg: #101357;
    --bodytext: #333333;
    --buttonbg: #fbaf08;
    --bodybg: #FFFFF0;
    --herotext: #FFBF00;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.body{
    max-width: 100vw;
    overflow: hidden;
}
.sticky{
    position: fixed;
    top: 0;
    z-index: 99;
    padding: 5px 2rem;
}
.solid-heading{
    /* color:rgba(66, 68, 110, 1); */
    font-weight: bold;
    font-family: Poppins, sans-serif;
    
}
.my-button{
    background-color: var(--buttonbg);
}
.button-success{
    color:rgba(215, 255, 224, 1)
}
main{
    background-color: var(--bodybg);
    color: var(--bodytext);
}
</style>