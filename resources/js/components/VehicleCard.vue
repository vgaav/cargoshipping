<template>
    <v-card class="vehicle-card" elevation="hoverElevation">
      <v-row>
        <v-col cols="4">
          <img src="../../assets/vehicle-icon.svg" alt="Vehicle Icon" class="vehicle-icon">
        </v-col>
        <v-col cols="8">
          <v-card-text>
            <div class="vehicle-details">
              <div class="vehicle-name">{{ vehicle.name }}</div>
              <div class="vehicle-type">{{ vehicle.type }}</div>
              <div class="vehicle-capacity">{{ vehicle.capacity }}</div>
              <div class="vehicle-availability">{{ vehicle.availability }}</div>
            </div>
          </v-card-text>
        </v-col>
      </v-row>
    </v-card>
  </template>

  <script>
  export default {
    props: {
      vehicle: {
        type: Object,
        required: true
      }
    }
  }
  </script>
