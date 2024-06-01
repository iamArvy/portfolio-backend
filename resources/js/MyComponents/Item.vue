<script setup>
// const data = defineProps({


// })
</script>
<template>
        <div class="about-item">
            <div class="line">
                <div class="itemname dark-content"><span>Front End Web Devlopment</span></div>
                <div class="itemtype certified"><span>Certified</span></div>
            </div>
            <div class="line">
                <div class="itemlocation small"><span>Location</span></div>
                <div class="itemdate small"><span>2017</span></div>
            </div>
            <hr>
        </div>
    
</template>
<style>
.itemname{
    font-size: 20px;
    font-weight: 600;
}
.certified{
    font-size: 9px;
    font-weight: 700;
}
.line{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin: 10px 5px;
}
.small{
    font-size: 15px;
    font-weight: 400;
}
.itemtype{
    font-size: 9px;
    font-weight: bold;
    border-radius: 20px;
    background-color: greenyellow;
    color: green;
    padding: 10px;
}
.list-item{
    margin: 1rem 0;
}
@media screen and (max-width: 760px) {
    .itemtype{
        font-size: 8px;
        border-radius: 18px;
        padding: 8px;
    }
    .small{
    font-size: 12px;
}
.line{
    margin: 8px 3px;
}
.itemname{
    font-size: 14px;
}
.certified{
    font-size: 6px;
}
}
@media screen and (max-width: 1000px) {
    .itemtype{
        border-radius: 18px;
        padding: 8px;
    }
    .small{
    font-size: 13px;
}
.itemname{
    font-size: 15px;
}
.certified{
    font-size: 7px;
}
}
</style>