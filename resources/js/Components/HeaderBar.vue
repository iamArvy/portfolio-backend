<script setup>
const data = defineProps({
  brand: String
})
</script>
<template>
  <header>
    <nav class="navbar" data-aos="fade-down">
      <div class="navbar-container container">
          <input type="checkbox" name="" id="">
          <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
          </div>
          <div class="menu-items">
            <ul class="routes">
              <li><router-link to="/" class="navs" active-class="activity">Home</router-link></li>
              <li><router-link to="/projects" class="navs" active-class="activity">Projects</router-link></li>
              <li><router-link to="/messages" class="navs" active-class="activity">Messages</router-link></li>
            </ul>
            <div class="acc">
              <div class="ifauth" >
                <button class="log" name="logout" >Logout</button>
              </div>
              <div class="ifnotauth" >
                <router-link to="/login">
                  <button class="log" name="login">Sign In</button>
                </router-link>
              </div>
            </div>  
          </div>
          <div class="brd">
            <!-- <img :src="logo" alt=""> -->
            <h1 class="logo">{{ $page.props.info.brand }}</h1>
          </div>
      </div>
    </nav>
  </header>
</template>

<!-- <script>
import { mapState,mapGetters, mapActions } from 'vuex'

export default{
  computed:{
    ...mapState('auth', ['isAuthenticated', 'csrfToken', 'authToken']),
    ...mapGetters('details',['files', 'details']),
    logo(){
      return this.files['white logo']
    },
    bname(){
      return this.details['Brand Name']
    }
  },
  created(){
    this.getUser
  },
  methods:{
    ...mapActions('auth', ['logout', 'getUser']),
    logmeout(){
        this.logout()
        location.reload()
      }
  }
}
</script> -->

<style scoped>
.container {
max-width: 1200px;
width: 90%;
margin: auto;
}


/* desktop mode............/// */
.navbar input[type="checkbox"],
.navbar .hamburger-lines {
display: none;
}
.brd>img{
  width:40px;
  animation: logorotation 3s linear;
}
.brd{
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
}
@keyframes logorotation{
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(-360deg);
  }
}
.navbar {
position: fixed;
width: 100%;
background-color: rgba(104, 102, 102);
color: white;
opacity: 0.85;
z-index: 12;
top: 0;

}

.navbar-container {
display: flex;
flex-direction: row-reverse;
justify-content: space-between;
height: 64px;
align-items: center;
}
.menu-items{
  display: flex;
  flex-direction: row-reverse;
  justify-content: space-evenly;
  gap: 2rem;
  align-items: center;
}
.log{
  color:white;
  border: 2px solid white;
  border-radius: 10px;
  padding: 5px 10px;
  background-color: unset;
}

.log:hover{
  color: #2960f7;
  border-color: #2960f7;
}

.routes {
order: 2;
display: flex;
flex-direction: row;
align-items: center;
margin: unset;
}

.routes li {
list-style: none;
margin-left: 1.5rem;
margin-bottom: 0.5rem;
font-size: 1.2rem;
}

.routes .navs {
text-decoration: none;
color: white;
font-weight: 500;
transition: color 0.3s ease-in-out;
}

.routes .navs:hover {
color: #2960f7;
transition: color 0.3s ease-in-out;
}
.routes .activity{
color:#2960f7;
}

.logo {
order: 1;
font-size: 2.3rem;
margin-bottom: 0.5rem;
}
@media (max-width: 768px) {
.navbar {
opacity: 0.95;
position: fixed;
width: 100vw;
}

.navbar-container input[type="checkbox"],
.navbar-container .hamburger-lines {
display: block;
}

.navbar-container {
display: block;
position: relative;
height: 64px;
}

.navbar-container input[type="checkbox"] {
position: absolute;
display: block;
height: 32px;
width: 30px;
top: 20px;
left: 20px;
z-index: 5;
opacity: 0;
}

.navbar-container .hamburger-lines {
display: block;
height: 23px;
width: 35px;
position: absolute;
top: 17px;
left: 20px;
z-index: 2;
display: flex;
flex-direction: column;
justify-content: space-between;
}

.navbar-container .hamburger-lines .line {
display: block;
height: 4px;
width: 100%;
border-radius: 10px;
background: white;
}

.navbar-container .hamburger-lines .line1 {
transform-origin: 0% 0%;
transition: transform 0.4s ease-in-out;
}

.navbar-container .hamburger-lines .line2 {
transition: transform 0.2s ease-in-out;
}

.navbar-container .hamburger-lines .line3 {
transform-origin: 0% 100%;
transition: transform 0.4s ease-in-out;
}

.navbar .menu-items {
  margin-top: unset;
padding-top: 20px;
background-color: rgba(104, 102, 102);
height: 100vh;
width: 100vw;
max-width: 100vw;
transform: translate(-150%);
top: 0;
margin-left: -70px;
padding-left: 50px;
transition: transform 0.5s ease-in-out;
position: absolute;
display: flex;
flex-direction: column-reverse;
gap: 2rem;
align-items: center;
opacity: unset;
z-index: 1;
}
.routes{
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-left: unset;
}
.acc{
  display: flex;
  flex-direction: column;
  align-items: center;
}
.navbar .menu-items li {
margin-bottom: 1.5rem;
font-size: 1.3rem;
font-weight: 500;
text-align: left;
margin-left: unset;
}

.logo {
font-size: 2rem;
}
.brd{
  gap: 5px
}

.brd>img{
  width: 40px;
}

.navbar-container input[type="checkbox"]:checked ~ .menu-items {
transform: translateX(0);
}

.navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line1 {
transform: rotate(35deg);
}

.navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line2 {
transform: scaleY(0);
}

.navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line3 {
transform: rotate(-35deg);
}
}
</style>