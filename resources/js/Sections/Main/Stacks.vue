<script setup>
import Stack from '@/MyComponents/Stack.vue'
import SectionLayout from '@/Layouts/Section.vue';
import Wrapper from '@/MyComponents/FlexWrapper.vue'
</script>
<template>
    <SectionLayout >
        <template #header>
            Stacks
        </template>
        <template #desc>
            Descriptions 
        </template>
        <Wrapper>
            <Stack v-for="stack in $page.props.stacks" :key="stack" :stack="stack"/>
        </Wrapper>
    </SectionLayout>
    
</template>
<style scoped>
</style>