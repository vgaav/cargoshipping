<template>
    <div class="bg-eeF4ED min-h-screen">
      <div class="container mx-auto px-3 py-5">
        <v-window v-model="currentWindow" class="min-h-screen">
          <v-window-item :value="1">
            <div class="container mx-auto px-4 py-8 pb-16">
              <h2 class="text-2xl font-bold mb-4 flex items-center">
                Vehicle Selection
                <img src="../../assets/help-circle.svg" alt="Help Icon" class="ml-2 w-5 h-5 cursor-pointer" @click="showHelpModal('vehicleSelect')" />
              </h2>
              <div class="flex flex-wrap gap-4 justify-center">
                <transition-group name="fade" tag="div" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                  <VehicleCard
                    v-for="(vehicle, index) in vehicles"
                    :key="index"
                    :vehicle="vehicle"
                    :image="getVehicleImage(vehicle.vehicle_type)"
                    :selected-vehicle="selectedVehicle"
                    @select-vehicle="handleSelectVehicle"
                    class="w-full sm:w-1/2 lg:w-1/4"
                  />
                </transition-group>
              </div>
            </div>
            <button @click="currentWindow = 2" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg">
              Next: Add Item Information
            </button>
          </v-window-item>

          <v-window-item :value="2">
            <div class="container mx-auto px-4 py-8 pb-16">
              <h2 class="text-2xl font-bold mb-4">Add Item Information</h2>
              <form @submit.prevent="submitForm" class="space-y-4">
                <div>
                  <label for="itemName" class="block text-sm font-medium text-gray-700">Item Name</label>
                  <input v-model="itemName" type="text" id="itemName" class="mt-1 block w-full bg-white rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                  <label for="itemQuote" class="block text-sm font-medium text-gray-700">Quote/Pricing</label>
                  <input v-model="itemQuote" type="number" id="itemQuote" class="mt-1 block w-full bg-white  rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                  <label for="itemDescription" class="block text-sm font-medium text-gray-700">Description</label>
                  <textarea v-model="itemDescription" id="itemDescription" class="mt-1 block w-full bg-white rounded-md border-gray-300 shadow-sm" required></textarea>
                </div>
                <!-- Add more fields as needed -->
                <button type="submit" class="mt-4 bg-orange-500 text-white py-2 px-4 rounded-lg">Submit</button>
                <button type="button" class="mt-4 bg-gray-500 text-white py-2 px-4 rounded-lg" @click="goBackToVehicleSelection">Back</button>
              </form>
            </div>
          </v-window-item>
        </v-window>
      </div>
     <!-- <navbar-alternate />-->
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import VehicleCard from '../components/VehicleCard.vue';
  import NavbarAlternate from '../components/NavbarAlternate.vue';
  import scooterDelivery from '../../assets/scooter.png';
  import vanDelivery from '../../assets/van.png';
  import pickupDelivery from '../../assets/pickup.png';
  import truckDelivery from '../../assets/truck.png';

  const vehicles = ref([]);
  const selectedVehicle = ref(null);
  const helpModalVisible = ref(false);
  const helpModalText = ref('');
  const confirmDialog = ref(false);
  const currentWindow = ref(1);

  const itemName = ref('');
  const itemQuote = ref('');
  const itemDescription = ref('');

  const fetchVehicles = async () => {
    try {
      const response = await axios.get('/vehicles');
      vehicles.value = response.data;
      console.log('Fetched vehicles:', vehicles.value);
    } catch (error) {
      console.error('Error fetching vehicles:', error);
    }
  };

  onMounted(() => {
    fetchVehicles();
  });

  const showHelpModal = (type) => {
    helpModalVisible.value = true;
    if (type === 'vehicleSelect') {
      helpModalText.value = 'This is where you can view your available vehicles. Select which vehicle will handle the delivery.';
    }
  };

  const handleSelectVehicle = (vehicle) => {
    selectedVehicle.value = vehicle;
    currentWindow.value = 2;
  };

  const goBackToVehicleSelection = () => {
    currentWindow.value = 1;
  };

  const getVehicleImage = (vehicleType) => {
    if (vehicleType === 'Motorcycle') {
      return scooterDelivery;
    } else if (vehicleType === 'Van') {
      return vanDelivery;
    } else if (vehicleType === 'Pickup') {
      return pickupDelivery;
    } else if (vehicleType === 'Truck') {
      return truckDelivery;
    }
  };

  const submitForm = () => {
    // Handle form submission
    console.log('Form Submitted:', {
      itemName: itemName.value,
      itemQuote: itemQuote.value,
      itemDescription: itemDescription.value,
    });
  };
  </script>

  <style scoped>
  .bg-eeF4ED {
    background-color: #EEF4ED;
  }
  .help-icon {
    cursor: pointer;
  }
  </style>
