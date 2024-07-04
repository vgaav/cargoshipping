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
            <div class="container mx-auto px-3 py-5">
              <div class="relative bg-orange-400 rounded-lg overflow-hidden w-full p-5 mx-auto lg:max-w-screen-lg">
                  <div class="block sm:hidden w-full mb-4 text-center">
                      <img src="../../assets/programmer.jpg" alt="Image" class="w-3/4 h-auto rounded-md mx-auto">
                  </div>
                  <!-- Content section with background overlay -->
                  <section class="relative mb-10 flex flex-wrap p-5 rounded-lg z-10">
                      <!-- Text content for larger screens -->
                      <div class="w-full sm:w-7/12 md:w-1/2 sm:pr-4">
                          <h2 class="text-xl md:text-2xl mb-2">About Us</h2>
                          <h3 class="text-lg md:text-xl font-bold">Shiftminds</h3> <!-- Added font-bold class -->
                          <hr class="border-t-2 border-gray-400 my-4">
                          <p class="text-base md:text-lg text-black mb-4">
                              Welcome to ShiftMinds, where innovation meets efficiency to revolutionize the way businesses operate. At ShiftMinds, we're on a mission to empower organizations with cutting-edge technology solutions tailored to streamline workflows and elevate productivity...
                          </p>

                          <!-- Show more content, initially hidden on small screens -->
                          <div v-if="showMore || isLargeScreen" class="text-base md:text-lg text-black mb-4">
                              At the core of our ethos lies a commitment to harnessing the power of technology to simplify complexities and drive tangible results. Whether you're a budding startup or an established enterprise, our suite of services is designed to cater to your unique needs, paving the way for seamless operations and unparalleled growth.
                          </div>

                          <!-- Show more button for small screens -->
                          <button v-if="!isLargeScreen" @click="toggleContent" class="btn-secondary mt-4 px-4 py-2 bg-gray-600 text-white hover:bg-gray-800 rounded">
                              {{ showMore ? 'Show Less' : 'Show More' }}
                          </button>
                      </div>

                      <!-- Image block with gradient for larger screens -->
                      <div class="hidden sm:block sm:w-5/12 md:w-1/2 text-center relative">
                          <div class="absolute inset-0 bg-gradient-to-l from-transparent to-orange-400 rounded-md"></div>
                          <img src="../../assets/programmer.jpg" alt="Image" class="w-full h-40 md:h-full object-cover rounded-md">
                      </div>
                  </section>
              </div>
          </div>


          <div class="container mx-auto px-3 py-5">
            <div class="relative bg-orange-400 rounded-lg overflow-hidden w-full p-5 mx-auto lg:max-w-screen-lg">
                <div class="block sm:hidden w-full mb-4 text-center">
                    <img src="../../assets/delivery.jpg" alt="Image" class="w-3/4 h-auto rounded-md mx-auto">
                </div>
                <!-- Content section with background overlay -->
                <section class="relative mb-10 flex flex-wrap p-5 rounded-lg z-10">
                    <!-- Text content for larger screens -->
                    <div class="w-full sm:w-7/12 md:w-1/2 sm:pr-4">
                        <h2 class="text-xl md:text-2xl mb-2 font-bold">Introducing: CargoBid</h2>
                        <h3 class="text-lg md:text-xl">Your Gateway to Seamless Cargo Bidding and Beyond</h3>
                        <hr class="border-t-2 border-gray-400 my-4">
                        <p class="text-base md:text-lg text-black mb-4">
                            A revolutionary platform designed to simplify the process of cargo bidding and connect carriers, truckers, and delivery riders with lucrative contracts and clients.
                        </p>

                        <!-- Show more content, initially hidden on small screens -->
                        <div v-if="showMore || isLargeScreen" class="text-base md:text-lg text-black mb-4">
                            Cargo bidding is a dynamic concept that empowers logistics professionals to compete for contracts by submitting competitive bids or even purchasing available contracts outright. It's a game-changing approach that enables carriers and drivers to maximize their earning potential while offering clients unparalleled flexibility and choice.
                        </div>

                        <!-- Show more button for small screens -->
                        <button v-if="!isLargeScreen" @click="toggleContent" class="btn-secondary mt-4 px-4 py-2 bg-gray-600 text-white hover:bg-gray-800 rounded">
                            {{ showMore ? 'Show Less' : 'Show More' }}
                        </button>
                    </div>

                    <!-- Image block with gradient for larger screens -->
                    <div class="hidden sm:block sm:w-5/12 md:w-1/2 text-center relative">
                        <div class="absolute inset-0 bg-gradient-to-l from-transparent to-orange-400 rounded-md"></div>
                        <img src="../../assets/delivery.jpg" alt="Image" class="w-full h-40 md:h-full object-cover rounded-md">
                    </div>
                </section>
            </div>
        </div>


   <h1 class="text-2xl mx-auto px-6 py-8">Orders</h1>
<!-- Carousel of Items -->
<div class="carousel-container flex overflow-x-scroll space-x-4">
  <div v-for="(item, index) in items" :key="index" class="carousel-item-custom flex-none w-56 md:w-64 lg:w-72 mx-2">
    <div class="card mx-auto max-w-xs border border-gray-300 rounded-lg hover:shadow-lg cursor-pointer" @click="showDialog" style="background-color: #FFA726;">
      <!-- Card content -->
      <img src="../../assets/package-alt.png" alt="Image" class="side-image w-16 h-16 object-cover rounded-t-lg mx-auto">
      <div class="p-2">
        <h2 class="text-lg font-semibold">{{ item.item_name }}</h2>
        <h3 class="text-sm text-gray-600">{{ item.item_client }}</h3>
        <div class="card-text mt-2 text-sm text-gray-800">
          <p>From: {{ item.item_from }}</p>
          <p>To: {{ item.item_destination }}</p>
          <p>Pickup Time: {{ item.item_pickup_time }}</p>
          <p>Dropoff Time: {{ item.item_dropoff_time }}</p>
          <p>Quote: ${{ item.item_quote }}</p>
        </div>
      </div>
    </div>
  </div>
</div>




        <!-- Why Use Us Section (Explain the benefits of using our product)-->
        <div class="why-use-us-section flex flex-col-reverse sm:flex-row my-4 pt-4">
            <section class="why-use-us flex flex-col sm:flex-row items-center justify-between w-full">
              <!-- Text content -->
              <div class="text-wrapper text-center sm:text-left w-full sm:w-1/2 px-4">
                <h2 class="text-2xl mb-4">Why use us?</h2>
                <!-- Why Use Us Content -->
                <div class="why-use-us-content flex flex-wrap">
                  <!-- Reason 1 -->
                  <div class="why-use-reason w-full sm:w-1/2 mb-4 px-4">
                    <h3 class="text-lg mb-2 flex items-center">
                      Move and ship anything
                      <img src="../../assets/package-variant.svg" alt="An example icon" class="icon-img w-11 h-11 ml-2"/>
                    </h3>
                    <p>Effortlessly transport goods of any size or type to any destination, making logistics seamless and convenient.</p>
                  </div>
                  <!-- Reason 2 -->
                  <div class="why-use-reason w-full sm:w-1/2 mb-4 px-4">
                    <h3 class="text-lg mb-2 flex items-center">
                      Best way to connect
                      <img src="../../assets/account-multiple.svg" alt="An example icon" class="icon-img w-11 h-11 ml-2"/>
                    </h3>
                    <p>Facilitate direct communication and collaboration between clients and carriers, enhancing efficiency and reducing intermediaries.</p>
                  </div>
                  <!-- Reason 3 -->
                  <div class="why-use-reason w-full sm:w-1/2 mb-4 px-4">
                    <h3 class="text-lg mb-2 flex items-center">
                      Safety and Protection
                      <img src="../../assets/security.svg" alt="An example icon" class="icon-img w-11 h-11 ml-2"/>
                    </h3>
                    <p>Ensure the security and protection of goods throughout the shipping process, minimizing risks and losses.</p>
                  </div>
                  <!-- Reason 4 -->
                  <div class="why-use-reason w-full sm:w-1/2 mb-4 px-4">
                    <h3 class="text-lg mb-2 flex items-center">
                      Saves Money and time
                      <img src="../../assets/account-cash.svg" alt="An example icon" class="icon-img w-11 h-11 ml-2"/>
                    </h3>
                    <p>Optimize costs and time by streamlining operations and leveraging competitive bidding to secure the best deals.</p>
                  </div>
                </div>
              </div>
              <!-- Image on the right -->
              <img src="../../assets/network.png" alt="Description of image" class="side-image w-1/2 sm:w-1/2 h-auto sm:h-96 md:h-128 lg:h-144 xl:h-160 rounded-md mb-4 sm:mb-0 sm:ml-4"/>
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
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import NavBar from '../components/NavBar.vue';

const landingPage = ref(null);
const items = ref([]);
const dialog = ref(false);  // State for dialog visibility
const carouselRef = ref(null);

const showMore = ref(false);
const isLargeScreen = ref(false);

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
const toggleContent = () => {
  showMore.value = !showMore.value;
};

// Function to check screen size
const checkScreenSize = () => {
  isLargeScreen.value = window.innerWidth >= 640;
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

  // Check initial screen size
  checkScreenSize();
  window.addEventListener('resize', checkScreenSize);
});
  </script>

  <style scoped>
  /* Add any additional custom styles here */
  .animate-drop-down {
    animation: dropDown 1s ease-out;
  }

  @keyframes dropDown {
    from {
      transform: translateY(-20px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  .custom-carousel {
    margin-bottom: 2rem;
  }

  .custom-carousel .carousel-item-custom {
    background-color: transparent; /* Set background color to transparent */
    border: none; /* Remove border */
    box-shadow: none; /* Remove box shadow */
  }

  .custom-carousel .carousel-item-custom > div {
    max-width: 344px;
    background-color: #FFA726;
    margin: auto;
  }

  .custom-carousel .w-64 {
    width: 260px; /* Adjust width as needed */
    height: auto; /* Maintain aspect ratio */
    display: block;
    margin: 0 auto 10px auto; /* Center the image and add some margin at the bottom */
  }
  </style>
