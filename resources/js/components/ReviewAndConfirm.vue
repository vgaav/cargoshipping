<template>
    <v-card class="review-and-confirm-card" elevation="12">
      <v-card-title>
        <h2>Review and Confirm Transaction</h2>
      </v-card-title>
      <v-card-text>
        <div class="review-summary">
          <div class="selected-item">
            <h3>Selected Item:</h3>
            <p><b>Item Name: </b> {{ selectedItem.itemName }}</p>
            <p><b>Client:</b> {{ selectedItem.client }}</p>
            <p><b>Pick-up time:</b> {{ selectedItem.pickupTime }}</p>
            <p><b>Destination:</b> {{ selectedItem.destination }}</p>
            <p><b>Current Bids:</b> {{ selectedItem.currentBids }}</p>
            <p><b>Delivery Quote/Price:</b> {{ selectedItem.quote }}</p>
          </div>
          <div class="selected-vehicle">
            <h3>Selected Vehicle:</h3>
            <p><b>Delivery Vehicle:</b> {{ selectedVehicle.type }}</p>
            <p><b>Vehicle Capacity:</b> {{ selectedVehicle.capacity }}</p>
          </div>
        </div>
      </v-card-text>
      <v-card-actions class="confirm-button">
        <v-btn color="green" dark @click="confirm">Confirm</v-btn>
    </v-card-actions>
    </v-card>
  </template>

  <script>
  export default {
    props: {
      selectedItem: {
        type: Object,
        required: true,
      },
      selectedVehicle: {
        type: Object,
        required: true,
      },
    },
    methods: {
      confirm() {
        // Handle the confirm button click
        console.log('Transaction confirmed:', {
          selectedItem: this.selectedItem,
          selectedVehicle: this.selectedVehicle,
        });
      },
    },
  };
  </script>

<style scoped>
.review-and-confirm-card {
  max-width: 600px;
  margin: 20px auto;
  padding: 20px;
  text-align: center;
}

.review-summary {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
}

.selected-item,
.selected-vehicle {
  margin-bottom: 20px;
}

h2 {
  margin-bottom: 20px;
}

h3 {
  margin-bottom: 10px;
}

.confirm-button {
  display: flex;
  justify-content: center;
}
</style>
