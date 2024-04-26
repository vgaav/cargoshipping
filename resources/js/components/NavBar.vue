<template>    
    <!-- Top Navigation -->
    <v-btn position="fixed" size="x-large" location = "top right" class="ma-4" icon="mdi-earth"></v-btn>

    <!-- Bottom Navigation-->
    <v-btn position="fixed" size="x-large" location = "bottom end" class="ma-4" icon="mdi-menu" id="menu-activator"/>
    
    <v-menu activator="#menu-activator">
        <v-list>
            <v-list-item>
                <v-btn append-icon="mdi-truck">
                    Delivery
                </v-btn>
            </v-list-item>
        </v-list>
    </v-menu>

    <v-btn position="fixed" size="x-large" location = "bottom center" class="ma-4" icon="mdi-plus">
    </v-btn>


</template>

<script>
export default{
	name: 'App',
	data: () => ({
		drawer: false,
	}),
};
</script>