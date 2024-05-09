<template>
    <!-- Alerts -->
    <v-btn position="fixed" size="x-large" location = "top right" class="mx-4 my-4" icon="mdi-bell"></v-btn>

    <!-- Burger Menu -->
    <v-btn position="fixed" size="x-large" location = "bottom right" class="mx-4 my-4" icon="mdi-menu" id="menu-activator"/>

    <!-- Burger Menu Contents -->
    <v-menu activator="#menu-activator">
        <v-btn size="x-large" icon="mdi-truck" class="my-2"/>
        <v-btn size="x-large" icon="mdi-earth" class="my-2"/>
        <v-btn size="x-large" icon="mdi-package" class="my-2"/>
    </v-menu>

    <!-- Home Navigation -->
    <v-btn position="fixed" size="x-large" location = "bottom center" class="mx-auto my-4" icon="mdi-plus" @click="home">
    </v-btn>


</template>


<script setup>
import { useRouter, useRoute } from 'vue-router'
const router = useRouter()
const route = useRoute()

//Declaration of v-btn to move pages
function home() {
  router.push({
    name: 'LandingPage',
  })
}

</script>
