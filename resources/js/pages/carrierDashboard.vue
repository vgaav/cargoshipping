<template>
    <NavBar />
    <div class="dashboard">
      <div class="header">
        <div class="website-name">BidGo</div>
        <div class="user-welcome">Welcome, [username] <img src="../../assets/account.svg" alt="User Symbol" class="user-symbol"></div>
      </div>
      <v-main>
        <!-- "Deliveries" Text Positioned at the Top Right -->
        <div class="deliveries-text">Deliveries</div>

        <!-- "Ongoing" Text Positioned Below "Deliveries" -->
        <div class="ongoing-text">Ongoing</div>

        <!-- Item Card: Computers Cargo -->
        <v-card class="item-card" :class="{ 'hoverable': !isClicked }" @click="toggleClicked" elevation="hoverElevation">
          <v-row>
            <v-col cols="4">
              <img src="../../assets/computers-cargo.jpg" alt="Item Image" class="item-image">
            </v-col>
            <v-col cols="8">
              <v-card-text>
                <div class="item-details">
                  <div class="item-name">Computers Cargo</div>
                  <div class="client">DepEd</div>
                  <div class="weight">1200Kg (Weight)</div>
                  <div class="from-to">From Marikina <span class="arrow-symbol">➔</span> iAcademy, Makati</div>
                  <div class="pickup-time">Pickup Time: 6:00AM</div>
                  <div class="drop-off-time">Estimated Drop-off Time: 3:00PM </div>
                </div>
              </v-card-text>
            </v-col>
          </v-row>
        </v-card>

        <!-- "Deliveries for Later" Text Positioned Below Item Card -->
        <div class="deliveries-later-text">Deliveries for Later</div>

        <!-- Item Card: Colgate Cargo -->
        <v-card class="item-card" :class="{ 'hoverable': !isClicked }" @click="toggleClicked" elevation="hoverElevation">
          <v-row>
            <v-col cols="4">
              <img src="../../assets/colgate-cargo.jpg" alt="Item Image" class="item-image">
            </v-col>
            <v-col cols="8">
              <v-card-text>
                <div class="item-details">
                  <div class="item-name">Colgate Cargo</div>
                  <div class="client">Puregold, Bay 3</div>
                  <div class="weight">700Kg (Weight)</div>
                  <div class="from-to">From Puregold, Bay 3 <span class="arrow-symbol">➔</span> Puregold, Conception</div>
                  <div class="pickup-time">Pickup Time: 7:00AM</div>
                  <div class="drop-off-time">Estimated Drop-off Time: 10:00PM </div>
                </div>
              </v-card-text>
            </v-col>
          </v-row>
        </v-card>
      </v-main>
    </div>
  </template>

<script setup>
import NavBar from '../components/NavBar.vue';

import { ref } from 'vue';

const isClicked = ref(false);

const toggleClicked = () => {
  isClicked.value = !isClicked.value;
}
</script>

<style src="../../css/styles.css" scoped></style>

