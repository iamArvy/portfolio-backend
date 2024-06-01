<template>
    <div class="stack-cont">
        <span class="caption">{{ stack.name }}</span>
        <div class="progress">
            <div
            class="progress-bar"
            role="progressbar"
            :style="{ width: stack.level + '%' }"
            :aria-valuenow="stack.level"
            aria-valuemin="0"
            aria-valuemax="100"
            >
            {{ stack.level }}%
            </div>
        </div>
    </div>
    
</template>

<style scoped>
.caption{
    font-weight: 700;
    margin: 5px;
    color: var(--heading);
}
.progress {
    /* margin-top: 5px; */
    height: 2rem;
    border: 2px solid #fff;
    background-color: #fff;
    box-shadow: 0 0 0 4px var(--herotext);
    padding: 3px;
}

.progress,
.progress-bar {
    border-radius: 30px;
    color: var(--heading);
}

.progress-bar {
    font-size: 15px;
    background-color: var(--herotext);
    justify-content: flex-end;
    font-weight: 600;
    padding-right: 1rem;
    display: flex;
    flex-direction: row;
}
.stack-cont{
    width: 40%;
}
@media screen and (max-width: 760px) {
    /* section{
        padding: 2rem 2rem;
    } */
    .stack-cont{
        width: 100%;
    }
}
@media screen and (max-width: 1000px) {
    .progress-bar {
    font-size: 12px;
}
.progress,.progress-bar {
    border-radius: 20px;
}
.caption{
    margin: 3px;
    font-size: 14px;
}
.progress {
    height: 1.7rem;
    box-shadow: 0 0 0 3px var(--herotext);
    padding: 3px;
}
}
</style>
<script setup>
defineProps({
    stack: Object,
})
</script>