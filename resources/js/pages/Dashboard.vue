<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col>
                    <!-- Map Header -->
                    <LeafletMap/>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="text-center">


                    <!-- Top Menu (Location selection)-->
                    <v-card class="mx-auto px-6 py-8">
    
                        <v-btn  block variant="text" prepend-icon="mdi-package" class="mx-auto px-6 py-8">
                        Pickup Location
                        </v-btn>

                        <v-btn block variant="text" prepend-icon="mdi-truck-delivery-outline" class="mx-auto px-6 py-8">
                        Drop-off Location
                        </v-btn>

                        <v-spacer></v-spacer>

                        <v-btn block variant="flat" class="mx-auto px-6 py-8" color="primary" append-icon="mdi-plus">
                        Add Stop
                        </v-btn>
                    </v-card>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="text-center">

                    <!-- Bottom Menu (Vehicle selection)-->
                    <v-card class="mx-auto px-6 py-8">
                        
                        <v-card-title> Available Vehicles </v-card-title>

                        <v-btn variant="text" block class="mx-auto px-6 py-8" prepend-icon="mdi-moped" @click="o1=!o1">
                            Motorcycle
                        </v-btn>
                        
                        <v-btn variant="text" block class="mx-auto px-6 py-8" prepend-icon="mdi-van-utility" @click="o2=!o2">
                            Van
                        </v-btn>

                        <v-btn variant="text" block class="mx-auto px-6 py-8" prepend-icon="mdi-truck">
                            Truck
                        </v-btn>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
    <NavBar/>
</template>

<script setup>
import NavBar from '../components/NavBar.vue';
import LeafletMap from '../components/LeafletMap.vue';


</script>