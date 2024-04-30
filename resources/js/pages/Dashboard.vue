<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col>
                    <v-card>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61758.453395284356!2d121.02571396334369!3d14.661426722815879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b9002bc77315%3A0x5bf0e892cd8f34bd!2smobiBREW%20Kopi!5e0!3m2!1sen!2sph!4v1714460392653!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </v-card>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="text-center">
                    <v-card class="mx-auto px-6 py-8">
                        <v-btn block variant="text" prepend-icon="mdi-package" class="mx-auto px-6 py-8">
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

                    <v-card class="mx-auto px-6 py-8">
                        
                        <v-card-title> Available Vehicles </v-card-title>

                        <v-btn variant="text" block class="mx-auto px-6 py-8" prepend-icon="mdi-moped">
                            Motorcycle
                        </v-btn>
                        
                        <v-btn variant="text" block class="mx-auto px-6 py-8" prepend-icon="mdi-van-utility">
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

</script>