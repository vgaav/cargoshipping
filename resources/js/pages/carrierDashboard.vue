<template>
    <div class="carrier-dashboard-page" ref="carrierDashboardPage">
        <div class="dashboard">
            <div class="header">
                <div class="website-name">BidGo</div>
                <div class="user-welcome">Welcome, [username] <img src="../../assets/account.svg" alt="User Symbol" class="user-symbol"></div>
            </div>
            <v-main>
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
                                </div>
                            </v-card-text>
                        </v-col>
                    </v-row>
                </v-card>

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
                        </v-card-text>
                        <v-card-actions v-if="modalVisible">
                            <template v-if="!bidPlaced">
                              <v-btn color="green" @click="bid">Bid</v-btn>
                              <v-btn color="red" @click="cancel">Cancel</v-btn>
                            </template>
                            <template v-else>
                              <div class="bid-placed-text">Bid has been placed</div>
                            </template>
                          </v-card-actions>
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
        </div>
    </div>
    <NavBar />
</template>

<script setup>
import { ref, onMounted } from "vue";
import NavBar from '../components/NavBar.vue';

const isClicked = ref(false);
const modalVisible = ref(false);
const bidPlaced = ref(false);
const selectedItem = ref({});

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
      };
    } else if (itemName === 'Colgate Cargo') {
      selectedItem.value = {
        client: 'Colgate-Palmolive',
        pickupTime: '7:00AM',
        status: 'Ongoing',
        destination: 'Puregold, Marikina',
        currentBids: '200',
        isBidPlaced: isBidPlaced, // Add isBidPlaced to selectedItem
      };
    }
  } else {
    console.log('Invalid item name');
  }
};



const bid = () => {
  console.log('Bid button clicked');
  // Add your bid logic here

  // Update UI to show bid placed message and hide buttons
  selectedItem.value.currentBids++; // Example: Increment current bids count
  selectedItem.value.status = 'Bid Placed'; // Update status to 'Bid Placed'
  bidPlaced.value = true; // Set bidPlaced to true

  // Show mini modal with bid placed message
  showModal(selectedItem.value.itemName, true); // Call showModal with isBidPlaced = true
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
    }
  };
</script>

<style src="../../css/styles.css" scoped></style>


