<template>
    <!-- Top Navigation -->
    <v-btn position="fixed" size="x-large" location = "top right" class="mx-4 my-4" icon="mdi-bell"></v-btn>

    <!-- Bottom Navigation-->
    <v-btn position="fixed" size="x-large" location = "bottom right" class="mx-4 my-4" icon="mdi-menu" id="menu-activator"/>

    <v-menu activator="#menu-activator">

        <!-- ADD COMPONENTS HERE LATERRRR-->
        <v-btn size="x-large" icon="mdi-truck"/>
        <v-btn size="x-large" icon="mdi-package" class="my-2"/>
    </v-menu>

    <!-- Middle Navigation-->
    <v-btn position="fixed" size="x-large" location = "bottom center" class="my-4" icon="mdi-plus">
    </v-btn>


</template>

<script>
export default{
	name: 'App',
	data: () => ({
		drawer: false,
        navigate: false,
	}),
};
</script>