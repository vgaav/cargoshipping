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
    margin-top: 20px; /* Reduced margin */
    border: 1px solid #ccc; /* Default border color */
    padding: 10px; /* Added padding */
  }

  .selected {
    border: 2px solid #007bff; /* Highlighted border color */
  }

  .vehicle-image-col {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .vehicle-image {
    border-radius: 4px;
    width: 80px; /* Reduced image width */
    height: 80px;
    object-fit: contain;
    margin-right: 10px; /* Reduced margin */
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
    font-size: 16px; /* Reduced font size */
    font-weight: bold;
    margin-bottom: 2px; /* Reduced margin */
  }

  .vehicle-type,
  .vehicle-capacity,
  .vehicle-availability {
    font-size: 12px; /* Reduced font size */
    margin-bottom: 2px; /* Reduced margin */
  }

  .vehicle-availability {
    font-weight: bold;
  }

  /* Media queries for smaller screens */
  @media (max-width: 768px) {
    .vehicle-card {
      margin-top: 15px; /* Reduced margin for smaller screens */
      padding: 8px; /* Reduced padding */
    }

    .vehicle-image {
      width: 70px; /* Reduced image width for smaller screens */
      height: 70px;
    }

    .vehicle-details-col {
      flex-direction: row; /* Change layout for smaller screens */
    }

    .vehicle-details {
      flex-direction: row;
      align-items: center;
    }

    .vehicle-name,
    .vehicle-type,
    .vehicle-capacity,
    .vehicle-availability {
      font-size: 12px; /* Adjusted font size for smaller screens */
    }
  }

  @media (max-width: 480px) {
    .vehicle-card {
      margin-top: 10px; /* Reduced margin for even smaller screens */
      padding: 6px; /* Reduced padding */
    }

    .vehicle-image {
      width: 60px; /* Reduced image width for even smaller screens */
      height: 60px;
    }

    .vehicle-details-col {
      flex-direction: column; /* Change layout for even smaller screens */
    }

    .vehicle-details {
      flex-direction: column;
      align-items: flex-start;
    }

    .vehicle-name,
    .vehicle-type,
    .vehicle-capacity,
    .vehicle-availability {
      font-size: 11px; /* Reduced font size for even smaller screens */
    }
  }

  </style>
