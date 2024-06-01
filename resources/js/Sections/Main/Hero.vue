<script setup>

</script>
<template  id="home">
    <div class="vg-page page-home" >
        <div class="overlay"></div>
        <div class="caption">
            <h1 class="fw-normal">Welcome</h1>
            <h2 class="">I'm {{$page.props.info.nickname}}</h2>
            <!-- <p class="tagline">Web Developer</p> -->
        </div>
    </div>
</template>

<style>
/* Header Background (Bar): Dark blue (#101357)
Header Text: White (#FFFFFF)
Text on Image: Light blue (#00a0a0)
Golden Sunset:
Header Background (Bar): Goldenrod yellow (#fbaf08)
Header Text: White (#FFFFFF)
Text on Image: Dark blue (#101357)
Elegant Twilight:
Header Background (Bar): Purple (#800080)
Header Text: White (#FFFFFF)
Text on Image: Light blue (#00a0a0)
Modern Monochrome:
Header Background (Bar): Gray (#808080)
Header Text: White (#FFFFFF)
Text on Image: Dark blue (#101357)
Nature’s Harmony:
Header Background (Bar): Green (#008000)
Header Text: White (#FFFFFF)
Text on Image: Dark blue (#101357) */

/* Gold and Black:
Header Background (Bar): Black (#000000)
Header Text: Gold (#FFD700)
Text on Image: White (#FFFFFF)
Crimson and Charcoal:
Header Background (Bar): Charcoal gray (#333333)
Header Text: Crimson red (#DC143C)
Text on Image: Light gray (#CCCCCC)
Emerald and Midnight:
Header Background (Bar): Midnight blue (#191970)
Header Text: Emerald green (#008000)
Text on Image: Ivory (#FFFFF0)
Amber and Slate:
Header Background (Bar): Slate gray (#708090)
Header Text: Amber (#FFBF00)
Text on Image: Light gray (#D3D3D3)
Burgundy and Pewter:
Header Background (Bar): Pewter gray (#808080)
Header Text: Burgundy (#800020)
Text on Image: Ivory (#FFFFF0) */
.vg-page {
    position: relative;
    padding: 70px 16px;
    color: #FFBF00;
    z-index: 10;
    overflow: hidden;
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background-color: #00000080; /* Hexadecimal color code with alpha channel (80 represents 50% opacity) */
}
.page-home {
    font-family: Poppins,sans-serif;
    font-weight: 600;
    background: url('../../../assets/bg1.jpg');
    display: block;
    width: 100;
    height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    overflow: hidden;
}

.page-home::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
}

.page-home .caption {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
    z-index: 10;
}

.page-home .caption h1 {
    font-size: 3rem;
}

.page-home .caption .tagline {
    margin-top: 8px;
    padding: 15px 40px;
    background-color: #fddbd7;
    color: #EF3724;
    border-radius: 40px;
    font-weight: 500;
    font-size: 18px;
}
</style>