<template>
    <v-bottom-navigation grow bg-color="primary">
        <v-btn>
            <v-icon>mdi-earth</v-icon>
            <span>Map</span>
        </v-btn>
        <v-btn>
            <v-icon>mdi-package</v-icon>
            <span>Package</span>
        </v-btn>
        <v-btn>
            <v-icon>mdi-plus</v-icon>
            <span>Home</span>
        </v-btn>
        <v-btn>
            <v-icon>mdi-truck</v-icon>
            <span>Truck</span>
        </v-btn>
        <v-btn>
            <v-icon>mdi-bell</v-icon>
            <span>Notifs</span>
        </v-btn>
    </v-bottom-navigation>
</template>

<style>
.textwrap .v-btn__content{
    flex-direction: column;
}

</style>