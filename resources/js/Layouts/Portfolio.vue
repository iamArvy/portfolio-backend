<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import HeaderBar from '@/Components/HeaderBar.vue';
import FooterBar from '@/Components/FooterBar.vue';


defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
    router.post(route('logout'));
};
</script>
<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="theme-blue">
            <HeaderBar/>
            <!-- Page Content -->
            <main>
                <slot />
            </main>
            <FooterBar />
        </div>
    </div>
</template>