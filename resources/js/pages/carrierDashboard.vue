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

                        <!-- Item Card: Computers Cargo -->
                        <ItemCard :item-name="'Computers Cargo'" :item-image="computersCargoImage"
                            :client="'DepEd'" :weight="'1200Kg'" :from="'Marikina'"
                            :to="'iAcademy, Makati'" :pickup-time="'6:00AM'" :drop-off-time="'3:00PM'"
                            :quote=8000 @click="showModal" />
                        <!-- "Deliveries for Later" Text Positioned Below Item Card -->
                        <div class="deliveries-later-text">Deliveries for Later <img src="../../assets/help-circle.svg"
                                alt="An example icon" class="help-icon" @click="showHelpModal('deliveriesLater')" />
                        </div>

                        <!-- Item Card: Colgate Cargo -->
                        <ItemCard :item-name="'Colgate Cargo'" :item-image="colgateCargoImage"
                            :client="'Colgate-Palmolive'" :weight="'700Kg'" :from="'Mckinley Hill, Taguig'"
                            :to="'Puregold, Marikina'" :pickup-time="'7:00AM'" :drop-off-time="'10:00PM'"
                            :quote=5000 @click="showModal" />

                        <v-dialog v-model="bidModalVisible" max-width="400">
                            <v-card>
                                <v-card-title>Bid Confirmation</v-card-title>
                                <v-card-text>
                                    <form>
                                        <v-text-field v-model="bidForm.bidAmount" label="Bid Amount" type="number" required />
                                        <div v-if="bidValidationMessage" class="validation-message">{{ bidValidationMessage }}</div>
                                        <v-text-field v-model="bidForm.minimumBid" label="Minimum Bid" type="number" required />
                                        <div v-if="minimumBidValidationMessage" class="validation-message">{{ minimumBidValidationMessage }}</div>
                                    </form>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="green" @click="confirmBid">Confirm Bid</v-btn>
                                    <v-btn color="red" @click="cancelBid">Cancel</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>

                        <v-dialog v-model="confirmDialog" max-width="400">
                            <v-card>
                              <v-card-title>Confirm Vehicle Selection</v-card-title>
                              <v-card-text>Are you sure you want to select this vehicle?</v-card-text>
                              <v-card-actions>
                                <v-btn color="green" @click="confirmSelection">Confirm</v-btn>
                                <v-btn color="red" @click="confirmDialog = false">Cancel</v-btn>
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
                                        <span>{{ selectedItem . client }}</span>
                                    </div>
                                    <div>
                                        <label>Ship Out Date:</label>
                                        <span>{{ selectedItem . pickupTime }}</span>
                                    </div>
                                    <div>
                                        <label>Status:</label>
                                        <span>{{ selectedItem . status }}</span>
                                    </div>
                                    <div>
                                        <label>Destination:</label>
                                        <span>{{ selectedItem . destination }}</span>
                                    </div>
                                    <div>
                                        <label>Current Bids:</label>
                                        <span>{{ selectedItem . currentBids }}</span>
                                    </div>
                                    <div>
                                        <label>Quote/Pricing:</label>
                                        <span>{{ selectedItem . quote }}</span>
                                    </div>
                                    <v-btn @click="showItemInfo = !showItemInfo">Show Item Information</v-btn>
                                    <!-- Item Information -->
                                    <div v-if="showItemInfo" class="item-info-card">
                                        <div class="item-info-row">
                                            <label>Description:</label>
                                            <span>{{ selectedItem . itemName }}</span>
                                        </div>
                                        <div class="item-info-row">
                                            <label>Length:</label>
                                            <span>{{ selectedItem . length }}</span>
                                        </div>
                                        <div class="item-info-row">
                                            <label>Width:</label>
                                            <span>{{ selectedItem . width }}</span>
                                        </div>
                                        <div class="item-info-row">
                                            <label>Height:</label>
                                            <span>{{ selectedItem . height }}</span>
                                        </div>
                                        <div class="item-info-row">
                                            <label>Weight:</label>
                                            <span>{{ selectedItem . weight }}</span>
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
                                </v-card-actions>
                            </v-card>
                        </v-dialog>

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
                    <div class="back-button">
                      <span class="text--primary" @click="step--">Back to Items</span>
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
    import {
        ref,
        onMounted
    } from "vue";
    import NavBar from "../components/NavBar.vue";
    import VehicleCard from "../components/VehicleCard.vue";
    import ItemCard from "../components/ItemCard.vue";
    import computersCargoImage from "../../assets/computers-cargo.jpg";
    import colgateCargoImage from "../../assets/colgate-cargo.jpg";
    import scooterDelivery from "../../assets/scooter.png";
    import vanDelivery from "../../assets/van.png";
    import ReviewAndConfirm from "../components/ReviewAndConfirm.vue";

    provide('selectedItem', selectedItem)



    const step = ref(1);
    const bidModalVisible = ref(false);
    const bidForm = ref({
        bidAmount: 0,
        minimumBid: 0,
    });
    const modalVisible = ref(false);
    const bidPlaced = ref(false);
    const selectedItem = ref({});
    const showItemInfo = ref(false);
    const selectedVehicle = ref(null);
    const helpModalVisible = ref(false);
    const bidValidationMessage = ref('');
    const minimumBidValidationMessage = ref('');
    const helpModalText = ref("");
    const confirmDialog = ref(false);


    const carrierDashboardPage = ref(null);

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
      };
      console.log(selectedItem.value.quote); // Add this line
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


    //Button  for Confirm bid
    const confirmBid = (selectedItem) => {

        if (!selectedItem) {
    console.error("Selected item or quote is EMPTY");
    console.error(`Invalid quote value: ${selectedItem.value.name}`);

    return;
  }
  console.log(`Invalid itemName: ${selectedItem.itemName}`);
  console.log(`Invalid item Client: ${selectedItem.client}`);

    try{
  // Convert the input values to integers
  const bidAmount = parseFloat(bidForm.value.bidAmount);
  const itemQuote = parseFloat(selectedItem.value.quote); // Convert quote to a number
  const minimumBid = parseFloat(bidForm.value.minimumBid);

  // Clear validation messages
  bidValidationMessage.value = '';
  minimumBidValidationMessage.value = '';

  // Validate bidAmount
  if (bidForm.value.bidAmount <= 0) {
    bidValidationMessage.value = 'The bid amount must be above 0.';
    return;
  }

  // Validate minimumBid
  if (bidForm.value.minimumBid <= 0) {
    minimumBidValidationMessage.value = 'The minimum bid must be above 0.';
    return;
  }



  // Check if bidAmount is above the given item quote/price
  if (bidForm.value.bidAmount >= itemQuote) {
    bidValidationMessage.value = 'The bid must be below the item quote/price.';
    return;
  }

  if (bidForm.value.minimumBid >= itemQuote) {
    minimumBidValidationMessage.value = 'The minimum bid must be below the item quote/price.';
    return;
  }
  // Update the selectedItem.value.quote property
  selectedItem.value.quote = bidForm.value.bidAmount;

  // Add your bid confirmation logic here
  console.log(`Bid amount: ${bidForm.value.bidAmount}, Minimum bid: ${bidForm.value.minimumBid}`);

  // Update the UI to show the bid has been placed
  bidPlaced.value = true;
  bidModalVisible.value = false;
  selectedItem.value.currentBids++;

  step.value = 2;
  }catch(error){
    console.error(`Invalid quote value: ${selectedItem.value.quote}`);
  }
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
