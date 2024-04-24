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
    <div class="black-box"></div>


    <v-container>
      <v-row>
        <v-col cols="12">
          <!-- Navigation Buttons -->
          <!-- Card with BidGo Title and About Us / What We Do Sections -->
          <v-card class="mx-auto px-6 py-8 custom-rounded-card" elevation="0">
            <section class="about-us">
                <!-- Image on top (for smaller screens) -->
                <div class="image-wrapper">
                    <img src="../../assets/programmer.jpg" alt="Image" class="side-image">
                </div>
                <div class="text-wrapper">
                    <h2>About Us</h2>
                    <h3>Shiftminds</h3>
                    <div class="content">
                        <p>Welcome to ShiftMinds, where innovation meets efficiency to revolutionize the way businesses operate. At ShiftMinds, we're on a mission to empower organizations with cutting-edge technology solutions tailored to streamline workflows and elevate productivity...</p>
                        <br>
                        <p>At the core of our ethos lies a commitment to harnessing the power of technology to simplify complexities and drive tangible results. Whether you're a budding startup or an established enterprise, our suite of services is designed to cater to your unique needs, paving the way for seamless operations and unparalleled growth.</p>
                    </div>
                </div>
            </section>
        </v-card>
        <v-card class="mx-auto px-6 py-8 custom-rounded-card" elevation="0">
            <!-- What We Do Section -->
            <section class="what-we-do">
                <div class="text-wrapper">
                    <h2>Introducing: CargoBid</h2>
                    <h3> Your Gateway to Seamless Cargo Bidding and Beyond</h3>

                    <p>a revolutionary platform designed to simplify the process of cargo bidding and connect carriers, truckers, and delivery riders with lucrative contracts and clients.</p>

                    <br>

                    <p>Cargo bidding is a dynamic concept that empowers logistics professionals to compete for contracts by submitting competitive bids or even purchasing available contracts outright. It's a game-changing approach that enables carriers and drivers to maximize their earning potential while offering clients unparalleled flexibility and choice.</p>
                </div>
                <!-- Image on the left side -->
                <div class="image-wrapper">
                    <img src="../../assets/delivery.jpg" alt="Image" class="side-image">
                </div>
            </section>
        </v-card>

        <section class="why-use-us">
            <div class="text-wrapper">
              <h2>Why use us?</h2>
              <!-- Add your content for the How It Works section here -->
              <h3>Move and ship anything</h3>
              <h3>Best way to connect with clients and carriers</h3>
              <h3>Safety and Protection</h3>
              <h3>Shipment Complete</h3>


            </div>
          </section>
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

<script setup>
import { ref, onMounted } from "vue";

const landingPage = ref(null);

onMounted(() => {
  setTimeout(() => {
    landingPage.value.classList.add("animate-drop-down");
  }, 100);
});
</script>

<style src="../../css/styles.css" scoped></style>
