<template>
    <NavBar/>
    <v-main>
        <v-container>
            <v-row>
                <v-col class="text-center" cols="12">
                    <v-card color="primary" class="mx-auto px-6 py-4"
                    text="Call niyo si <NavBar/> sa component para makita siya"
                    >
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script setup>
import NavBar from '../components/NavBar.vue';

</script>