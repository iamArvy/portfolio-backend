<template>
    <SectionLayout>
        <template #header>
            About Me
        </template>
        <div >
            <Info />
        </div>
        <Certification />

    </SectionLayout>
</template>
<script setup>
    import SectionLayout from '@/Layouts/Section.vue';
    import Certification from '@/Partials/About/Certification.vue';
    import Info from '@/Partials/About//Info.vue';
</script>
<style scoped>

</style>