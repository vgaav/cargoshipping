<template>
    <v-main>
      <div class="landing-page container-fluid" ref="landingPage">
        <v-row>
          <v-col cols="12">
            <div class="container mx-auto px-3 py-5">
                <div class="relative bg-white rounded-lg overflow-hidden w-full p-4 mx-auto lg:max-w-screen-lg shadow-lg">
                  <!-- Top part with orange background -->
                  <div class="bg-orange-500 p-4 rounded-t-lg">
                    <div class="block sm:hidden w-full mb-4 text-center">
                        <img src="../../assets/programmer.jpg" alt="Image" class="w-3/4 h-auto rounded-md mx-auto">
                    </div>
                    <h2 class="text-xl md:text-2xl mb-2 text-white">About Us</h2>
                    <h3 class="text-lg md:text-xl font-bold text-white">Shiftminds</h3>
                  </div>
                  <!-- Content section -->
                  <section class="relative flex flex-wrap p-4 rounded-b-lg">
                    <!-- Text content -->
                    <div class="w-full sm:w-7/12 md:w-1/2 sm:pr-4">
                      <hr class="border-t-2 border-gray-400 my-4">
                      <p class="text-base md:text-lg text-black mb-4">
                        Welcome to ShiftMinds, where innovation meets efficiency to revolutionize the way businesses operate. At ShiftMinds, we're on a mission to empower organizations with cutting-edge technology solutions tailored to streamline workflows and elevate productivity...
                      </p>
                      <div v-if="showMoreCard1 || isLargeScreen" class="text-base md:text-lg text-black mb-4">
                        At the core of our ethos lies a commitment to harnessing the power of technology to simplify complexities and drive tangible results. Whether you're a budding startup or an established enterprise, our suite of services is designed to cater to your unique needs, paving the way for seamless operations and unparalleled growth.
                      </div>

                      <!-- Show more button for small screens -->
                      <button v-if="!isLargeScreen" @click="toggleContentCard1" class="btn-secondary mt-4 px-4 py-2 bg-gray-600 text-white hover:bg-gray-800 rounded">
                        {{ showMoreCard1 ? 'Show Less' : 'Show More' }}
                      </button>
                    </div>
                    <!-- Image block -->
                    <div class="hidden sm:block sm:w-5/12 md:w-1/2 text-center relative">
                      <div class="absolute inset-0 bg-gradient-to-l from-transparent to-white rounded-md"></div>
                      <img src="../../assets/programmer.jpg" alt="Image" class="w-full h-40 md:h-full object-cover rounded-md">
                    </div>

                  </section>
                </div>
              </div>

              <div class="container mx-auto px-3 py-5">
                <div class="relative bg-white rounded-lg overflow-hidden w-full p-4 mx-auto lg:max-w-screen-lg shadow-lg">
                  <!-- Top part with orange background -->
                  <div class="bg-orange-500 p-4 rounded-t-lg">
                    <div class="block sm:hidden w-full mb-4 text-center">
                      <img src="../../assets/delivery.jpg" alt="Image" class="w-3/4 h-auto rounded-md mx-auto">
                    </div>
                    <h2 class="text-xl md:text-2xl mb-2 text-white font-bold">Introducing: CargoBid</h2>
                    <h3 class="text-lg md:text-xl text-white">Your Gateway to Seamless Cargo Bidding and Beyond</h3>
                  </div>
                  <!-- Content section -->
                  <section class="relative flex flex-wrap p-4 rounded-b-lg">
                    <!-- Text content -->
                    <div class="w-full sm:w-7/12 md:w-1/2 sm:pr-4">
                      <hr class="border-t-2 border-gray-400 my-4">
                      <p class="text-base md:text-lg text-black mb-4">
                        A revolutionary platform designed to simplify the process of cargo bidding and connect carriers, truckers, and delivery riders with lucrative contracts and clients.
                      </p>
                      <div v-if="showMoreCard2 || isLargeScreen" class="text-base md:text-lg text-black mb-4">
                        Cargo bidding is a dynamic concept that empowers logistics professionals to compete for contracts by submitting competitive bids or even purchasing available contracts outright. It's a game-changing approach that enables carriers and drivers to maximize their earning potential while offering clients unparalleled flexibility and choice.
                      </div>

                      <!-- Show more button for small screens -->
                      <button v-if="!isLargeScreen" @click="toggleContentCard2" class="btn-secondary mt-4 px-4 py-2 bg-gray-600 text-white hover:bg-gray-800 rounded">
                        {{ showMoreCard2 ? 'Show Less' : 'Show More' }}
                      </button>
                      </div>
                    <!-- Image block -->
                    <div class="hidden sm:block sm:w-5/12 md:w-1/2 text-center relative">
                      <div class="absolute inset-0 bg-gradient-to-l from-transparent to-white rounded-md"></div>
                      <img src="../../assets/delivery.jpg" alt="Image" class="w-full h-40 md:h-full object-cover rounded-md">
                    </div>
                  </section>
                </div>
              </div>
          </v-col>
        </v-row>
      </div>
    </v-main>
    <NavBar/>
  </template>
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import NavBar from '../components/NavBar.vue';

  const landingPage = ref(null);
  const items = ref([]);
  const dialog = ref(false); // State for dialog visibility
  const carouselRef = ref(null);

  const showMoreCard1 = ref(false);
  const showMoreCard2 = ref(false);
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

  // Function to toggle content visibility for Card 1
  const toggleContentCard1 = () => {
    showMoreCard1.value = !showMoreCard1.value;
  };

  // Function to toggle content visibility for Card 2
  const toggleContentCard2 = () => {
    showMoreCard2.value = !showMoreCard2.value;
  };

  // Function to check screen size
  const checkScreenSize = () => {
    isLargeScreen.value = window.innerWidth >= 640;
  };

  // On mounted hook to initialize actions
  onMounted(async () => {
    // Initial animation after DOM is settled
    setTimeout(() => {
      landingPage.value.classList.add('animate-drop-down');
    }, 100);

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

