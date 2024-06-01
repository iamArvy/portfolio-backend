<script setup>
import Project from '@/MyComponents/Project.vue'
import Wrapper from '@/MyComponents/FlexWrapper.vue'
import SectionLayout from '@/Layouts/Section.vue';
</script>
<template id="projects">
    <SectionLayout >
        <template #header>
            Projects
        </template>
        <template #desc>
            Descriptions 
        </template>
        <Wrapper>
            <Project v-for="project in $page.props.projects" :key="project" :project="project" />
        </Wrapper>
    </SectionLayout>
    
</template>
<style scoped>
</style>