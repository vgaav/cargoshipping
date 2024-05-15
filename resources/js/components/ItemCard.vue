<template>
    <v-card class="item-card" :class="{ 'hoverable':!isClicked }" @click="$emit('click', itemName)" elevation="hoverElevation">
      <v-row>
          <v-col cols="4">
            <img :src="itemImage" alt="Item Image" class="item-image">
          </v-col>
          <v-col cols="8">
            <v-card-text>
              <div class="item-details">
                <div class="item-name">{{ itemName }}</div>
                <div class="client"><b>Client:</b> {{ client }}</div>
                <div class="weight">{{ weight }} (Weight)</div>
                <div class="from-to"><b>From: {{ from }}</b> <span class="arrow-symbol">➔</span> <b>To: {{ to }}</b></div>
                <div class="pickup-time"><b>Pickup Time:</b> {{ pickupTime }}</div>
                <div class="drop-off-time"><b>Estimated Drop-off Time:</b> {{ dropOffTime }}</div>
                <div class="quote"><b>Quote/Price: P</b>{{ parseFloat(quote) }}</div>
              </div>
            </v-card-text>
          </v-col>
        </v-row>
      </v-card>
    </template>

    <script>
    export default {
      props: {
        itemName: {
          type: String,
          required: true
        },
        itemImage: {
          type: String,
          required: true
        },
        client: {
          type: String,
          required: true
        },
        weight: {
          type: String,
          required: true
        },
        from: {
          type: String,
          required: true
  },
        to: {
          type: String,
          required: true
        },
        pickupTime: {
          type: String,
          required: true
        },
        dropOffTime: {
          type: String,
          required: true
        },
        quote: {
          type: Number,
          required: true
        }
      },
      methods: {
        parseFloat(value) {
          return parseFloat(value);
        }
      }
    }
    </script>
