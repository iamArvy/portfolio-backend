<template>
    <div class="socials">
        <a v-for="social in $page.props.socials" :key="social" :href="social.url"><i :class="social.name"></i></a>
    </div>
</template>
<script setup>
</script>
<style scoped>
div{
    display: flex;
    flex-direction: row;
    gap: 1rem;
}
</style>