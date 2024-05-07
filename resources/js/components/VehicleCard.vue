<template>
    <v-card class="vehicle-card" elevation="hoverElevation">
      <v-row>
        <v-col cols="4" class="vehicle-image-col">
          <img :src="image" alt="Vehicle Image" class="vehicle-image" style="width: 100px; height: 100px; object-fit: contain; margin-right: 16px;"/>
        </v-col>
        <v-col cols="8" class="vehicle-details-col">
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

  <style scoped>
.vehicle-card {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-top: 50px;
}

.vehicle-image-col {
  display: flex;
  align-items: center;
  justify-content: center;
}

.vehicle-image {
  border-radius: 4px;
}

.vehicle-details-col {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.vehicle-details {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.vehicle-name {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 4px;
}

.vehicle-type {
  font-size: 14px;
  margin-bottom: 4px;
}

.vehicle-capacity {
  font-size: 14px;
  margin-bottom: 4px;
}

.vehicle-availability {
  font-size: 14px;
  font-weight: bold;
}
</style>

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
