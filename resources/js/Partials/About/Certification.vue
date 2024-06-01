<template>
        <div class="section-divider">
            <div class="certifications divided">
                <CertificationLayout>
                    <template #header>
                        Certifications
                    </template>
                    <div class="lister">
                        <Item />
                        <Item />
                        <Item />
                    </div>
                </CertificationLayout>
            </div>
            <div class="experience divided">
                <CertificationLayout>
                    <template #header>
                        Experience
                    </template>
                    <div class="lister">
                        <Item />
                        <Item />
                        <Item />
                    </div>
                </CertificationLayout>
            </div>
        </div>
</template>
<style>
@media screen and (max-width: 450px) {
    /* section{
        padding: 2rem 2rem;
    } */
    .section-divider{
        display: block;
     flex-direction: column;
     gap: 2rem;
    }
}
.section-divider{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.divided{
    min-width: 45%;

}
@media screen and (max-width: 760px) {
    .section-divider{
        display: flex;
     flex-direction: column;
     gap: 2rem;
    }
}
</style>
<script setup>
import CertificationLayout from "@/Layouts/Certification.vue";
import Item from "@/MyComponents/Item.vue"
</script>