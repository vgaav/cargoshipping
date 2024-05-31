<template>
    <v-card
      class="item-card"
      :class="{ hoverable: !isClicked }"
      @click="$emit('click', itemName)"
      :elevation="hoverElevation"
    >
 <v-img :src="itemImage" alt="Item Image" class="item-image"></v-img>
      <v-card-text>
        <div class="item-details">
          <div class="item-name">{{ itemName }}</div>
          <div class="client"><b>Client:</b> {{ client }}</div>
          <div class="weight"><b>Weight:</b> {{ weight }}</div>
          <div class="from-to">
            <b>From:</b> {{ from }}
            <span class="arrow-symbol">➔</span>
            <b>To:</b> {{ to }}
          </div>
          <div class="pickup-time"><b>Pickup Time:</b> {{ pickupTime }}</div>
          <div class="drop-off-time"><b>Drop-off Time:</b> {{ dropOffTime }}</div>
          <div class="quote"><b>Quote: $</b>{{ quote }}</div>
        </div>
      </v-card-text>
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
      },
      hoverElevation: {
        type: [Number, String],
        default: 2
      }
    }
  }
  </script>


<style scoped>
.item-card {
  display: flex;
  flex-direction: column;
  margin: 8px auto;
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #fab440;
  overflow: hidden;
  max-width: 400px; /* Adjust for smaller width on mobile */
  transition: transform 0.2s ease-in-out;
}

.item-image {
  width: 100%;
  height: 200px; /* Adjust height as needed */
  object-fit: cover; /* Ensure the image covers the entire area */
  margin-top:10px;
}

.item-details {
  padding: 10px;
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: flex-start; /* Align items to the left */
}

.item-name {
  font-size: 1.2rem; /* Responsive font size */
  font-weight: bold;
  margin-bottom: 8px;
  text-decoration: underline;
}

.client,
.weight,
.from-to,
.pickup-time,
.drop-off-time,
.quote {
  font-size: 1rem; /* Responsive font size */
  margin-top: 4px;
}

.arrow-symbol {
  margin: 0 4px;
}

.hoverable:hover {
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
}

.item-card:hover {
  transform: scale(1.05);
}

/* Responsive adjustments */
@media (max-width: 600px) {
  .item-card {
    max-width: 90%;
  }
  .item-details {
    padding: 8px;
  }
  .item-name {
    font-size: 1rem;
  }
  .client,
  .weight,
  .from-to,
  .pickup-time,
  .drop-off-time,
  .quote {
    font-size: 0.875rem; /* Smaller font size for smaller screens */
  }
}
</style>
