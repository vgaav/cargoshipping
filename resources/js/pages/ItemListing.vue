<template>
    <v-main>
        <v-container>
            <v-card class="mx-auto px-6 py-4 custom-rounded-card text-center">
                <v-card-title> Item Listing </v-card-title>
                <v-row>
                    <v-col cols="12">
                        <v-select label="Type of Product" variant="outlined" :items="['Consumer Goods', 'Industrial Materials', 'Perishable Goods',]"></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12">
                        <v-text-field variant="outlined" label="Weight (kg)"></v-text-field> 
                    </v-col>
                </v-row>
                <v-row> <!-- TIME ROW -->
                    <v-col cols="6">
                        <v-select variant="outlined"  label="HRS" :items="['1','2','3','4','5','6','7','8','9','10','11','12']"></v-select>
                    </v-col>
                    <v-col cols="6">
                        <v-select variant="outlined"  label="Unit" :items="['AM','PM']"></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        Select Date:
                        <v-btn block color="#4E47C6" variant="tonal" id="selectdate"> 
                            Select Date
                        </v-btn>
                        <v-dialog activator="#selectdate">
                            <v-date-picker v-model="selectedDate"></v-date-picker>
                        </v-dialog>
                        <v-card-text v-if="selectedDate!=null">  
                            <v-sheet class="mx-auto px-4 py-6" rounded color="primary">
                                Selected Date: {{ selectedDate }}
                            </v-sheet>
                        </v-card-text>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        Select preferred vehicle:
                        <v-select variant="outlined" :items="['Motorcycle', 'Van', 'Truck']"></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        Bid Expires on:
                        <v-btn block color="#4E47C6" variant="tonal">
                            Select Date
                        </v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-btn block color="#4E47C6" variant="tonal">
                            Start Bidding
                        </v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn variant="text" block>
                                Cancel
                            </v-btn>
                    </v-col>
                </v-row>
            </v-card>
        </v-container>
    </v-main>
</template>

<script setup>
import { ref } from 'vue';
    
const selectedDate = ref(null);



</script>