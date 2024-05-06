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
                <div class="vehicle-selection-button">
                    <span class="text--primary" @click="step++">Select Vehicle</span>
                  </div>
                <!-- "Deliveries" Text Positioned at the Top Right -->
                <div class="deliveries-text">Deliveries</div>

                <!-- "Ongoing" Text Positioned Below "Deliveries" -->
                <div class="ongoing-text">Ongoing <img src="../../assets/help-circle.svg" alt="An example icon" class="help-icon" @click="showHelpModal('ongoing')"></div>

                <!-- Item Card: Computers Cargo -->
                <v-card class="item-card" :class="{ 'hoverable':!isClicked }" @click="showModal('Computers Cargo')" elevation="hoverElevation">
                    <v-row>
                        <v-col cols="4" xs12>
                            <img src="../../assets/computers-cargo.jpg" alt="Item Image" class="item-image">
                        </v-col>
                        <v-col cols="8" xs12>
                            <v-card-text>
                                <div class="item-details">
                                    <div class="item-name">Computers Cargo</div>
                                    <div class="client"><b>Client:</b> DepEd</div>
                                    <div class="weight">1200Kg (Weight)</div>
                                    <div class="from-to"><b>From: Marikina</b> <span class="arrow-symbol">➔</span> <b>To: iAcademy, Makati</b></div>
                                    <div class="pickup-time"><b>Pickup Time:</b> 6:00AM</div>
                                    <div class="drop-off-time"><b>Estimated Drop-off Time:</b> 3:00PM </div>
                                    <div class="payment"><b>Quote/Price: P</b>8,000</div>
                                </div>
                            </v-card-text>
                        </v-col>
                    </v-row>
                </v-card>

                <!-- "Deliveries for Later" Text Positioned Below Item Card -->
                <div class="deliveries-later-text">Deliveries for Later <img src="../../assets/help-circle.svg" alt="An example icon" class="help-icon" @click="showHelpModal('deliveriesLater')"></div>

                <v-card class="item-card" :class="{ 'hoverable':!isClicked }" @click="showModal('Colgate Cargo')" elevation="hoverElevation">
                    <v-row>
                        <v-col cols="4">
                            <img src="../../assets/colgate-cargo.jpg" alt="Item Image" class="item-image">
                        </v-col>
                        <v-col cols="8">
                            <v-card-text>
                                <div class="item-details">
                                    <div class="item-name">Colgate Cargo</div>
                                    <div class="client"><b>Client:</b> Colgate-Palmolive</div>
                                    <div class="weight">700Kg (Weight)</div>
                                    <div class="from-to"><b>From: Mckinley Hill, Taguig</b> <span class="arrow-symbol">➔</span> <b>To: Puregold, Marikina</b></div>
                                    <div class="pickup-time"><b>Pickup Time:</b> 7:00AM</div>
                                    <div class="drop-off-time"><b>Estimated Drop-off Time:</b> 10:00PM </div>
                                    <div class="payment"><b>Quote/Price: P</b>5,000</div>
                                </div>
                            </v-card-text>
                        </v-col>
                    </v-row>
                </v-card>

                <v-dialog v-model="bidModalVisible" max-width="400">
                    <v-card>
                      <v-card-title>Bid Confirmation</v-card-title>
                      <v-card-text>
                        <form>
                          <v-text-field label="Bid Amount" v-model="bidAmount" type="number" />
                          <v-text-field label="Minimum Bid" v-model="minimumBid" type="number" />
                        </form>
                      </v-card-text>
                      <v-card-actions>
                        <v-btn color="green" @click="confirmBid">Confirm Bid</v-btn>
                        <v-btn color="red" @click="cancelBid">Cancel</v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-dialog>


                <!-- Modal -->
                <v-dialog v-model="modalVisible" max-width="400">
                    <v-card>
                        <v-card-title>Shipping Information</v-card-title>
                        <v-card-text>
                            <div>
                                <label>Order from:</label>
                                <span>{{ selectedItem.client }}</span>
                            </div>
                            <div>
                                <label>Ship Out Date:</label>
                                <span>{{ selectedItem.pickupTime }}</span>
                            </div>
                            <div>
                                <label>Status:</label>
                                <span>{{ selectedItem.status }}</span>
                            </div>
                            <div>
                                <label>Destination:</label>
                                <span>{{ selectedItem.destination }}</span>
                            </div>
                            <div>
                                <label>Current Bids:</label>
                                <span>{{ selectedItem.currentBids }}</span>
                            </div>
                            <div>
                                <label>Quote/Pricing:</label>
                                <span>{{ selectedItem.quote }}</span>
                            </div>
                            <v-btn @click="showItemInfo =!showItemInfo">Show Item Information</v-btn>
                            <!-- Item Information -->
                            <div v-if="showItemInfo" class="item-info-card">
                              <div class="item-info-row">
                                <label>Description:</label>
                                <span>{{ selectedItem.itemName }}</span>
                              </div>
                              <div class="item-info-row">
                                <label>Length:</label>
                                <span>{{ selectedItem.length }}</span>
                              </div>
                              <div class="item-info-row">
                                <label>Width:</label>
                                <span>{{ selectedItem.width }}</span>
                              </div>
                              <div class="item-info-row">
                                <label>Height:</label>
                                <span>{{ selectedItem.height }}</span>
                              </div>
                              <div class="item-info-row">
                                <label>Weight:</label>
                                <span>{{ selectedItem.weight }}</span>
                              </div>
                            </div>
                        </v-card-text>
                        <v-card-actions v-if="modalVisible">
                            <template v-if="!bidPlaced">
                              <v-btn color="green" @click="showBidModal">Bid</v-btn>
                              <v-btn color="red" @click="cancel">Cancel</v-btn>
                            </template>
                            <template v-else>
                              <div class="bid-placed-text">Bid has been placed</div>
                            </template>
                          </v-card-actions>/
                    </v-card>
                </v-dialog>



                  <!-- Help Modal -->
  <v-dialog v-model="helpModalVisible" max-width="300">
    <v-card>
      <v-card-title>Help~</v-card-title>
      <v-card-text>
        {{ helpModalText }}
      </v-card-text>
    </v-card>
  </v-dialog>
            </v-main>
            </v-window-item>
            <v-window-item :value="2">
              <!-- Vehicle selection content goes here -->
    <div class="banner">
        <img src="../../assets/VehicleSelectionBanner.jpg" alt="Banner Image">
        <div class="banner-overlay">
          <h1 class="banner-title">Select Vehicle</h1>
          <div class="nav-buttons">
            <span class="btn btn-primary" @click="step--">Back to Items</span>
          </div>
        </div>
      </div>
      <div>
        <h2>Vehicle Selection <img src="../../assets/help-circle.svg" alt="An example icon" class="help-icon" @click="showHelpModal('vehicleSelect')"></h2>
        <!-- Add your vehicle selection UI components here -->
        <div class="vehicle-cards">
          <VehicleCard v-for="(vehicle, index) in vehicles" :key="index" :vehicle="vehicle" />
        </div>
      </div>
      <div class="back-button">
        <span class="text--primary" @click="step--">Back to Items</span>
      </div>
              </v-window-item>
            </v-window>
        </div>
    </div>
    <NavBar />
</template>

<script setup>
import { ref, onMounted } from "vue";
import NavBar from '../components/NavBar.vue';
import { weight } from "fontawesome";
import { defineComponent } from 'vue';
import VehicleCard from '../components/VehicleCard.vue';



const step = ref(1); // Initialize step to 1, indicating the items and bidding view
const bidModalVisible = ref(false);
const bidAmount = ref(0);
const minimumBid = ref(0);


const isClicked = ref(false);
const modalVisible = ref(false);
const bidPlaced = ref(false);
const selectedItem = ref({});
const showItemInfo = ref(false); // Add this line



const carrierDashboardPage = ref(null);

onMounted(() => {
    setTimeout(() => {
        carrierDashboardPage.value.classList.add("animate-drop-down");
    }, 100);
});

const showModal = (itemName, isBidPlaced = false) => {
  if (itemName === 'Computers Cargo' || itemName === 'Colgate Cargo') {
    modalVisible.value = true;
    bidPlaced.value = isBidPlaced; // Set bidPlaced to the passed value
    if (itemName === 'Computers Cargo') {
      selectedItem.value = {
        client: 'DepEd',
        pickupTime: '6:00AM',
        status: 'Ongoing',
        destination: 'iAcademy, Makati',
        currentBids: '100',
        isBidPlaced: isBidPlaced, // Add isBidPlaced to selectedItem
        quote:'8,000',
        //item information
        itemName:'20 Boxes - Full Set computers (Keyboard, CPU, Desktop, Mouse)',
        length:'Not Provided',
        width:'Not Provided',
        height:'Not Provided',
        weight:'450kg (Overall)',

      };
    } else if (itemName === 'Colgate Cargo') {
      selectedItem.value = {
        client: 'Colgate-Palmolive',
        pickupTime: '7:00AM',
        status: 'Ongoing',
        destination: 'Puregold, Marikina',
        currentBids: '200',
        isBidPlaced: isBidPlaced, // Add isBidPlaced to selectedItem
        quote:'5,000',
        //item information
        itemName:'10 Boxes of Colgate Toothpaste (20 pieces per box)', //Example lang to
        length:'Not Provided',
        width:'Not Provided',
        height:'Not Provided',
        weight:'380kg (Overall)',
      };
    }
  } else {
    console.log('Invalid item name');
  }
};


const cancel = () => {
  console.log('Cancel button clicked');
  modalVisible.value = false;
  bidPlaced.value = false; // Reset bidPlaced
  selectedItem.value = {
    client: '',
    pickupTime: '',
    status: '',
    destination: '',
    currentBids: '',
    isBidPlaced: false, // Add isBidPlaced to selectedItem
  };
}

const helpModalVisible = ref(false);
  const helpModalText = ref('');

  const showHelpModal = (type) => {
    helpModalVisible.value = true;
    if (type === 'ongoing') {
      helpModalText.value = 'Ongoing deliveries are shipments that are currently in transit.';
    } else if (type === 'deliveriesLater') {
      helpModalText.value = 'Deliveries for later are shipments that are scheduled to be delivered at a later date.';
    }else if(type === 'vehicleSelect'){
        helpModalText.value = 'This is where you can view your available vehicles. Select which vehicle will handle the delivery.';
    }
  };

  const selectVehicle = () => {
  step.value = 2; // Set step to 2 to show the vehicle selection view
};

const vehicles = ref([
  {
    name: 'Vehicle 1',
    type: 'Truck',
    capacity: '1000kg',
    availability: 'Available'
  },
  {
    name: 'Vehicle 2',
    type: 'Van',
    capacity: '500kg',
    availability: 'Available'
  },
  // Add more vehicles to the array
]);

const showBidModal = () => {
  bidModalVisible.value = true;
};

const confirmBid = () => {
  // Add your bid confirmation logic here
  console.log(`Bid amount: ${bidAmount.value}, Minimum bid: ${minimumBid.value}`);
  // Update the UI to show the bid has been placed
  bidPlaced.value = true;
  bidModalVisible.value = false;
  selectedItem.value.currentBids++; // Example: Increment current bids count

  step.value = 2;

};

const cancelBid = () => {
  bidModalVisible.value = false;
};

</script>
<style src="../../css/styles.css" scoped></style>


