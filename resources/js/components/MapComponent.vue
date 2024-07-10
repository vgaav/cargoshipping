<template>
    <l-map style="height: 500px; width: 100%;" :zoom="13" :center="[51.505, -0.09]">
      <l-tile-layer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        attribution="&copy; <a href='https://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors"
      />
      <l-marker :lat-lng="[51.505, -0.09]"></l-marker>
    </l-map>
  </template>

  <script>
  export default {
    name: 'MapComponent',
  };
  </script>

  <style scoped>
  /* Add any styles you need for the map */
  </style>
