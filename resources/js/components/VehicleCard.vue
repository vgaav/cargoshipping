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
              <div class="vehicle-name">Vehicle: {{ vehicle.vehicle_name }}</div>
              <div class="vehicle-type">Type: {{ vehicle.vehicle_type }}</div>
              <div class="vehicle-capacity">Capacity: {{ vehicle.capacity }}kg</div>
              <div :class="availabilityClass">{{ availabilityText }}</div>
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
      availabilityText() {
        return this.vehicle.availability === 1 ? 'Available' : 'Unavailable';
      },
      availabilityClass() { // Add this computed property
        return this.vehicle.availability === 1 ? 'available' : 'unavailable';
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
    margin-top: 20px; /* Default margin */
    border: 1px solid #ccc; /* Default border color */
    padding: 10px; /* Default padding */
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
    width: 80px; /* Default image width */
    height: 80px;
    object-fit: contain;
    margin-right: 10px; /* Default margin */
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
    font-size: 25px; /* Default font size */
    font-weight: bold;
    margin-bottom: 2px; /* Default margin */
  }

  .vehicle-type,
  .vehicle-capacity,
  .vehicle-availability {
    font-size: 18px; /* Default font size */
    margin-bottom: 2px; /* Default margin */
  }

  .vehicle-availability {
    font-weight: bold;
  }

  .available {
    color: green;
  }

  .unavailable {
    color: red;
    background-color: #ccc; /* Gray out the card */
    pointer-events: none; /* Disable click events */
  }

    @media (max-width: 600px) {
        .vehicle-card {
          margin-top: 12px; /* Adjusted margin for screens up to 600px width */
          padding: 6px; /* Adjusted padding for screens up to 600px width */
        }

        .vehicle-image {
          width: 60px; /* Adjusted image width for screens up to 600px width */
          height: 60px;
        }

        .vehicle-details-col {
          flex-direction: column; /* Change layout for screens up to 600px width */
        }

        .vehicle-details {
          flex-direction: column;
          align-items: flex-start;
        }

        .vehicle-name,
        .vehicle-type,
        .vehicle-capacity,
        .vehicle-availability {
          font-size: 11px; /* Adjusted font size for screens up to 600px width */
        }
        .unavailable {
            color: red;
            background-color: #ccc; /* Gray out the card */
            pointer-events: none; /* Disable click events */
          }
      }
  </style>
