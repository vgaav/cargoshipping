<template>
    <div class="landing-page">
      <!-- Navigation Buttons -->
      <div class="nav-buttons">
        <router-link to="/signin">Sign In</router-link>
        <router-link to="/register">Register</router-link>
      </div>

      <!-- About Us Section -->
      <section class="about-us">
        <h1>About Us</h1>
        <p>We are a company dedicated to providing solutions...</p>
      </section>

      <!-- What We Do Section -->
      <section class="what-we-do">
        <h1>What We Do</h1>
        <p>We specialize in...</p>
      </section>
    </div>
  </template>

  <script>
export default {
  name: 'LandingPage'
}
</script>

<style scoped>
/* Add your custom styles here */
.landing-page {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.nav-buttons {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 20px;
}

.nav-buttons > * {
  margin-left: 10px;
}

.about-us, .what-we-do {
  margin-bottom: 40px;
}

.about-us h1, .what-we-do h1 {
  font-size: 24px;
  margin-bottom: 10px;
}
</style>
