<template>
    <v-card
      class="vehicle-card"
      elevation="12"
      :class="{ 'selected': isSelected }"
      @click="selectVehicle"
    >
      <v-row>
        <v-col cols="4" class="vehicle-image-col">
          <img :src="image" alt="Vehicle Image" class="vehicle-image" />
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
          <transition name="fade">
            <div v-if="selectedVehicle === vehicle" class="vehicle-description">
              <p>{{ vehicle.description }}</p>
            </div>
          </transition>
        </v-col>
      </v-row>
    </v-card>
  </template>

  <script>
  export default {
    props: {
      vehicle: {
        type: Object,
        required: true,
      },
      image: {
        type: String,
        required: true,
      },
      selectedVehicle: {
        type: Object,
        required: true,
      },
    },
    computed: {
      isSelected() {
        return this.selectedVehicle === this.vehicle;
      },
    },
    methods: {
      selectVehicle() {
        // emit an event to the parent component
        this.$emit('select-vehicle', this.vehicle);
      },
    },
  };
  </script>

  <style scoped>
  .vehicle-card {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
    border: 1px solid #ccc; /* default border color */
  }

  .selected {
    border: 2px solid #007bff; /* highlighted border color */
  }

  .vehicle-image-col {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .vehicle-image {
    border-radius: 4px;
    width: 100px; /* adjust image width for smaller screens */
    height: 100px;
    object-fit: contain;
    margin-right: 16px;
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

  /* Media queries for smaller screens */
  @media (max-width: 768px) {
    .vehicle-card {
      margin-top: 20px; /* reduce margin for smaller screens */
    }
    .vehicle-image {
      width: 80px; /* reduce image width for smaller screens */
      height: 80px;
      margin-right: 10px;
    }
    .vehicle-details-col {
      flex-direction: row; /* change layout for smaller screens */
    }
    .vehicle-details {
      flex-direction: row;
      align-items: center;
    }
    .vehicle-name,
    .vehicle-type,
    .vehicle-capacity,
    .vehicle-availability {
      font-size: 12px; /* reduce font size for smaller screens */
    }
  }

  @media (max-width: 480px) {
    .vehicle-card {
      margin-top: 10px; /* reduce margin for even smaller screens */
    }
    .vehicle-image {
      width: 60px; /* reduce image width for even smaller screens */
      height: 60px;
    }
    .vehicle-details-col {
      flex-direction: column; /* change layout for even smaller screens */
    }
    .vehicle-details {
      flex-direction: column;
      align-items: flex-start;
    }
    .vehicle-name,
    .vehicle-type,
    .vehicle-capacity,
    .vehicle-availability {
      font-size: 10px; /* reduce font size for even smaller screens */
    }
  }
  </style>
