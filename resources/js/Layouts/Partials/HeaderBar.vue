<template>
    <header>
        <div class="logo">
            <Logo />
            <h1>{{ $page.props.info.brand }}</h1>
        </div>
        <ul class="nav">
            <li @click="scrollto('hero')">Home</li>
            <li @click="scrollto('about')">About</li>
            <li @click="scrollto('stack')">Stack</li>
            <li @click="scrollto('projects')">Projects</li>
            <li @click="scrollto('contact')">Contact</li>
        </ul>
        <div class="authenticator">
            <div class="ms-3 relative" v-if="$page.props.auth.user" >
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <!-- <LoginButton /> -->
                        <i class="fa-solid fa-gears"></i>
                    </template>

                    <template #content>
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Manage Account
                        </div>

                        <DropdownLink :href="route('profile.show')">
                            Profile
                        </DropdownLink>

                        <DropdownLink :href="route('messages')">
                            Messages
                        </DropdownLink>

                        <DropdownLink :href="route('site.edit')">
                            Site Settings
                        </DropdownLink>

                        <div class="border-t border-gray-200 dark:border-gray-600" />

                        <form @submit.prevent="logout">
                            <DropdownLink as="button">
                                Log Out
                            </DropdownLink>
                        </form>
                    </template>
                </Dropdown>
            </div>
            <div class="auth" v-else>
                
                <LoginButton />
            </div>
        </div>
        <button class="hamburger" @click="toggleHamburger">
            <i class="fa-solid fa-burger"></i>
        </button>
        <div class="hamburger-menu" v-if="showHamburger">
            <ul class="hamburger-list-cont">
                <li @click="scrollto('hero')" class="hamburger-list-item"><i class="fa-solid fa-house"></i></li>
                <li @click="scrollto('about')" class="hamburger-list-item"><i class="fa-solid fa-circle-info"></i></li>
                <li @click="scrollto('stack')" class="hamburger-list-item"><i class="fa-solid fa-layer-group"></i></li>
                <li @click="scrollto('projects')" class="hamburger-list-item"><i class="fa-solid fa-diagram-project"></i></li>
                <li @click="scrollto('contact')" class="hamburger-list-item"><i class="fa-solid fa-address-book"></i></li>
                <li @click="scrollto('contact')" class="hamburger-list-item"><i class="fa-solid fa-user"></i></li>
                <li @click="scrollto('contact')" class="hamburger-list-item"><i class="fa-solid fa-gears"></i></li>
            </ul>
        </div>
            
        
    </header>
</template>
<script setup>

import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

import Logo from '@/Layouts/Components/LogoImg.vue';
import LoginButton from '@/Layouts/Components/LoginButton.vue';

const showHamburger = ref(false);
const logout = () => {
    router.post(route('logout'));
};

const scrollto = (sectionId) => {
    if (showHamburger.value) {
        showHamburger.value = false;
    }
  const section = document.getElementById(sectionId);
  if (section) {
    section.scrollIntoView({ behavior: 'smooth', });
  }
}
const toggleHamburger=()=>{
    showHamburger.value = true
}

</script>
<style scoped>
.hamburger-menu{
    animation:ease-in-out 3s;
    background-color: var(--heading);
    min-width: 100vw;
    min-height: 100vh;
    position: fixed;
    left:0;
    top: -0;
    z-index: 99999;
}
.hamburger{
    display: none;
}
.hamburger-menu ul{
    display: flex;
    flex-wrap: wrap;
    height: 100vh;
    width: 100%;
}
.hamburger-menu li{
    width: 50%;
    min-height: 25%;
    font-size: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px dotted white;
}
.hamburger-menu li:hover{
    color: var(--herotext);
}
.logo{
    display: flex;
    flex-direction: row;
    gap: 0.7rem;
    color: var(--herotext);
    align-items: center;
}
.pp{
    width: 50px;
    height: 50px;
}
.authenticator{
    align-self: right;
}
header{
    display: flex;
    flex-direction: row;
    background-color: rgba(16, 19, 87, 0.9); /* Background color with opacity */
    /* opacity: 0.5; */
    color: white;
    justify-content: space-between;
    /* gap: 3rem; */
    align-items: center;
    font-family: DM Sans, sans-serif;
    font-weight: 500;
    font-size: 20px;
    text-decoration: unset;
    height: 70px;
    width: 100vw;
    

}
li{
    list-style: none;
    cursor: pointer;
}
li:hover{
    color: var(--herotext);
    transition: ease-in-out .5s;
}
li:active{
    color: var(--herotext);
}
.nav{
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 2rem;
}
.auth{
    margin-left: auto;
    margin-right: 3rem;

}
@media screen and (max-width: 760px) {
    section{
        padding: 2rem 2rem;
    }
    .nav{
        display: none;
    }
    .authenticator{
        display: none;
    }
    .hamburger{
        display: block;
    }
}
</style>