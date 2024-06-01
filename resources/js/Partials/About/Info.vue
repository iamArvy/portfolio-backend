<script setup>
</script>
<template>
        <!-- <ul>
            <li class="timeline">
                <details class="panel">
                    <summary>Hello</summary>
                    <p>Hello, How are you?</p>
                </details>
            </li>
        </ul> -->
        <div class="aboutstuff">
            <div class="aboutsec">
                <div class="img-cont">
                    <div class="img">
                        <img :src="$page.props.profile_photo_url" alt="">
                    </div>
                </div>
            </div>
            <div class="aboutsec">
                <h1 class="myname">{{$page.props.info.name}}</h1>
                <h5 class="fg-theme mb-3 myname">{{$page.props.info.job_desc}}</h5>
                <p class="text-muted">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form but the majority have suffered alteration in some</p>
                <ul class="theme-list">
                    <li><b>From: </b>{{ $page.props.info.origin }}</li>
                    <li><b>Lives In: </b>{{ $page.props.info.currently }}</li>
                    <li><b>Gender: </b>{{ $page.props.info.gender }}</li>
                </ul>
                <a :href="$page.props.info.cv"><button class="mybutton">Download CV</button></a>
            </div>
        </div>
        
        
</template>
<style scoped>

li>b{
    color: var(--heading);
}
.aboutstuff{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    margin-bottom: 2rem;
    /* min-height: 70vh; */
}
.aboutsec{
    max-width: 50%;
}
.img-cont{
        background: var(--herotext);
        /* border-radius: 50%; */
        width: 230px;
        height: 230px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }
    .img{
        /* border-radius: 50%; */
        width: 100%;
        /* height: 240px; */
        overflow: hidden;
        margin: 10px 10px -10px -10px;
    }
    img{
        width: 100%;
        height: 100%;
    }
.myname{
    font-family: Poppins, sans-serif;
    font-weight: 600;
    margin: 0;
    color: var(--heading);
}
.theme-list {
    position: relative;
    padding-left: 30px;
    list-style: none;
    z-index: 10;
}

.theme-list::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 9px;
    margin: auto;
    width: 1px;
    height: 85%;
    background-color: #cacdd6;
    z-index: -1;
}

.theme-list li {
    display: block;
    margin: 5px 0;
}

.theme-list li::before {
    content: "";
    position: absolute;
    left: 3px;
    margin: 6px 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #fff;
    border: 2px solid #888;
    border-color: var(--herotext);
}
.timeline{
    list-style:none;
}
summary{
    display: block;
    user-select: none;
}
.mybutton{
    background-color: var(--herotext);
    color: var(--heading);
    font-weight: 700;
    width: 150px;
    height: 40px;
    border-radius: 15px;
    margin-right: auto;
}
@media screen and (max-width: 760px) {
    /* section{
        padding: 2rem 2rem;
    } */
    .aboutstuff{
        display: flex;
     flex-direction: column;
     gap: 2rem;
    }
    .aboutsec{
        max-width: unset;
    }
}

</style>