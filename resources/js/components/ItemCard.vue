<template>
    <div
      class="item-card flex flex-col mx-auto my-2 border border-gray-300 rounded-lg bg-orange-400 overflow-hidden transition-transform duration-200 ease-in-out max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg"
      :class="{ 'hover:transform hover:scale-105': !isClicked }"
      @click="$emit('click', itemName)"
    >
    <img src="../../assets/package-alt.png" alt="Image" class="w-50 h-50 object-cover rounded-t-lg mx-auto">
    <div class="item-details p-2 flex flex-col items-start">
        <div class="item-name text-lg sm:text-xl font-bold mb-2 underline">{{ itemName }}</div>
        <div class="client text-base sm:text-lg mt-1"><b>Client:</b> {{ client }}</div>
        <div class="weight text-base sm:text-lg mt-1"><b>Weight:</b> {{ weight }}</div>
        <div class="from-to text-base sm:text-lg mt-1">
          <b>From:</b> {{ from }}
          <span class="arrow-symbol mx-1">➔</span>
          <b>To:</b> {{ to }}
        </div>
        <div class="pickup-time text-base sm:text-lg mt-1"><b>Pickup Time:</b> {{ pickupTime }}</div>
        <div class="drop-off-time text-base sm:text-lg mt-1"><b>Drop-off Time:</b> {{ dropOffTime }}</div>
        <div class="quote text-base sm:text-lg mt-1"><b>Quote: P</b>{{ quote }}</div>
      </div>
    </div>
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
        type: Number,
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
      },
      isClicked: {
        type: Boolean,
        default: false
      }
    }
  }
  </script>
