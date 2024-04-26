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
            <p class="additional-text">Connecting you with carriers and clients digitally and safely</p>
            <div class="nav-buttons">
                <router-link to="/Login" class="btn btn-primary">Log In</router-link>
            </div>
        </div>
    </div>
    <div class="black-box"></div>


    <v-container>
      <v-row>
        <v-col cols="12">
            <v-card ref="aboutUsCard" class="mx-auto px-6 py-8 custom-rounded-card-about-us" id="aboutUsCard" elevation="0">
                <section class="about-us">
                  <!-- Image on top (for smaller screens) -->
                  <div class="image-wrapper">
                    <img src="../../assets/programmer.jpg" alt="Image" class="side-image">
                  </div>
                  <div class="text-wrapper">
                    <h2>About Us</h2>
                    <h3>Shiftminds</h3>
                    <p>Welcome to ShiftMinds, where innovation meets efficiency to revolutionize the way businesses operate. At ShiftMinds, we're on a mission to empower organizations with cutting-edge technology solutions tailored to streamline workflows and elevate productivity...</p>
                    <br>
                    <div class="content-wrapper">
                      <!-- Wrap the content you want to hide initially -->
                      <div class="content hide-content">
                        <p>At the core of our ethos lies a commitment to harnessing the power of technology to simplify complexities and drive tangible results. Whether you're a budding startup or an established enterprise, our suite of services is designed to cater to your unique needs, paving the way for seamless operations and unparalleled growth.</p>
                      </div>
                      <!-- Show More Button -->
                      <button class="show-more-btn" @click="toggleContent">Show More</button>
                    </div>
                  </div>
                </section>
              </v-card>

              <!-- What We Do Section -->
              <v-card ref="whatWeDoCard" class="mx-auto px-6 py-8 custom-rounded-card-what-we-do" id="whatWeDoCard" elevation="1">
                <section class="what-we-do">
                  <div class="text-wrapper">
                    <h2>Introducing: CargoBid</h2>
                    <h3>Your Gateway to Seamless Cargo Bidding and Beyond</h3>
                    <p>a revolutionary platform designed to simplify the process of cargo bidding and connect carriers, truckers, and delivery riders with lucrative contracts and clients.</p>
                    <br>
                    <div class="content-wrapper">
                      <!-- Wrap the content you want to hide initially -->
                      <div class="content hide-content">
                        <p>Cargo bidding is a dynamic concept that empowers logistics professionals to compete for contracts by submitting competitive bids or even purchasing available contracts outright. It's a game-changing approach that enables carriers and drivers to maximize their earning potential while offering clients unparalleled flexibility and choice.</p>
                      </div>
                      <!-- Show More Button -->
                      <button class="show-more-btn" @click="toggleContent">Show More</button>
                    </div>
                  </div>
                  <!-- Image on the left side -->
                  <div class="image-wrapper">
                    <img src="../../assets/delivery.jpg" alt="Image" class="side-image">
                  </div>
                </section>
              </v-card>
<!-- Why Use Us Section -->
<div class="why-use-us-section">
    <section class="why-use-us">
        <div class="text-wrapper">
            <h2>Why use us?</h2>
            <!-- Why Use Us Content -->
            <div class="why-use-us-content">
                <!-- Reason 1 -->
                <div class="why-use-reason">
                    <h3>Move and ship anything <img src="../../assets/package-variant.svg" alt="An example icon" class="icon-img" /></h3>
                    <p>Effortlessly transport goods of any size or type to any destination, making logistics seamless and convenient.</p>
                </div>
                <!-- Reason 2 -->
                <div class="why-use-reason">
                    <h3>Best way to connect <img src="../../assets/account-multiple.svg" alt="An example icon" class="icon-img" /></h3>
                    <p>Facilitate direct communication and collaboration between clients and carriers, enhancing efficiency and reducing intermediaries.</p>
                </div>
                <!-- Reason 3 -->
                <div class="why-use-reason">
                    <h3>Safety and Protection <img src="../../assets/security.svg" alt="An example icon" class="icon-img" /></h3>
                    <p>Ensure the security and protection of goods throughout the shipping process, minimizing risks and losses.</p>
                </div>
                <!-- Reason 4 -->
                <div class="why-use-reason">
                    <h3>Saves Money and time <img src="../../assets/account-cash.svg" alt="An example icon" class="icon-img" /></h3>
                    <p>Optimize costs and time by streamlining operations and leveraging competitive bidding to secure the best deals.</p>
                </div>
            </div>
          </div>
          <!-- Image on the right -->
              <img src="../../assets/network.png"  alt="Description of image" class="side-image">
        </section>
        </div>
        </v-col>
      </v-row>



      <!--Three cards at the bottom-->
      <v-row class="mt-5">
        <v-col cols="4">
          <v-card class="text-center card bottom-card" elevation="0">
            <img src="../../assets/expand.png" class="card-image" alt="Super Flexible">
            <div class="pa-3">
              <h3>Super flexible</h3>
              <p>Flexible and customizable solutions for your needs.</p>
            </div>
          </v-card>
        </v-col>
        <v-col cols="4">
          <v-card class="text-center card bottom-card" elevation="0">
            <img src="../../assets/time.png" class="card-image" alt="Less Work for You">
            <div class="pa-3">
              <h3>Less Work for You</h3>
              <p>Automate tasks and reduce manual effort.</p>
            </div>
          </v-card>
        </v-col>
        <v-col cols="4">
          <v-card class="text-center card bottom-card" elevation="0">
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
    <nav class="bottom-navbar">
        <!-- Circular Button -->
        <router-link to="/Login" class="circle-button">
          <span class="plus-sign">+</span>
        </router-link>
    </nav>
  </v-main>
</template>

<script setup>
import { ref, onMounted } from "vue";

const landingPage = ref(null);

onMounted(() => {
  setTimeout(() => {
    landingPage.value.classList.add("animate-drop-down");
  }, 100);

  const showMoreButtons = document.querySelectorAll(".show-more-btn");

  function toggleContent() {
    const content = this.previousElementSibling;
    content.classList.toggle("hide-content");
    this.textContent = content.classList.contains("hide-content") ? "Show More" : "Show Less";
  }

  showMoreButtons.forEach(button => {
    button.addEventListener("click", toggleContent);
  });
});
</script>

<style src="../../css/styles.css" scoped></style>
