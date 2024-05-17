<!-- ReviewAndConfirm.vue -->
<template>
    <div class="review-and-confirm">
      <h2>Review and Confirm Transaction</h2>
      <!-- Review and confirm UI components -->
      <div class="review-summary">
        <div class="selected-item">
          <h3>Selected Item:</h3>
          <p>{{ selectedItem.itemName }}</p>
          <p>{{ selectedItem.client }}</p>
          <p>{{ selectedItem.pickupTime }}</p>
          <p>{{ selectedItem.destination }}</p>
          <p>{{ selectedItem.currentBids }}</p>
          <p>{{ selectedItem.quote }}</p>
        </div>
        <div class="selected-vehicle">
          <h3>Selected Vehicle:</h3>
          <p>{{ selectedVehicle.type }}</p>
          <p>{{ selectedVehicle.capacity }}</p>
        </div>
      </div>
      <div class="confirm-button">
        <v-btn color="green" @click="confirm">Confirm</v-btn>
      </div>
    </div>
  </template>

  <script>
  export default {
    computed: {
      selectedItem() {
        // Return the selected item from the store or parent component
        return this.$store.state.selectedItem;
      },
      selectedVehicle() {
        // Return the selected vehicle from the store or parent component
        return this.$store.state.selectedVehicle;
      },
    },
    methods: {
      confirm() {
        // Handle the confirm button click
      },
    },
  };
  </script>
