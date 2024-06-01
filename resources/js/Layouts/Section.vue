<template>
    <section>
        <div class="header" v-if="$slots.header">
            <span class="section-header">
                <slot name="header" />
            </span>
        </div>
        <div class="desc" v-if="$slots.desc">
            <div class="section-desc">
                <slot name="desc" />
            </div>

        </div>
        <div class="main">
            <slot />
        </div>
    </section>
</template>
<style>
.header{
    display: flex;
    align-items: center;
    color: var(--heading);
}
.header{
    margin-bottom: 1rem;
}
.desc{
    font-weight: 400;
    font-size: 20px;
    color:var(--heading);
    text-align: center;
    margin-bottom: 2rem;
}
.section-header{
    width: 100%;
    font-weight: 42;
    text-align: center;
}
section{
    text-align: left;
    padding: 2rem 6rem;
    font-family: Poppins, sans-serif;
}
.header span{
    font-weight:bold;
    font-size: 42px;
}
@media screen and (min-width: 1500px) {
    section{
        padding: 2rem 8rem;
    }
}
@media screen and (max-width: 1025px) {
    section{
        padding: 2rem 4rem;
    }
    .header span{
        font-size: 35px;
    }
    .header{
        margin-bottom: 10px;
    }
    .desc{
        font-size: 18px;
        margin-bottom: 1.5rem;
    }
}
@media screen and (max-width: 760px) {
    section{
        padding: 2rem 2rem;
    }
    .header span{
        font-size: 30px;
    }
    .header{
        margin-bottom: 5px;
    }
    .desc{
        font-size: 15px;
        margin-bottom: 1rem;
    }
}
</style>