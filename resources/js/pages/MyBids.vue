<template>
    <div class="container mx-auto px-3 py-5">
      <h1 class="text-2xl font-bold mb-5">My Bids</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <div v-for="bid in bids" :key="bid.id" class="bg-white rounded-lg shadow-lg p-5">
          <h2 class="text-xl font-bold">{{ bid.item.name }}</h2>
          <p class="text-gray-700">Bid Amount: ${{ bid.bid_amount.toFixed(2) }}</p>
          <p class="text-gray-500">Item ID: {{ bid.item.id }}</p>
          <p class="text-gray-500">Bid ID: {{ bid.id }}</p>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';

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

  onMounted(() => {
    fetchBids();
  });
  </script>

<style scoped>
/* Custom styles */
.container {
  max-width: 100%;
}
</style>
