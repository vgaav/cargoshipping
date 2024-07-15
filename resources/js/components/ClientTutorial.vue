<template>
    <v-main>
      <v-container>
        <v-window v-model="activeStep" show-arrows>
          <v-window-item v-for="(step, index) in clientSteps" :key="index">
            <div class="tutorial-step">
              <h2>{{ step.title }}</h2>
              <p>{{ step.content }}</p>
            </div>
          </v-window-item>
        </v-window>
      </v-container>
    </v-main>
  </template>

  <script setup>
  import { ref } from 'vue';

  const activeStep = ref(0);
  const clientSteps = [
    { title: 'Step 1', content: 'Client step 1 content' },
    { title: 'Step 2', content: 'Client step 2 content' },
    // Add more steps as needed
  ];
  </script>

  <style scoped>
  .tutorial-step {
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  </style>
