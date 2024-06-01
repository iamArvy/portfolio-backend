<template>
        <div class="wrapper" >
            <div class="cont">
                <slot />
            </div>
        </div>
</template>

<style>
.wrapper{
    background-image: url("../../assets/bg2.jpg");
    background-repeat: no-repeat;
    background-position: center;
    /* enable-background: ; */
    background-size: cover;
    width: 100vw;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    display: flex;
    align-items: center;   
    justify-content: center; 
}
.cont{
    width: 100%;
  max-width: 28rem; /* Equivalent to sm:max-w-md */
  margin-top: 1.5rem; /* Equivalent to mt-6 */
  padding: 1.5rem; /* Equivalent to px-6 and py-4 */
  background-color: transparent; /* Equivalent to bg-white */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Equivalent to shadow-md */
  overflow: hidden;
  border-radius: 0.375rem;
  border: 1px solid white;
}
</style>
