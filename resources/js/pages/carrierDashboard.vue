<v-template>
    <NavBar />
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
        <v-card class="item-card" @click="showModal('Computers Cargo')" elevation="hoverElevation">
          <v-row>
            <v-col cols="4">
              <img src="../../assets/computers-cargo.jpg" alt="Item Image" class="item-image">
            </v-col>
            <v-col cols="8">
              <v-card-text>
                <div class="item-details">
                  <div class="item-name">Computers Cargo</div>
                  <div class="client">DepEd</div>
                  <div class="weight">1200Kg (Weight)</div>
                  <div class="from-to">From Marikina <span class="arrow-symbol">➔</span> iAcademy, Makati</div>
                  <div class="pickup-time">Pickup Time: 6:00AM</div>
                  <div class="drop-off-time">Estimated Drop-off Time: 3:00PM </div>
                </div>
              </v-card-text>
            </v-col>
          </v-row>
        </v-card>

        <!-- "Deliveries for Later" Text Positioned Below Item Card -->
        <div class="deliveries-later-text">Deliveries for Later</div>

        <!-- Item Card: Colgate Cargo -->
        <v-card class="item-card" @click="showModal('Colgate Cargo')" elevation="hoverElevation">
          <v-row>
            <v-col cols="4">
              <img src="../../assets/colgate-cargo.jpg" alt="Item Image" class="item-image">
            </v-col>
            <v-col cols="8">
              <v-card-text>
                <div class="item-details">
                  <div class="item-name">Colgate Cargo</div>
                  <div class="client">Puregold, Bay 3</div>
                  <div class="weight">700Kg (Weight)</div>
                  <div class="from-to">From Puregold, Bay 3 <span class="arrow-symbol">➔</span> Puregold, Conception</div>
                  <div class="pickup-time">Pickup Time: 7:00AM</div>
                  <div class="drop-off-time">Estimated Drop-off Time: 10:00PM </div>
                </div>
              </v-card-text>
            </v-col>
          </v-row>
        </v-card>
      </v-main>
    </div>

    <!-- Modal Popup -->
    <v-dialog v-model="modalVisible">
      <v-card>
        <v-card-title>{{ modalItemName }}</v-card-title>
        <v-card-text>
          <div>Order from: {{ modalItemDetails.orderFrom }}</div>
          <div>Ship Out Date: {{ modalItemDetails.shipOutDate }}</div>
          <div>Status: {{ modalItemDetails.status }}</div>
          <div>Destination: {{ modalItemDetails.destination }}</div>
          <!-- Additional details and buttons here -->
        </v-card-text>
        <v-card-actions>
          <v-btn color="green darken-1" @click="bid">Bid</v-btn>
          <v-btn color="red darken-1" @click="cancel">Cancel</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-template>

  <script setup>
  import NavBar from '../components/NavBar.vue';
  import { ref } from 'vue';

  const modalVisible = ref(false);
  const modalItemName = ref('');
  const modalItemDetails = ref({});

  const showModal = (itemName) => {
    if (itemName === 'Computers Cargo') {
      modalItemName.value = 'Computers Cargo';
      modalItemDetails.value = { orderFrom: 'DepEd', shipOutDate: "10/07/24", status: "Ongoing", destination: "iAcademy" };
    } else if (itemName === 'Colgate Cargo') {
      modalItemName.value = 'Colgate Cargo';
      modalItemDetails.value = { orderFrom: 'Puregold, Bay 3', shipOutDate: "12/27/24", status: "Ongoing", destination: "Puregold, Conception" };
    }
    modalVisible.value = true;
  };

  const bid = () => {
    // Handle bidding action
  };

  const cancel = () => {
    // Handle cancel action
  };
  </script>

  <style src="../../css/styles.css" scoped></style>
