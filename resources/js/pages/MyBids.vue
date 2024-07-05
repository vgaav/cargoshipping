<template>
    <div class="MyBids-Page pb-16" ref="MyBidsPage">
      <div class="container mx-auto px-3 py-5">
        <h1 class="text-2xl font-bold mb-5">My Bids</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <div
            v-for="bid in formattedBids"
            :key="bid.id"
            class="item-card relative flex flex-col border border-gray-300 rounded-lg overflow-hidden transition-transform duration-200 ease-in-out hover:transform hover:scale-105"
          >
            <div class="p-4">
              <div class="text-lg font-bold">{{ bid.formattedPickupTime }}</div>
              <img src="../../assets/package-alt.png" alt="Image" class="w-full h-48 object-cover mt-2">
            </div>
            <div class="absolute inset-x-0 bottom-0 bg-gray-800 bg-opacity-75 p-4 text-white">
              <div class="flex justify-between items-start">
                <div class="flex flex-col">
                  <div class="text-lg font-bold">₱{{ bid.item.item_quote }}</div>
                  <div class="text-sm">{{ bid.item.item_name }}</div>
                </div>
                <div class="flex flex-col items-end">
                  <div class="text-xl font-bold mt-2">₱{{ bid.bid_amount }}</div>
                </div>
              </div>
              <button @click="openBidModal" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 w-full rounded-full">
                BID
              </button>
            </div>
          </div>
        </div>
      </div>
      <navbar_alternate />
    </div>
  </template>

  <script setup>
  import { ref, onMounted, computed } from 'vue';
  import axios from 'axios';
  import navbar_alternate from '../components/NavbarAlternate.vue';
  import moment from 'moment';

  const bids = ref([]);

  const fetchBids = async () => {
    try {
      const response = await axios.get('/my-bids'); // Ensure this matches your Laravel route
      console.log('Fetched bids:', response.data); // Debugging line to check the data fetched
      bids.value = response.data;
    } catch (error) {
      console.error('Error fetching bids:', error);
    }
  };

  const formatRelativeTime = (pickupTime) => {
    const now = moment();
    const then = moment(pickupTime);
    const duration = moment.duration(then.diff(now));

    const months = duration.months();
    const days = duration.days();
    const hours = duration.hours();

    const parts = [];
    if (months) parts.push(`${months} month${months > 1 ? 's' : ''}`);
    if (days) parts.push(`${days} day${days > 1 ? 's' : ''}`);
    if (hours) parts.push(`${hours} hour${hours > 1 ? 's' : ''}`);

    return parts.length ? parts.join(', ') + ' from now' : 'less than a minute from now';
  };

  const formattedBids = computed(() => {
    return bids.value.map(bid => ({
      ...bid,
      formattedPickupTime: formatRelativeTime(bid.item.item_pickup_time)
    }));
  });

  onMounted(() => {
    fetchBids();
  });
  </script>

  <style scoped>
  .MyBids-Page {
    background-color: #EEF4ED;
  }
  .container {
    max-width: 100%;
  }
  .item-card {
    max-width: 100%;
    display: flex;
    flex-direction: column;
  }
  .item-card img {
    width: 100%;
    height: 192px; /* Ensuring the image height is 48x4 */
    object-fit: cover;
  }
  .item-card .bg-opacity-75 {
    background-color: rgba(0, 0, 0, 0.75);
  }
  .item-card .hover\\:transform:hover {
    transform: scale(1.05);
  }
  </style>
