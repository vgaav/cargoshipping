<template>
    <v-main>
        <v-container>
            <v-card class="mx-auto px-6 py-8">
                <v-card-title> Item Listing </v-card-title>
                <v-row>
                    <v-col cols="12">
                        <v-text-field label="Type of Product"></v-text-field>
                        <v-text-field label="Weight"></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="8">
                        <v-text-field label="Time"></v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-select :items="['AM','PM']"></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-btn block id="selectdate"> 
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
                        Select preferred vehicle
                        <v-select :items="['Motorcycle', 'Van', 'Truck']"></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        Bid Expires on:
                        <v-btn block>
                            Select Date
                        </v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-btn color="primary" block>
                            Start Bidding
                        </v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn block>
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