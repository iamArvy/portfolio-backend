<template>
    <div class="myloader">
        <img src="https://vorteks.pythonanywhere.com/media/files/new_logo_black.png" alt="">
    </div>
</template>
<style scoped>
.myloader {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
img{
  width: 8vw;
  animation: rotate 2s linear infinite;
}
@keyframes rotate{
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(-360deg);
  }
  0%{
    width: 8vw;
  }
  50%{
    width: 6vw;
  }
  100%{
    width: 8vw;
  }
}

</style>