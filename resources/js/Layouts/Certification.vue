<script setup>

</script>
<template>
    <div>
        <div class="c-header" v-if="$slots.header">
            <span class="section-header">
                <slot name="header" />
            </span>
        </div>
        <br>
        <div class="content">
            <slot />
        </div>
    </div>
</template>
<style scoped>
.c-header span{
    font-weight:bold;
    font-family: Poppins, sans-serif;
    font-size: 30px;
    color: var(--heading);
}
@media screen and (max-width: 1000px) {
    .c-header span{
    font-size: 22px;
}
}
@media screen and (max-width: 760px) {
    .c-header span{
    font-size: 18px;
}
}

</style>