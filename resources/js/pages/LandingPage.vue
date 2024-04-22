<template>
  <v-main>
    <div class="landing-page" ref="landingPage">
        <!-- Banner Section -->
    <!-- Banner Section -->
    <div class="banner">
        <img src="../../assets/banner_image.jpeg" alt="Banner Image">
        <div class="banner-overlay">
          <h1 class="banner-title">BidGo</h1>
          <p class="banner-slogan">Your Trusted Platform for Cargo Bidding</p>
          <div class="nav-buttons">
            <router-link to="/Login" class="btn btn-primary">Log In</router-link>
          </div>
        </div>
      </div>


    <v-container>
      <v-row>
        <v-col cols="12">
          <!-- Navigation Buttons -->


          <!-- Card with BidGo Title and About Us / What We Do Sections -->
          <v-card class="mx-auto px-6 py-8 custom-rounded-card" elevation="16">
            <!-- About Us Section -->
            <section class="about-us">
              <h2>About Us</h2>
              <p>We are a company dedicated to providing solutions...</p>
            </section>
          </v-card>
          <v-card class="mx-auto px-6 py-8 custom-rounded-card" elevation="16">
            <!-- What We Do Section -->
            <section class="what-we-do">
              <h2>What We Do</h2>
              <p>We specialize in...</p>
            </section>
          </v-card>
        </v-col>
      </v-row>

      <!--Three cards at the bottom-->
      <v-row class="mt-5">
        <v-col cols="4">
          <v-card class="text-center card bottom-card">
            <img src="../../assets/expand.png" class="card-image" alt="Super Flexible">
            <div class="pa-3">
              <h3>Super flexible</h3>
              <p>Flexible and customizable solutions for your needs.</p>
            </div>
          </v-card>
        </v-col>
        <v-col cols="4">
          <v-card class="text-center card bottom-card">
            <img src="../../assets/time.png" class="card-image" alt="Less Work for You">
            <div class="pa-3">
              <h3>Less Work for You</h3>
              <p>Automate tasks and reduce manual effort.</p>
            </div>
          </v-card>
        </v-col>
        <v-col cols="4">
          <v-card class="text-center card bottom-card">
            <img src="../../assets/money.png" class="card-image" alt="Saves Time">
            <div class="pa-3">
              <h3>Saves Time</h3>
              <p>Efficient processes to save you time and effort.</p>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
    </div>
  </v-main>
</template>

  <script>
import { ref, onMounted } from "vue";

export default {
  name: "LandingPage",
  setup() {
    const landingPage = ref(null);

    onMounted(() => {
      setTimeout(() => {
        landingPage.value.classList.add("animate-drop-down");
      }, 100);
    });

    return { landingPage };
  },
};
</script>


<style src="../../css/styles.css" scoped></style>
