<script setup>
defineProps({
    project:Object,
})
</script>
<template>
    <div class="project">
        <div class="projectimg">
            <img :src="project.img" alt="">
        </div>
        <div class="project-desc">
            <div class="project-title">
                <span>
                    {{ project.name }}
                </span>
            </div>
            <div class="project-about">
                <p>
                    {{ project.about }}
                </p>
            </div>
            <div class="project-stack">
                <span class="stack-head">Tech Stack: </span>
                <span class="project-stacks">{{project.stacks}}</span>
            </div>
            <div class="project-actions">
                <div class="live-preview">
                    <span><i class="fa-solid fa-link"></i></span>
                    <a :href="project.url">View Live</a>
                </div>
                <div class="view-code">
                    <span><i class="fa-brands fa-github"></i></span>
                    <a :href="project.git">View Code</a>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.project{
    width: 300px;
    height: 450px;
    /* border: 2px solid black; */
    border-radius: 20px;
    margin-bottom: 2rem;
    overflow: hidden;
    box-shadow:  13px -13px 26px #c4c4c4,
             -13px 13px 26px #ffffff;
    
}
.projectimg{
    height: 45%;
    background-color: blue;
}
.project-about{
    font-weight: 300;
    font-size: 18px;
}
.project-title{
    font-weight: 500;
    font-size: 28px;
}
.stack-head{
    font-weight: 400;
    font-size: 16px;
}
.project-stacks{
    font-weight: 300;
    font-size: 16px;
}
.project-actions{
    font-weight: 400;
    font-size: 16px;
    align-self: flex-baseline;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.project-desc{
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    height: 55%;
}
.projectimg>img{
    height: 100%;
    width: 100%;
}
@media screen and (max-width: 760px) {
    .project{
        width: 270px;
        height: 370px;
    }
.project-desc{
    padding: 10px;
}
.project-about{
    font-size: 15px;
}
.project-title{
    font-size: 19px;
}
.stack-head{
    font-size: 13px;
}
.project-stacks{
    font-size: 13px;
}
.project-actions{
    font-size: 13px;
}
}
@media screen and (max-width: 1000px) {
    .project{
        width: 285px;
        height: 420px;
    }
.project-desc{
    padding: 11px;
}
.project-about{
    font-size: 16px;
}
.project-title{
    font-size: 20px;
}
.stack-head{
    font-size: 14px;
}
.project-stacks{
    font-size: 14px;
}
.project-actions{
    font-size: 14px;
}
}
</style>