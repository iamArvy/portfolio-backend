<template>
    <div class="vg-footer">
    <!-- <h1 class="text-center">{{bname}}</h1> -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4 py-3">
          <div class="footer-info">
            <p>Where to find me</p>
            <hr class="divider">
            <!-- <p class="fs-large fg-white">{{currently}}</p> -->
          </div>
        </div>
        <div class="col-md-6 col-lg-3 py-3">
          <div class="float-lg-right">
            <p>Follow me</p>
            <hr class="divider">
            <ul class="list-unstyled">
              <!-- <li v-for="social in socials" :key="social.id"> -->
                <!-- <span> {{ social.name }}:   </span> -->
                <!-- <a :href="social.url">{{social.handle}}</a> -->
              <!-- </li> -->
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 py-3">
          <div class="float-lg-right">
            <p>Contact me</p>
            <hr class="divider">
            <ul class="list-unstyled">
              <!-- <li>{{email}}</li> -->
              <!-- <li>{{phone}}</li> -->
            </ul>
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-3">
        <div class="col-12">
          <!-- <p class="text-center mb-0 mt-4">Copyright &copy;2023. All right reserved | {{bname}}</p> -->
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.vg-footer {
    position:relative;
    bottom: 0;
    display: block;
    margin: 0;
    padding: 50px 0 0 0;
    background-color: #171925;
    color: #9FA2AB;
}

.footer-info {
    max-width: 350px;
}

.vg-footer .list-unstyled a,
.vg-footer .list-unstyled li {
    margin-bottom: 6px;
    font-size: 21px;
    color: #fff;
}

.vg-footer .form-control {
    padding-left: 20px;
    padding-right: 20px;
    background-color: #202334;
    color: #9FA2AB;
    border: 0;
    box-shadow: 0 2px 8px rgba(16, 18, 27, 0.6);
}

.vg-footer .form-control:focus {
    box-shadow: 0 2px 8px rgba(16, 18, 27, 0.6);
}

.vg-footer form .btn-theme {
    margin: 0;
    padding-top: 14px;
    padding-bottom: 14px;
    box-shadow: none;
    border-radius: 0 4px 4px 0;
    z-index: 9;
}
</style>

<!-- <script>
import {mapGetters, mapState} from 'vuex'

export default{
  computed:{
    ...mapGetters('details',['files', 'details']),
    ...mapState('details',['socials']),
    logo(){
      return this.files['white logo']
    },
    bname(){
      return this.details['Brand Name']
    },
    phone(){
      return this.details['Phone']
    },
    email(){
      return this.details['Email']
    },
    currently(){
      return this.details['Currently']
    }
  }
}
</script> -->