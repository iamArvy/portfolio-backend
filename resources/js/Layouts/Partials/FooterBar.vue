<template>
<footer>
    <div class="footer-sect-cont">
        <div class="footer-brand">
            <LogoFooter />
            <h1>{{ $page.props.info.brand }}</h1>
        </div>
        <div class="footer-contact">
            <span>{{ $page.props.info.phone }}</span>
            <span>{{ $page.props.info.phone }}</span>
            <Socials />
        </div>
    </div>
    <hr>
    <div class="footer-sect-cont copyright">
            <span>Copyright &copy; {{ new Date().getFullYear() }}, All rights reserved. - {{ $page.props.info.brand }} </span>
    </div>
</footer>
</template>
<script setup>
import LogoFooter from '../Components/LogoFooter.vue';
import Socials from '@/MyComponents/Socials.vue'
</script>
<style scoped>
div{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    /* padding: 2rem; */

}
.footer-sect-cont{
        padding: 1rem 0;
}
footer{
    padding: 2rem;
    /* background-color: #000080; */
    background-color: var(--herotext);
    color: var(--heading);
    width: 100vw;
}
.footer-brand{
    gap: 0.5rem;
}
.footer-contact{
    gap: 2rem;
    font-size: 20px;
    font-weight: 600;
}
h1{
    font-size: 30px;
    font-weight: 600;
}
.copyright{
    text-align: center;
    align-items: center;
    justify-content: center;
}
@media screen and (max-width: 1000px) {
    .footer-brand{
        gap: 0.3rem;
    }
    .footer-contact{
        gap: 1.7rem;
        font-size: 18px;
    }
    h1{
        font-size: 25px;
        font-weight: 600;
    }
}
@media screen and (max-width: 680px) {
    .footer-brand{
        gap: 0.2rem;
    }
    .footer-contact{
        gap: 1.5rem;
        font-size: 16px;
    }
    h1{
        font-size: 22px;
    }
}
@media screen and (max-width: 550px) {
    /* section{
        padding: 2rem 2rem;
    } */
    .footer-sect-cont{
    flex-direction: column;
    gap: 1rem;
    }
    .footer-contact{
        flex-direction: column;
        gap: 0.8rem;
    }
    }
</style>
