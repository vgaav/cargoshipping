<template>
    <div class="carrier-dashboard-page" ref="carrierDashboardPage">
        <div class="dashboard">
            <div class="header">
                <div class="website-name">BidGo</div>
                <div class="user-welcome">Welcome, [username]</div>
            </div>
            <v-window v-model="step">

                <!-- Step 1: Items and Bidding View -->
                <v-window-item :value="1">
                    <v-main>
                        <div class="ongoing-text flex items-center space-x-2 text-sm font-semibold text-left mb-4">
                            <span>Choose What to Browse</span>
                        </div>

                        <div class="button-group flex justify-center p-1 space-x-4">
                            <button class="vehicle-button flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded text-center" @click="filterItems('Motorcycle')">Motorcycle</button>
                            <button class="vehicle-button flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded text-center" @click="filterItems('Van')">Van</button>
                            <button class="vehicle-button flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded text-center" @click="filterItems('Pickup')">Pickup</button>
                            <button class="vehicle-button flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded text-center" @click="filterItems('Truck')">Truck</button>
                        </div>
                        <div class="deliveries-text">Deliveries</div>

                        <!-- "Ongoing" Text Positioned Below "Deliveries" -->
                        <div class="ongoing-text flex items-center space-x-2 text-sm font-semibold text-left mb-4">
                            <span>All Product</span>
                            <img src="../../assets/help-circle.svg" alt="An example icon" class="help-icon w-4 h-4 cursor-pointer" @click="showHelpModal('ongoing')" />
                        </div>

    <!-- Item Cards Section -->
    <transition-group
    name="fade"
    tag="div"
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
    enter-active-class="transition-opacity duration-1000"
    leave-active-class="transition-opacity duration-1000"
    enter-from-class="opacity-0"
    leave-to-class="opacity-0"
  >
    <ItemCard
      v-for="item in items"
      :key="item.id"
      :item-name="item.item_name"
      :item-image="item.item_image"
      :client="item.item_client"
      :weight="item.item_weight"
      :from="item.item_from"
      :to="item.item_destination"
      :pickup-time="item.item_pickup_time"
      :drop-off-time="item.item_dropoff_time"
      :quote="item.item_quote"
      :vehicle_type="item.vehicle_type"
      @click="showModal(item)"
      @openBidModal="openBidModal"
    />
  </transition-group>
                        <!-- Dialogs and Modals -->
                        <v-dialog v-model="bidModalVisible" max-width="400">
                          <v-card>
                            <v-card-title>Bid Confirmation</v-card-title>
                            <v-card-text>
                              <form>
                                <v-text-field
                                  label="Bid Amount"
                                  v-model.number="bidAmount"
                                  :rules="bidRules"
                                  type="number"
                                  required
                                />
                                <v-text-field
                                  label="Minimum Bid"
                                  v-model.number="minimumBid"
                                  :rules="minimumBidRules"
                                  type="number"
                                  required
                                />
                              </form>
                            </v-card-text>
                            <v-card-actions>
                              <v-btn class="custom-btn green" color="green" @click="confirmBid">Confirm Bid</v-btn>
                              <v-btn class="custom-btn red" color="red" @click="cancelBid">Cancel</v-btn>
                            </v-card-actions>
                          </v-card>
                        </v-dialog>

                        <v-dialog v-model="confirmDialog" max-width="400">
                          <v-card>
                            <v-card-title>Confirm Vehicle Selection</v-card-title>
                            <v-card-text>Are you sure you want to select this vehicle?</v-card-text>
                            <v-card-actions>
                              <v-btn class="custom-btn green" color="green" @click="confirmSelection">Confirm</v-btn>
                              <v-btn class="custom-btn red" color="red" @click="confirmDialog = false">Cancel</v-btn>
                            </v-card-actions>
                          </v-card>
                        </v-dialog>

                        <div v-if="modalVisible" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-75">
                            <div class="bg-white p-6 rounded-lg w-full max-w-sm">
                                <!--<img src="../../assets/package-alt.png" alt="Image" class="w-50 h-50 object-cover rounded-t-lg mx-auto"> -->
                                <div class="bg-orange-400 rounded-t-lg p-3">
                                    <div class="text-center text-lg mb-4">Shipping Information</div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex justify-between border-b pb-2">
                                        <label class="font-bold">Order from:</label>
                                        <span>{{ selectedItem.client }}</span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <label class="font-bold">Ship Out Date:</label>
                                        <span>{{ selectedItem.pickupTime }}</span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <label class="font-bold">Status:</label>
                                        <span>{{ selectedItem.status }}</span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <label class="font-bold">Destination:</label>
                                        <span>{{ selectedItem.destination }}</span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <label class="font-bold">Current Bids:</label>
                                        <span>{{ selectedItem.currentBids }}</span>
                                    </div>
                                    <div class="flex justify-between border-b pb-2">
                                        <label class="font-bold">Quote/Pricing:</label>
                                        <span>{{ selectedItem.quote }}</span>
                                    </div>
                                    <button @click="showItemInfo = !showItemInfo" class="w-full mt-4 bg-blue-500 text-white py-2 rounded-lg">
                                        Show Item Information
                                    </button>
                                    <transition name="fade">
                                        <div v-if="showItemInfo" class="border border-gray-300 rounded-lg p-4 mt-4 bg-white">
                                            <div class="space-y-2">
                                                <div class="flex justify-between border-b pb-2">
                                                    <label class="font-bold">Description:</label>
                                                    <span>{{ selectedItem.itemName }}</span>
                                                </div>
                                                <div class="flex justify-between border-b pb-2">
                                                    <label class="font-bold">Length:</label>
                                                    <span>{{ selectedItem.length }}cm</span>
                                                </div>
                                                <div class="flex justify-between border-b pb-2">
                                                    <label class="font-bold">Width:</label>
                                                    <span>{{ selectedItem.width }} cm</span>
                                                </div>
                                                <div class="flex justify-between border-b pb-2">
                                                    <label class="font-bold">Height:</label>
                                                    <span>{{ selectedItem.height }} cm</span>
                                                </div>
                                                <div class="flex justify-between border-b pb-2">
                                                    <label class="font-bold">Weight:</label>
                                                    <span>{{ selectedItem.weight }} kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </transition>
                                    <div v-if="modalVisible" class="mt-4 flex justify-center space-x-4">
                                        <template v-if="!bidPlaced">
                                            <button class="bg-green-500 text-white py-2 px-4 rounded-lg" @click="showBidModal">Bid</button>
                                            <button class="bg-red-500 text-white py-2 px-4 rounded-lg" @click="cancel">Cancel</button>
                                        </template>
                                        <template v-else>
                                            <div class="text-center text-lg font-bold text-green-500">Bid has been placed</div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Help Modal -->
                        <v-dialog v-model="helpModalVisible" max-width="300">
                          <v-card>
                            <v-card-title>Help~</v-card-title>
                            <v-card-text>{{ helpModalText }}</v-card-text>
                          </v-card>
                        </v-dialog>

                    </v-main>
                </v-window-item>
                <v-window-item :value="2">
                    <!-- Vehicle selection content goes here -->
                    <div class="banner">
                      <img src="../../assets/VehicleSelectionBanner.jpg" alt="Banner Image" />
                      <div class="banner-overlay">
                        <h1 class="banner-title">Select Vehicle</h1>
                        <div class="nav-buttons">
                          <span class="btn btn-primary" @click="step--">Back to Items</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <h2>Vehicle Selection <img src="../../assets/help-circle.svg" alt="An example icon" class="help-icon" @click="showHelpModal('vehicleSelect')" /></h2>
                      <!-- Add your vehicle selection UI components here -->
                      <div class="vehicle-cards">
                        <VehicleCard
                        v-for="(vehicle, index) in vehicles"
                        :key="index"
                        :vehicle="vehicle"
                        :image="getVehicleImage(vehicle.vehicle_type)"
                        :selected-vehicle="selectedVehicle"
                        @select-vehicle="handleSelectVehicle"
                      />
                      </div>
                    </div>
                  </v-window-item>
                  <v-window-item :value="3">
                    <ReviewAndConfirm
                    :selected-item="selectedItem"
                    :selected-vehicle="selectedVehicle"
                    :bid-amount="bidAmount"
                  />
                  </v-window-item>
            </v-window>
        </div>
    </div>
    <NavBar />
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import NavBar from '../components/NavBar.vue';
import VehicleCard from '../components/VehicleCard.vue';
import ItemCard from '../components/ItemCard.vue';
import scooterDelivery from '../../assets/scooter.png';
import vanDelivery from '../../assets/van.png';
import ReviewAndConfirm from '../components/ReviewAndConfirm.vue';

const items = ref([]);
const vehicles = ref([]);
const step = ref(1);
const bidModalVisible = ref(false);
const modalVisible = ref(false);
const bidPlaced = ref(false);
const selectedItem = ref({});
const showItemInfo = ref(false);
const selectedVehicle = ref(null);
const helpModalVisible = ref(false);
const helpModalText = ref('');
const confirmDialog = ref(false);
const bidAmount = ref(null);
const minimumBid = ref(null);

const fetchItems = async () => {
  try {
    const response = await axios.get('/items');
    items.value = response.data;
    console.log('Fetched items:', items.value);
  } catch (error) {
    console.error('Error fetching items:', error);
  }
};

const fetchVehicles = async () => {
  try {
    const response = await axios.get('/vehicles');
    vehicles.value = response.data;
    console.log('Fetched vehicles:', vehicles.value);
  } catch (error) {
    console.error('Error fetching vehicles:', error);
  }
};

const filterItems = async (vehicleType) => {
  try {
    const response = await axios.post('/filterByVehicleType', { vehicle_type: vehicleType });
    items.value = response.data;
    console.log(`Filtered items by ${vehicleType}:`, items.value);
  } catch (error) {
    console.error(`Error filtering items by ${vehicleType}:`, error);
  }
};

const openBidModal = () => {
      bidModalVisible.value = true; // Set bidModalVisible to true to show the modal
    };

const showModalItem = (itemName) => {
  console.log('Show modal for item:', itemName);
};

const bidRules = [
  v => v >= 0 || 'Bid amount must be non-negative',
  v => v <= selectedItem.value.quote || `Bid amount must be below ${selectedItem.value.quote}`,
];

const minimumBidRules = [
  v => v >= 0 || 'Minimum bid must be non-negative',
  v => v <= selectedItem.value.quote || `Minimum bid must be below ${selectedItem.value.quote}`,
];

onMounted(() => {
  fetchItems();
  fetchVehicles();
  setTimeout(() => {
    document.getElementById('carrierDashboardPage').classList.add('animate-drop-down');
  }, 100);
});

const selectVehicle = (vehicle) => {
  selectedVehicle.value = vehicle;
  filterItems(vehicle); // Call filterItems to update the items based on selected vehicle
};


const showBidModal = () => {
  bidModalVisible.value = true;
};

const confirmBid = () => {
  if (
    bidAmount.value < 0 ||
    minimumBid.value < 0 ||
    bidAmount.value == 0 ||
    minimumBid.value == 0 ||
    bidAmount.value > selectedItem.value.quote ||
    minimumBid.value > selectedItem.value.quote
  ) {
    alert('Invalid bid or minimum bid amount. Please check the values.');
    return;
  }
  console.log(`Bid amount: ${bidAmount.value}, Minimum bid: ${minimumBid.value}`);
  bidPlaced.value = true;
  bidModalVisible.value = false;
  selectedItem.value.currentBids++;
  console.log(`Item Client: ${selectedItem.value.client}, Pickup Location: ${selectedItem.value.pickupTime}`);
  console.log(`Item Quote: ${selectedItem.value.quote}`);
  step.value = 2;
};

const cancelBid = () => {
  bidModalVisible.value = false;
};

const showHelpModal = (type) => {
  helpModalVisible.value = true;
  if (type === 'ongoing') {
    helpModalText.value = 'All of the products that are available on the market.';
  } else if (type === 'deliveriesLater') {
    helpModalText.value = 'Deliveries for later are shipments that are scheduled to be delivered at a later date.';
  } else if (type === 'vehicleSelect') {
    helpModalText.value = 'This is where you can view your available vehicles. Select which vehicle will handle the delivery.';
  }
};

const handleSelectVehicle = (vehicle) => {
  selectedVehicle.value = vehicle;
  confirmDialog.value = true;
};

const confirmSelection = () => {
  step.value = 3;
  confirmDialog.value = false;
};

const showModal = (item) => {
  modalVisible.value = true;
  bidPlaced.value = item.isBidPlaced; // Assuming this property exists on the item
  selectedItem.value = {
    id: item.id,
    client: item.item_client,
    pickupTime: item.item_pickup_time,
    status: item.item_status, // Assuming this property exists on the item
    destination: item.item_destination,
    currentBids: item.item_current_bids, // Assuming this property exists on the item
    isBidPlaced: item.is_bid_placed,
    quote: item.item_quote,
    itemName: item.description,
    length: item.item_length, // Assuming these properties exist on the item
    width: item.item_width,
    height: item.item_height,
    weight: item.item_weight,
    itemImage: item.item_image
  };
};

const cancel = () => {
  console.log('Cancel button clicked');
  modalVisible.value = false;
  bidPlaced.value = false;
  selectedItem.value = {
    client: '',
    pickupTime: '',
    status: '',
    destination: '',
    currentBids: '',
    isBidPlaced: false,
  };
};

const getVehicleImage = (vehicleType) => {
  if (vehicleType === 'Motorcycle') {
    return scooterDelivery;
  } else if (vehicleType === 'Van') {
    return vanDelivery;
  }
};
</script>


<style src="../../css/styles.css" scoped></style>
