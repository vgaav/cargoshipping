<template>
    <div>
        <h1>Items List</h1>
        <ul>
            <li v-for="bid in bids" :key="bid.id">
                <h2>{{ bid.item_id }}</h2>
                <p>{{ bid.bid_amount }}</p>
                <!-- Add more item details as needed -->
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            bids: []
        };
    },
    mounted() {
        this.fetchItems();
    },
    methods: {
      fetchItems() {
        axios.get('/bids')
          .then(response => {
            console.log("Response: " + response)
            this.bids = response.data;

          })
          .catch(error => {
            console.log('There was an error fetching the items:', error.response.data);
          });
      }
    }
};
</script>



