<template>
    <div>
        <h1>Items List</h1>
        <ul>
            <li v-for="item in items" :key="item.id">
                <h2>{{ item.item_name }}</h2>
                <p>{{ item.description }}</p>
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
            items: []
        };
    },
    mounted() {
        this.fetchItems();
    },
    methods: {
      fetchItems() {
        axios.get('web/items')
          .then(response => {
            console.log("Response: " + response)
            this.items = response.data;

          })
          .catch(error => {
            console.log('There was an error fetching the items:', error.response.data);
          });
      }
    }
};
</script>

<style scoped>
/* Add your styles here */
</style>
