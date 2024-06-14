<template>
    <v-main>
      <div class="landing-page container-fluid" ref="landingPage">
        <!-- Banner Section -->
        <div class="banner row">
          <img src="../../assets/banner_image.jpeg" alt="Banner Image" class="img-fluid col-12">
          <div class="banner-overlay col-12 text-center">
            <h1 class="banner-title">BidGo</h1>
            <p class="banner-slogan">Your Trusted Platform for Cargo Bidding</p>
            <p class="additional-text">Connecting you with carriers and clients digitally and safely</p>
            <div class="nav-buttons">
              <router-link to="/Login" class="btn btn-primary">Log In</router-link>
            </div>
          </div>
        </div>
        <v-row>
          <v-col cols="12">
            <v-card ref="aboutUsCard" class="mx-auto px-6 py-8 custom-rounded-card-about-us" id="aboutUsCard" elevation="0">
              <section class="about-us">
                <div class="image-wrapper d-block d-sm-none">
                  <img src="../../assets/programmer.jpg" alt="Image" class="side-image img-fluid">
                </div>
                <div class="text-wrapper">
                  <h2>About Us</h2>
                  <h3>Shiftminds</h3>
                  <hr class="custom-hr">
                  <p>Welcome to ShiftMinds, where innovation meets efficiency to revolutionize the way businesses operate. At ShiftMinds, we're on a mission to empower organizations with cutting-edge technology solutions tailored to streamline workflows and elevate productivity...</p>
                  <br>
                  <div class="content-wrapper">
                    <div class="content hide-content">
                      <p>At the core of our ethos lies a commitment to harnessing the power of technology to simplify complexities and drive tangible results. Whether you're a budding startup or an established enterprise, our suite of services is designed to cater to your unique needs, paving the way for seamless operations and unparalleled growth.</p>
                    </div>
                    <button class="show-more-btn btn btn-secondary" @click="toggleContent">Show More</button>
                  </div>
                </div>
              </section>
            </v-card>

            <!-- What We Do Section -->
            <v-card ref="whatWeDoCard" class="mx-auto px-6 py-8 custom-rounded-card-what-we-do" id="whatWeDoCard" elevation="0">
              <section class="what-we-do row">
                <div class="text-wrapper col-12 col-md-6">
                  <h2>Introducing: CargoBid</h2>
                  <h3>Your Gateway to Seamless Cargo Bidding and Beyond</h3>
                  <hr class="custom-hr-what-we-do">
                  <p>a revolutionary platform designed to simplify the process of cargo bidding and connect carriers, truckers, and delivery riders with lucrative contracts and clients.</p>
                  <br>
                  <div class="content-wrapper">
                    <div class="content hide-content">
                      <p>Cargo bidding is a dynamic concept that empowers logistics professionals to compete for contracts by submitting competitive bids or even purchasing available contracts outright. It's a game-changing approach that enables carriers and drivers to maximize their earning potential while offering clients unparalleled flexibility and choice.</p>
                    </div>
                    <button class="show-more-btn btn btn-secondary" @click="toggleContent">Show More</button>
                  </div>
                </div>
                <div class="image-wrapper col-12 col-md-6">
                  <img src="../../assets/delivery.jpg" alt="Image" class="side-image img-fluid">
                </div>
              </section>
            </v-card>

          <!-- Orders Carousel -->
          <h3 class="mx-auto px-6 py-8">Orders</h3>
          <v-carousel ref="carouselRef" class="custom-carousel">
            <v-carousel-item v-if="items.length === 0" key="placeholder-item">
                <v-card class="mx-auto" max-width="344" outlined>
                  <v-card-title>Placeholder Title</v-card-title>
                  <v-card-subtitle>Placeholder Subtitle</v-card-subtitle>
                  <v-card-text>
                    <p>Loading...</p>
                  </v-card-text>
                </v-card>
              </v-carousel-item>

            <!-- Carousel items -->
            <v-carousel-item v-for="(item, index) in items" :key="index" class="carousel-item-custom">
              <v-card class="mx-auto" max-width="344" outlined @click="showDialog">
                <!-- Card content -->
                <img src="../../assets/package-alt.png" alt="Image" class="side-image img-fluid small-image">
                <v-card-title>{{ item.item_name }}</v-card-title>
                <v-card-subtitle>{{ item.item_client }}</v-card-subtitle>
                <v-card-text>
                  <p>From: {{ item.item_from }}</p>
                  <p>To: {{ item.item_destination }}</p>
                  <p>Pickup Time: {{ item.item_pickup_time }}</p>
                  <p>Dropoff Time: {{ item.item_dropoff_time }}</p>
                  <p>Quote: ${{ item.item_quote }}</p>
                </v-card-text>
              </v-card>
            </v-carousel-item>
          </v-carousel>




            <!-- Why Use Us Section -->
            <div class="why-use-us-section row my-4">
              <section class="why-use-us col-12">
                <div class="text-wrapper text-center">
                  <h2>Why use us?</h2>
                  <!-- Why Use Us Content -->
                  <div class="why-use-us-content row">
                    <!-- Reason 1 -->
                    <div class="why-use-reason col-12 col-md-6">
                      <h3>Move and ship anything <img src="../../assets/package-variant.svg" alt="An example icon" class="icon-img" /></h3>
                      <p>Effortlessly transport goods of any size or type to any destination, making logistics seamless and convenient.</p>
                    </div>
                    <!-- Reason 2 -->
                    <div class="why-use-reason col-12 col-md-6">
                      <h3>Best way to connect <img src="../../assets/account-multiple.svg" alt="An example icon" class="icon-img" /></h3>
                      <p>Facilitate direct communication and collaboration between clients and carriers, enhancing efficiency and reducing intermediaries.</p>
                    </div>
                    <!-- Reason 3 -->
                    <div class="why-use-reason col-12 col-md-6">
                      <h3>Safety and Protection <img src="../../assets/security.svg" alt="An example icon" class="icon-img" /></h3>
                      <p>Ensure the security and protection of goods throughout the shipping process, minimizing risks and losses.</p>
                    </div>
                    <!-- Reason 4 -->
                    <div class="why-use-reason col-12 col-md-6">
                      <h3>Saves Money and time <img src="../../assets/account-cash.svg" alt="An example icon" class="icon-img" /></h3>
                      <p>Optimize costs and time by streamlining operations and leveraging competitive bidding to secure the best deals.</p>
                    </div>
                  </div>
                </div>
                <!-- Image on the right -->
                <img src="../../assets/network.png" alt="Description of image" class="side-image img-fluid col-12">
              </section>
            </div>
          </v-col>
        </v-row>
        <!-- Dialog for account creation message -->
        <v-dialog v-model="dialog" max-width="500">
            <v-card>
              <v-card-title class="headline">Account Required</v-card-title>
              <v-card-text>
                You need to make an account to place any bids.
              </v-card-text>
              <v-card-actions>
                <router-link to="/Login" class="btn btn-primary">
                  <v-btn color="primary">Log In</v-btn>
                </router-link>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="dialog = false">Close</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
      </div>
    </v-main>
    <NavBar/>
  </template>

  <script setup>
import { ref, onMounted, nextTick } from "vue";
import axios from "axios";
import NavBar from '../components/NavBar.vue';

const landingPage = ref(null);
const items = ref([]);
const dialog = ref(false);  // State for dialog visibility
const carouselRef = ref(null);


const fetchItems = async () => {
  try {
    const response = await axios.get('/items');
    items.value = response.data;
    console.log('Fetched items:', items.value);
  } catch (error) {
    console.error('Error fetching items:', error);
  }
};

// Function to show the first carousel item
const showFirstCarouselItem = () => {
  if (carouselRef.value && items.value.length > 0) {
    carouselRef.value.cycleTo(0); // Cycle to the first item (index 0)
  }
};

// Function to show the dialog
const showDialog = () => {
  dialog.value = true;  // Show the dialog
};

// Function to toggle content visibility
const toggleContent = (event) => {
  const content = event.target.previousElementSibling;
  content.style.display = content.style.display === 'none' ? 'block' : 'none';
  event.target.textContent = content.style.display === 'none' ? 'Show More' : 'Show Less';
};

// On mounted hook to initialize actions
onMounted(async () => {
  // Initial animation after DOM is settled
  setTimeout(() => {
    landingPage.value.classList.add("animate-drop-down");
  }, 100);

  // Attach click event handlers to "Show More" buttons
  const showMoreButtons = document.querySelectorAll(".show-more-btn");
  showMoreButtons.forEach(button => {
    button.addEventListener("click", (event) => {
      toggleContent(event);
    });
  });

  // Fetch items from API and show the first carousel item
  await fetchItems();
  showFirstCarouselItem();
});
</script>

  <style src="../../css/styles.css" scoped></style>
