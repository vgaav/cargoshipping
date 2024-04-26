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
        <div class="ongoing-text">Ongoing</div>

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
        <div class="deliveries-later-text">Deliveries for Later</div>

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
          <v-card-actions>
            <v-btn color="green" @click="bid">Bid</v-btn>
            <v-btn color="red" @click="cancel">Cancel</v-btn>
          </v-card-actions>
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
  const selectedItem = ref({});

  const toggleClicked = () => {
    isClicked.value =!isClicked.value;
  }

  const carrierDashboardPage = ref(null); // Add a reference to the carrierDashboardPage element

  onMounted(() => {
    setTimeout(() => {
      carrierDashboardPage.value.classList.add("animate-drop-down"); // Apply animate-drop-down class to the carrierDashboardPage element
    }, 100);
  });

  const showModal = (itemName) => {
    modalVisible.value = true;
    if (itemName === 'Computers Cargo') {
      selectedItem.value = {
        client: 'DepEd',
        pickupTime: '6:00AM',
        status: 'Ongoing',
        destination: 'iAcademy, Makati',
        currentBids: '100'
      };
    } else if (itemName === 'Colgate Cargo') {
      selectedItem.value = {
        client: 'Colgate-Palmolive',
        pickupTime: '7:00AM',
        status: 'Ongoing',
        destination: 'Puregold, Marikina',
        currentBids: '200'
      };
    } else {
      console.log('Invalid item name');
    }
  };

  const bid = () => {
    console.log('Bid button clicked');
    // Add your bid logic here
  };

  const cancel = () => {
    console.log('Cancel button clicked');
    modalVisible.value = false;
  };
</script>

<style src="../../css/styles.css" scoped></style>

<style src="../../css/styles.css" scoped></style>

