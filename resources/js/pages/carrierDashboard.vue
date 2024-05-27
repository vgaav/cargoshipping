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
                        <div class="ongoing-text">Ongoing <img src="../../assets/help-circle.svg" alt="An example icon"
                                class="help-icon" @click="showHelpModal('ongoing')" /></div>


                                <ItemCard v-if="items.length > 0"
                                    :item-name="items[0].item_name"
                                    :item-image="items[0].item_image"
                                    :client="items[0].item_client"
                                    :weight="items[0].item_weight"
                                    :from="items[0].item_from"
                                    :to="items[0].item_destination"
                                    :pickup-time="items[0].item_pickup_time"
                                    :drop-off-time="items[0].item_dropoff_time"
                                    :quote="items[0].item_quote"
                                    @click="showModal(items[0].item_name)" />

                        <!-- Item Card: Computers Cargo -->
                        <ItemCard :item-name="'Computers Cargo'" :item-image="computersCargoImage"
                            :client="'DepEd'" :weight="'1200Kg'" :from="'Marikina'"
                            :to="'iAcademy, Makati'" :pickup-time="'6:00AM'" :drop-off-time="'3:00PM'"
                            :quote="8000" @click="showModal" />
                        <!-- "Deliveries for Later" Text Positioned Below Item Card -->
                        <div class="deliveries-later-text">Deliveries for Later <img src="../../assets/help-circle.svg"
                                alt="An example icon" class="help-icon" @click="showHelpModal('deliveriesLater')" />
                        </div>

                        <!-- Item Card: Colgate Cargo -->
                        <ItemCard :item-name="'Colgate Cargo'" :item-image="colgateCargoImage"
                            :client="'Colgate-Palmolive'" :weight="'700Kg'" :from="'Mckinley Hill, Taguig'"
                            :to="'Puregold, Marikina'" :pickup-time="'7:00AM'" :drop-off-time="'10:00PM'"
                            :quote="5000" @click="showModal" />

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


                     <!-- Modal -->
                     <v-dialog v-model="modalVisible" max-width="400" class="custom-dialog">
                        <img :src="selectedItem.itemImage" alt="Item Image" class="item-image">
                        <v-card>
                          <v-card-title><u>Shipping Information</u></v-card-title>
                          <v-card-text>
                            <div class="info-row">
                              <label>Order from:</label>
                              <span>{{ selectedItem.client }}</span>
                            </div>
                            <div class="info-row">
                              <label>Ship Out Date:</label>
                              <span>{{ selectedItem.pickupTime }}</span>
                            </div>
                            <div class="info-row">
                              <label>Status:</label>
                              <span>{{ selectedItem.status }}</span>
                            </div>
                            <div class="info-row">
                              <label>Destination:</label>
                              <span>{{ selectedItem.destination }}</span>
                            </div>
                            <div class="info-row">
                              <label>Current Bids:</label>
                              <span>{{ selectedItem.currentBids }}</span>
                            </div>
                            <div class="info-row">
                              <label>Quote/Pricing:</label>
                              <span>{{ selectedItem.quote }}</span>
                            </div>
                            <v-btn @click="showItemInfo = !showItemInfo" class="toggle-info-btn">Show Item Information</v-btn>
                            <!-- Item Information -->
                            <transition name="fade">
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
                            </transition>
                          </v-card-text>
                          <v-card-actions v-if="modalVisible">
                            <template v-if="!bidPlaced">
                              <v-btn class="custom-btn green" color="green" @click="showBidModal">Bid</v-btn>
                              <v-btn class="custom-btn red" color="red" @click="cancel">Cancel</v-btn>
                            </template>
                            <template v-else>
                              <div class="bid-placed-text">Bid has been placed</div>
                            </template>
                          </v-card-actions>
                        </v-card>
                      </v-dialog>


<!--                    <img :src="selectedItem.itemImage" alt="Item Image" style="max-width: 100%;">
-->
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
                        :image="getVehicleImage(vehicle.type)"
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
                  />
                  </v-window-item>
            </v-window>
        </div>
    </div>
    <NavBar />
</template>

<script setup>
import { ref, onMounted } from "vue";
import NavBar from "../components/NavBar.vue";
import VehicleCard from "../components/VehicleCard.vue";
import ItemCard from "../components/ItemCard.vue";
import computersCargoImage from "../../assets/computers-cargo.jpg";
import colgateCargoImage from "../../assets/colgate-cargo.jpg";
import scooterDelivery from "../../assets/scooter.png";
import vanDelivery from "../../assets/van.png";
import ReviewAndConfirm from "../components/ReviewAndConfirm.vue";

const items = ref([]); // Array to store fetched items data
const step = ref(1);
const bidModalVisible = ref(false);
const modalVisible = ref(false);
const bidPlaced = ref(false);
const selectedItem = ref({});
const showItemInfo = ref(false);
const selectedVehicle = ref(null);
const helpModalVisible = ref(false);
const helpModalText = ref("");
const confirmDialog = ref(false);
const bidAmount = ref(null);
const minimumBid = ref(null);

const fetchItems = () => {
  fetch('/api/items')
    .then(response => response.json())
    .then(data => {
      items.value = data;
    })
    .catch(error => {
      console.error('Error fetching items:', error);
    });
};

onMounted(() => {
  fetchItems();
});
    const bidRules = [
  v => v >= 0 || 'Bid amount must be non-negative',
  v => v <= selectedItem.value.quote || `Bid amount must be below ${selectedItem.value.quote}`,

];

const minimumBidRules = [
  v => v >= 0 || 'Minimum bid must be non-negative',
  v => v <= selectedItem.value.quote || `Minimum bid must be below ${selectedItem.value.quote}`,
];

    onMounted(() => {
        setTimeout(() => {
            carrierDashboardPage.value.classList.add("animate-drop-down");
        }, 100);
    });

    const showModal = (itemName, isBidPlaced = false) => {
    if (itemName === "Computers Cargo" || itemName === "Colgate Cargo") {
        modalVisible.value = true;
        bidPlaced.value = isBidPlaced;
        if (itemName === "Computers Cargo") {
            selectedItem.value = {
                client: "DepEd",
                pickupTime: "6:00AM",
                status: "Ongoing",
                destination: "iAcademy, Makati",
                currentBids: "100",
                isBidPlaced: isBidPlaced,
                quote: 8000,
                //item information
                itemName: "20 Boxes - Full Set computers (Keyboard, CPU, Desktop, Mouse)",
                length: "Not Provided",
                width: "Not Provided",
                height: "Not Provided",
                weight: "450kg (Overall)",
                // item image
                itemImage: computersCargoImage
            };
        } else if (itemName === "Colgate Cargo") {
            selectedItem.value = {
                client: "Colgate-Palmolive",
                pickupTime: "7:00AM",
                status: "Ongoing",
                destination: "Puregold, Marikina",
                currentBids: "200",
                isBidPlaced: isBidPlaced,
                quote: 5000,
                //item information
                itemName: "10 Boxes of Colgate Toothpaste (20 pieces per box)",
                length: "Not Provided",
                width: "Not Provided",
                height: "Not Provided",
                weight: "380kg (Overall)",
                // item image
                itemImage: colgateCargoImage
            };
        }
    } else {
        console.log("Invalid item name");
    }
};


    const cancel = () => {
        console.log("Cancel button clicked");
        modalVisible.value = false;
        bidPlaced.value = false;
        selectedItem.value = {
            client: "",
            pickupTime: "",
            status: "",
            destination: "",
            currentBids: "",
            isBidPlaced: false,
        };
    };

    const showHelpModal = (type) => {
        helpModalVisible.value = true;
        if (type === "ongoing") {
            helpModalText.value = "Ongoing deliveries are shipments that are currently in transit.";
        } else if (type === "deliveriesLater") {
            helpModalText.value =
                "Deliveries for later are shipments that are scheduled to be delivered at a later date.";
        } else if (type === "vehicleSelect") {
            helpModalText.value =
                "This is where you can view your available vehicles. Select which vehicle will handle the delivery.";
        }
    };

    const handleSelectVehicle = (vehicle) => {
    selectedVehicle.value = vehicle;
    confirmDialog.value = true; // show confirmation dialog
  };

  const confirmSelection = () => {
    step.value = 3; // move to step 3
    confirmDialog.value = false; // hide confirmation dialog
  };

    const selectVehicle = (vehicle) => {
        selectedVehicle.value = vehicle;
    };

    const vehicles = ref([{
            name: "Vehicle 1",
            type: "Motorcycle",
            capacity: "100kg",
            availability: "Available",
        },
        {
            name: "Vehicle 2",
            type: "Van",
            capacity: "500kg",
            availability: "Available",
        },
    ]);

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
    // Display an alert or error message
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
    const getVehicleImage = (vehicleType) => {
        if (vehicleType === "Motorcycle") {
            return scooterDelivery;
        } else if (vehicleType === "Van") {
            return vanDelivery;
        }
        // Add more vehicle types to the switch statement
    };
</script>
<style src="../../css/styles.css" scoped></style>
