<template>
    <div ref="mapContainer" class="leaflet-map"></div>
  </template>
  


  <!-- Change later to <script setup> tag -->
  <script>
  import { ref, onMounted } from 'vue';
  import L from 'leaflet';
  
  export default {
    name: 'LeafletMap',
    setup() {
      const mapContainer = ref(null);
  
      onMounted(() => {

        //Sets the X & Y Axis of the map
        const map = L.map(mapContainer.value).setView([14.6468,121.1047], 14);
        
        //Displays the tile 
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        
        // Sample Pointer here
        L.marker([14.6468,121.1047]).addTo(map)
          .bindPopup('Marikina City.')
          .openPopup();
      });
  
      return { mapContainer };
    }
  };
  </script>
  
  <style>
  .leaflet-map {
    height: 400px;
  }
  </style>
  