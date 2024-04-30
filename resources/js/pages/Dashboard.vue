<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col>
                    <v-img
                        class="mx-auto rounded-circle"
                        cover
                        src="https://st3.depositphotos.com/5572200/15094/v/450/depositphotos_150942812-stock-illustration-a-man-is-riding-a.jpg"
                        style="max-width: 125px"
                    ></v-img>
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