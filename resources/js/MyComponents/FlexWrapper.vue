<template>
    <div class="wrapcontainer">
        <slot />
    </div>
</template>
<style>
.wrapcontainer{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 2rem;
}

</style>