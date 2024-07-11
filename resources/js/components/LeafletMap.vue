<template>
    <div ref="mapContainer" class="leaflet-map"></div>
  </template>



  <!-- Change later to <script setup> tag -->
  <script>
  import { ref, onMounted } from 'vue';
  import L from 'leaflet';
  import 'leaflet/dist/leaflet.css';

  export default {
    name: 'LeafletMap',
    setup() {
      const mapContainer = ref(null);

      onMounted(() => {
        const map = L.map(mapContainer.value).setView([14.6468, 121.1047], 14);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Sample marker
        L.marker([14.6468, 121.1047]).addTo(map)
          .bindPopup('Marker Example')
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
