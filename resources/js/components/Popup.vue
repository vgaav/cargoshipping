
<!--This will appear when a item card is clicked :O -->
<template>
    <v-dialog v-model="show" max-width="500">
      <v-card>
        <v-card-title>{{ itemName }}</v-card-title>
        <v-card-text>
          <div>Order from: {{ itemDetails.orderFrom }}</div>
          <div>Ship-Out Date: {{ itemDetails.shipOutDate }}</div>
          <div>Status: {{ itemDetails.status }}</div>
          <div>Destination: {{ itemDetails.destination }}</div>
        </v-card-text>
        <v-card-actions>
          <v-btn color="green darken-1" @click="bid">Bid</v-btn>
          <v-btn color="red darken-1" @click="cancel">Cancel</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </template>

  <script setup>
  import { ref, watch } from 'vue';

  // Props
  const show = ref(false);
  const itemName = ref('');
  const itemDetails = ref({});

  // Methods
  const bid = () => {
    // Handle bidding action
  };

  const cancel = () => {
    // Handle cancel action
  };

  // Watch for changes in the show prop and reset item details
  watch(show, (newValue) => {
    if (!newValue) {
      resetItemDetails();
    }
  });

  const resetItemDetails = () => {
    itemName.value = '';
    itemDetails.value = {};
  };
  </script>
