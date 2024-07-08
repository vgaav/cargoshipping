<template>
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
              @click="showBidItemModal(bid)"
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
                <button @click.stop="openBidModal(bid)" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 w-full rounded-full">
                  BID
                </button>
                <button @click.stop="openDeleteModal(bid.id)" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 w-full rounded-full">
                  Remove
                </button>
              </div>
            </div>
          </transition-group>
        </div>
        <navbar_alternate />

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

          <!-- Delete Confirmation Modal -->
    <v-dialog v-model="deleteModalVisible" max-width="400">
        <v-card class="p-4 rounded-lg shadow-lg">
          <v-card-title class="text-xl font-semibold mb-2">Delete Bid</v-card-title>
          <v-card-text>
            <p>Are you sure you want to delete this bid?</p>
          </v-card-text>
          <v-card-actions class="flex justify-end space-x-2 mt-4">
            <v-btn class="!bg-red-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-red-700" @click="confirmDeleteBid">
              Yes
            </v-btn>
            <v-btn class="!bg-gray-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-gray-700" @click="cancelDeleteBid">
              No
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <!-- Item Information Modal -->
      <transition name="fade">
        <div v-if="modalVisible" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-75">
          <div class="bg-white p-6 rounded-lg w-full max-w-sm max-height-screen overflow-auto">
            <div class="bg-orange-400 rounded-t-lg p-3">
              <div class="text-center text-lg mb-4">Shipping Information</div>
            </div>
            <div class="space-y-4">
              <div class="flex justify-between border-b pb-2">
                <label class="font-bold">Order from:</label>
                <span>{{ selectedItem.item_client }}</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <label class="font-bold">Ship Out Date:</label>
                <span>{{ selectedItem.item_dropoff_time }}</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <label class="font-bold">Vehicle: </label>
                <span>{{ selectedItem.vehicle_type }}</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <label class="font-bold">Destination: </label>
                <span>{{ selectedItem.item_from }}</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <label class="font-bold">Current Bids:</label>
                <span>{{ selectedItem.item_current_bids }}</span>
              </div>
              <div class="flex justify-between border-b pb-2">
                <label class="font-bold">Quote/Pricing:</label>
                <span>{{ selectedItem.item_quote }}</span>
              </div>
              <button @click="showItemInfo = !showItemInfo" class="w-full mt-4 bg-blue-500 text-white py-2 rounded-lg">
                Show Item Information
              </button>
              <transition name="fade">
                <div v-if="showItemInfo" class="border border-gray-300 rounded-lg p-4 mt-4 bg-white space-y-2">
                  <div class="flex justify-between border-b pb-2">
                    <label class="font-bold">Description:</label>
                    <span>{{ selectedItem.description }}</span>
                  </div>
                  <div class="flex justify-between border-b pb-2">
                    <label class="font-bold">Length:</label>
                    <span>{{ selectedItem.item_length }} cm</span>
                  </div>
                  <div class="flex justify-between border-b pb-2">
                    <label class="font-bold">Width:</label>
                    <span>{{ selectedItem.item_width }} cm</span>
                  </div>
                  <div class="flex justify-between border-b pb-2">
                    <label class="font-bold">Height:</label>
                    <span>{{ selectedItem.item_height }} cm</span>
                  </div>
                  <div class="flex justify-between border-b pb-2">
                    <label class="font-bold">Weight:</label>
                    <span>{{ selectedItem.item_weight }} kg</span>
                  </div>
                </div>
              </transition>
              <div class="mt-4 flex justify-center space-x-4">
                <template v-if="!bidPlaced">
                  <button class="bg-green-500 text-white py-2 px-4 rounded-lg" @click="openBidModalFromItemInfo">Bid</button>
                  <button class="bg-red-500 text-white py-2 px-4 rounded-lg" @click="cancel">Cancel</button>
                </template>
                <template v-else>
                  <div class="text-center text-lg font-bold text-green-500">Bid has been placed</div>
                </template>
              </div>
            </div>
          </div>
        </div>
      </transition>
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
  const tempBidAmount = ref(0);  // New ref to track the temporary bid amount
  const selectedBidId = ref(null);
  const modalVisible = ref(false);
  const selectedItem = ref({});
  const showItemInfo = ref(false);
  const bidPlaced = ref(false); // Ref to track if a bid is placed
  const deleteModalVisible = ref(false);
  const bidToDelete = ref(null);


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
    tempBidAmount.value = bid.bid_amount;
    updateBidAmount.value = bid.bid_amount;
    updateBidModalVisible.value = true;
  };

  const confirmUpdateBid = async () => {
    try {
      await axios.put(`/bids/${selectedBidId.value}`, { bid_amount: updateBidAmount.value });
      fetchBids(); // Refresh bids after update
      updateBidModalVisible.value = false;
    } catch (error) {
      console.error('Error updating bid:', error);
    }
  };

  const cancelUpdateBid = () => {
    updateBidAmount.value = tempBidAmount.value; // Reset bid amount to the temporary value
    updateBidModalVisible.value = false;
  };

  const showBidItemModal = (bid) => {
    selectedItem.value = bid.item;
    modalVisible.value = true;
    showItemInfo.value = false;
    bidPlaced.value = false; // Reset bidPlaced to false
  };

  const openBidModalFromItemInfo = () => {
    openBidModal(selectedItem.value); // Open the bid modal with the selected item
  };

  const cancel = () => {
    modalVisible.value = false;
  };

  const openDeleteModal = (bidId) => {
  bidToDelete.value = bidId;
  deleteModalVisible.value = true;
};

const confirmDeleteBid = async () => {
  try {
    await axios.delete(`/bids/${bidToDelete.value}`);
    fetchBids();
    deleteModalVisible.value = false;
  } catch (error) {
    console.error('Error deleting bid:', error);
  }
};

const cancelDeleteBid = () => {
  deleteModalVisible.value = false;
};

  onMounted(fetchBids);
  </script>

  <style scoped>
  .MyBids-Page {
    background-color: #EEF4ED;
  }
  .container {
    max-width: 100%;
    background-color: #EEF4ED;

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
