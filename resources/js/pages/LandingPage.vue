<template>
  <v-main>
    <v-container>
      <v-row>
        <v-col cols="12">
          <!-- Navigation Buttons -->
          <div class="nav-buttons">
            <router-link to="/Login" class="btn btn-primary"
              >Log In</router-link
            >
            <!--Tinanggal ko yung Register, Maui. Tignan mo na lang yung login page-->
          </div>
          <h1 class="text-center">BidGo</h1>

          <!-- Card with BidGo Title and About Us / What We Do Sections -->
          <v-card class="mx-auto px-6 py-8 custom-rounded-card" elevation="16">
            <!-- About Us Section -->
            <section class="about-us">
              <h2>About Us</h2>
              <p>We are a company dedicated to providing solutions...</p>
            </section>
          </v-card>
          <v-card class="mx-auto px-6 py-8 custom-rounded-card" elevation="16">
            <!-- What We Do Section -->
            <section class="what-we-do">
              <h2>What We Do</h2>
              <p>We specialize in...</p>
            </section>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

  <script>
import { ref } from "vue";

export default ref({
  name: "LandingPage",
});
</script>


<style src="../../css/styles.css" scoped></style>
