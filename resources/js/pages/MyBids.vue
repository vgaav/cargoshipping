<template>

    <!--
    To-Do:
    -Viewable lowest bids sa card(Dapat nakikita yung lowest bid)
    -

    -->
    <div class="MyBids-Page pb-16" ref="MyBidsPage">
      <div class="container mx-auto px-3 py-5">
        <h1 class="text-2xl font-bold mb-5">My Bids</h1>
        <transition-group
          name="fade"
          tag="div"
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
        >
          <div
            v-for="bid in formattedBids"
            :key="bid.id"
            class="item-card relative flex flex-col border border-gray-300 rounded-lg overflow-hidden transition-transform duration-200 ease-in-out hover:transform hover:scale-105"
          >
            <div class="p-4">
              <div class="text-lg font-bold">{{ bid.formattedPickupTime }}</div>
              <img src="../../assets/package-alt.png" alt="Image" class="w-full h-48 object-cover mt-2">
            </div>
            <div class="absolute inset-x-0 bottom-0 bg-gray-800 bg-opacity-75 p-4 text-white flex flex-col space-y-2">
              <div class="flex justify-between items-start">
                <div class="flex flex-col">
                  <div class="text-lg font-bold">₱{{ bid.item.item_quote }}</div>
                  <div class="text-sm">{{ bid.item.item_name }}</div>
                </div>
                <div class="flex flex-col items-end">
                  <div class="flex items-center space-x-2">
                    <div class="flex flex-col items-end">
                      <span class="text-xs text-gray-300">My Bid</span>
                      <div class="text-xl font-bold">₱{{ bid.bid_amount }}</div>
                    </div>
                  </div>
                </div>
              </div>
              <button @click="openBidModal(bid)" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 w-full rounded-full">
                BID
              </button>
            </div>
          </div>
        </transition-group>
      </div>
      <navbar_alternate />

    <!-- Update Bid Modal -->
    <!-- Update Bid Modal -->
    <v-dialog v-model="updateBidModalVisible" max-width="400">
        <v-card class="p-4 rounded-lg shadow-lg">
          <v-card-title class="text-xl font-semibold mb-2">Update Bid</v-card-title>
          <v-card-text>
            <form class="space-y-4">
              <v-text-field
                label="Bid Amount"
                v-model.number="updateBidAmount"
                :rules="bidRules"
                type="number"
                required
                class="w-full"
              />
            </form>
          </v-card-text>
          <v-card-actions class="flex justify-end space-x-2 mt-4">
            <v-btn class="!bg-green-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-green-700" @click="confirmUpdateBid">
              Update Bid
            </v-btn>
            <v-btn class="!bg-red-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-red-700" @click="cancelUpdateBid">
              Cancel
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  </template>

  <script setup>
  import { ref, onMounted, computed } from 'vue';
  import axios from 'axios';
  import navbar_alternate from '../components/NavbarAlternate.vue';
  import moment from 'moment';

  const bids = ref([]);
  const updateBidModalVisible = ref(false);
  const updateBidAmount = ref(0);
  const selectedBidId = ref(null);


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

    return parts.join(', ');
  };

  const formattedBids = computed(() => {
    return bids.value.map(bid => ({
      ...bid,
      formattedPickupTime: formatRelativeTime(bid.item.item_pickup_time)
    }));
  });

  const openBidModal = (bid) => {
  selectedBidId.value = bid.id;
  updateBidAmount.value = bid.bid_amount;
  updateBidModalVisible.value = true;
};

  const confirmUpdateBid = async () => {
  try {
    await axios.put(`/bids/${selectedBidId.value}`, { bid_amount: updateBidAmount.value });
    fetchBids(); // Refresh the bids
    updateBidModalVisible.value = false;
  } catch (error) {
    console.error('Error updating bid:', error);
  }
};

const cancelUpdateBid = () => {
  updateBidModalVisible.value = false;
};

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
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .item-card img {
    width: 100%;
    height: 192px; /* Ensuring the image height is 48x4 */
    object-fit: cover;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
  .item-card .bg-opacity-75 {
    background-color: rgba(0, 0, 0, 0.75);
  }
  .item-card .hover\\:transform:hover {
    transform: scale(1.05);
  }
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }
  .text-xs {
    font-size: 0.75rem;
  }
  </style>
