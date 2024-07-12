<template>
    <div class="MyBids-Page pb-16" ref="MyBidsPage">
        <div class="container mx-auto px-3 py-5">
            <h1 class="text-2xl font-bold mb-5">My Bids</h1>
            <transition-group
                name="fade"
                tag="div"
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
            >
                <div
                    v-for="bid in formattedBids"
                    :key="bid.id"
                    class="item-card relative flex flex-col border border-gray-300 rounded-lg overflow-hidden transition-transform duration-200 ease-in-out hover:transform hover:scale-105"
                    @click="showModal(bid)"
                >
                    <div class="p-4">
                        <div class="text-lg font-bold">{{ bid.formattedPickupTime }}</div>
                        <img src="../../assets/package-alt.png" alt="Image" class="w-full h-48 object-cover mt-2">
                    </div>
                    <div class="absolute inset-x-0 bottom-0 bg-gray-800 bg-opacity-75 p-4 text-white flex flex-col space-y-2">
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <div class="text-lg font-bold">₱{{ bid.item.item_quote }}</div>
                                <div class="text-sm">{{ bid.item.item_name }}</div>
                            </div>
                            <div class="flex flex-col items-end">
                                <div class="flex items-center space-x-2">
                                    <div class="flex flex-col items-end">
                                        <span class="text-xs text-gray-300">My Bid</span>
                                        <div class="text-xl font-bold">₱{{ bid.bid_amount }}</div>
                                        <span class="text-xs text-gray-300">Lowest Bid: ₱{{ getLowestBid(bid.item_id) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button @click="openBidModal(bid)" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 w-full rounded-full">
                            BID
                        </button>
                        <button @click="openDeleteModal(bid.id)" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 w-full rounded-full">
                            Remove
                        </button>
                    </div>
                </div>
            </transition-group>
        <navbar_alternate />
        </div>
        <navbar_alternate />
        <!-- Update Bid Modal -->
        <v-dialog v-model="updateBidModalVisible" max-width="400">
            <v-card class="p-4 rounded-lg shadow-lg">
                <v-card-title class="text-xl font-semibold mb-2">Update Bid</v-card-title>
                <v-card-text>
                    <form class="space-y-4">
                        <v-text-field
                            label="Bid Amount"
                            v-model.number="updateBidAmount"
                            :rules="bidRules"
                            type="number"
                            required
                            class="w-full"
                        />
                    </form>
                </v-card-text>
                <v-card-actions class="flex justify-end space-x-2 mt-4">
                    <v-btn class="!bg-green-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-green-700" @click="confirmUpdateBid">
                        Update Bid
                    </v-btn>
                    <v-btn class="!bg-red-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-red-700" @click="cancelUpdateBid">
                        Cancel
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <!-- Delete Confirmation Modal -->
        <v-dialog v-model="deleteModalVisible" max-width="400">
            <v-card class="p-4 rounded-lg shadow-lg">
                <v-card-title class="text-xl font-semibold mb-2">Delete Bid</v-card-title>
                <v-card-text>
                    <p>Are you sure you want to delete this bid?</p>
                </v-card-text>
                <v-card-actions class="flex justify-end space-x-2 mt-4">
                    <v-btn class="!bg-red-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-red-700" @click="confirmDeleteBid">
                        Yes
                    </v-btn>
                    <v-btn class="!bg-gray-500 !text-white py-2 px-4 rounded-lg shadow-md hover:!bg-gray-700" @click="cancelDeleteBid">
                        No
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <!-- Item Shipping/Item Information Modal -->
        <transition name="fade">
            <div v-if="modalVisible" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-75">
                <div class="bg-white p-6 rounded-lg w-full max-w-sm max-h-screen overflow-auto">
                    <div class="bg-orange-400 rounded-t-lg p-3">
                        <div class="text-center text-lg mb-4">Shipping Information</div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2">
                            <label class="font-bold">Order from:</label>
                            <span>{{ selectedItem.client }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <label class="font-bold">Ship Out Date:</label>
                            <span>{{ selectedItem.formattedPickupTime }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <label class="font-bold">Vehicle: </label>
                            <span>{{ selectedItem.vehicle_type }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <label class="font-bold">Destination: </label>
                            <span>{{ selectedItem.destination }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <label class="font-bold">Current Bids:</label>
                            <span>{{ selectedItem.currentBids }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <label class="font-bold">Quote/Pricing:</label>
                            <span>{{ selectedItem.quote }}</span>
                        </div>
                        <button @click="showItemInfo = !showItemInfo" class="w-full mt-4 bg-blue-500 text-white py-2 rounded-lg">
                            Show Item Information
                        </button>
                        <transition name="fade">
                            <div v-if="showItemInfo" class="border border-gray-300 rounded-lg p-4 mt-4 bg-white space-y-2">
                                <div class="flex justify-between border-b pb-2">
                                    <label class="font-bold">Description:</label>
                                    <span>{{ selectedItem.itemName }}</span>
                                </div>
                                <div class="flex justify-between border-b pb-2">
                                    <label class="font-bold">Length:</label>
                                    <span>{{ selectedItem.length }} cm</span>
                                </div>
                                <div class="flex justify-between border-b pb-2">
                                    <label class="font-bold">Width:</label>
                                    <span>{{ selectedItem.width }} cm</span>
                                </div>
                                <div class="flex justify-between border-b pb-2">
                                    <label class="font-bold">Height:</label>
                                    <span>{{ selectedItem.height }} cm</span>
                                </div>
                                <div class="flex justify-between border-b pb-2">
                                    <label class="font-bold">Weight:</label>
                                    <span>{{ selectedItem.weight }} kg</span>
                                </div>
                            </div>
                        </transition>
                        <div class="mt-4 flex justify-center space-x-4">
                            <template v-if="!bidPlaced">
                                <button class="bg-orange-400 text-white py-2 px-4 rounded-lg" @click="cancel">Back</button>
                            </template>
                            <template v-else>
                                <div class="text-center text-lg font-bold text-green-500">Bid has been placed</div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import navbar_alternate from '../components/NavbarAlternate.vue';
import moment from 'moment';

const bids = ref([]);
const lowestBids = ref([]);
const updateBidModalVisible = ref(false);
const updateBidAmount = ref(0);
const selectedBidId = ref(null);
const deleteModalVisible = ref(false);
const bidToDelete = ref(null);

const modalVisible = ref(false);
const showItemInfo = ref(false);
const bidPlaced = ref(false);
const selectedItem = ref({});

const fetchBids = async () => {
    try {
        const response = await axios.get('/my-bids'); // Ensure this matches your Laravel route
        console.log('Fetched bids:', response.data); // Debugging line to check the data fetched
        bids.value = response.data;
    } catch (error) {
        console.error('Error fetching bids:', error);
    }
};

const fetchLowestBids = async () => {
    try {
        const response = await axios.get('/lowest-bids');
        console.log('Fetched lowest bids:', response.data); // Debugging line to check the data fetched
        lowestBids.value = response.data;
    } catch (error) {
        console.error('Error fetching lowest bids:', error);
    }
};

const formattedBids = computed(() => {
    return bids.value.map(bid => ({
        ...bid,
        formattedPickupTime: moment(bid.item.pickup_time).format('MMMM Do YYYY, h:mm:ss a')
    }));
});

const getLowestBid = (itemId) => {
    const lowestBid = lowestBids.value.find(bid => bid.item_id === itemId);
    return lowestBid ? lowestBid.lowest_bid : 'N/A';
};

const openBidModal = (bid) => {
    updateBidModalVisible.value = true;
    updateBidAmount.value = bid.bid_amount;
    selectedBidId.value = bid.id;
};

const confirmUpdateBid = async () => {
    try {
        await axios.put(`/bids/${selectedBidId.value}`, { bid_amount: updateBidAmount.value });
        updateBidModalVisible.value = false;
        fetchBids();
        fetchLowestBids(); // Fetch the lowest bids again after updating
    } catch (error) {
        console.error('Error updating bid:', error);
    }
};

const cancelUpdateBid = () => {
    updateBidModalVisible.value = false;
};

const openDeleteModal = (bidId) => {
    deleteModalVisible.value = true;
    bidToDelete.value = bidId;
};

const confirmDeleteBid = async () => {
    try {
        await axios.delete(`/bids/${bidToDelete.value}`);
        deleteModalVisible.value = false;
        fetchBids();
        fetchLowestBids(); // Fetch the lowest bids again after deleting
    } catch (error) {
        console.error('Error deleting bid:', error);
    }
};

const cancelDeleteBid = () => {
    deleteModalVisible.value = false;
};

const showModal = (bid) => {
    selectedItem.value = {
        client: bid.item.item_client,
        formattedPickupTime: moment(bid.item.pickup_time).format('MMMM Do YYYY, h:mm:ss a'),
        vehicle_type: bid.item.vehicle_type,
        destination: bid.item.item_destination,
        currentBids: bid.item.item_current_bids,
        quote: bid.item.item_quote,
        itemName: bid.item.description,
        length: bid.item.item_length,
        width: bid.item.item_width,
        height: bid.item.item_height,
        weight: bid.item.item_weight
    };
    modalVisible.value = true;
    showItemInfo.value = false;
};

const cancel = () => {
    modalVisible.value = false;
};

const showBidModal = () => {
    bidPlaced.value = true;
};

onMounted(() => {
    fetchBids();
    fetchLowestBids(); // Fetch the lowest bids when the component is mounted
});
</script>

<style scoped>
.MyBids-Page {
    background-color: #EEF4ED;
}

.item-card {
    transition: transform 0.3s ease;
}

.item-card:hover {
    transform: scale(1.05);
}

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>
