<template>
  <v-main>
    <v-container class="container-top-margin" fluid>
      <v-row>
         <v-col class="text-center">
          <v-img
            class="mx-auto rounded-circle"
            cover
            src="https://st3.depositphotos.com/5572200/15094/v/450/depositphotos_150942812-stock-illustration-a-man-is-riding-a.jpg"
            style="max-width: 125px"
          ></v-img>
        </v-col>
        <v-col cols="12">
          <v-card class="mx-auto px-6 py-4 custom-rounded-card">
            <v-window v-model="step">
              <v-window-item :value="1">
                <v-row>
                  <v-col class="text-center">
                    <div class="welcome-back-text">Welcome Back</div>
                  </v-col>
                </v-row>
                <v-form @submit.prevent="login">
                  <v-text-field
                    v-model="email"
                    label="Username"
                    variant="outlined"
                    placeholder="juandelacruz@email.com"
                    type="email"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="password"
                    label="Password"
                    variant="outlined"
                    :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
                    @click:append-inner="togglePasswordVisibility"
                    :type="showPassword ? 'text' : 'password'"
                    hint="At least 8 characters"
                    required
                    :rules="[passwordRule]"
                  ></v-text-field>
                  <v-col cols="12" class="px-0 py-0 text-right forgot-password">
                    <span @click="forgotPassword">Forgot Password?</span>
                  </v-col>
                  <v-card-actions class="mt-1 justify-center">
                    <v-btn type="submit" block color="#4E47C6" variant="tonal">Login</v-btn>
                  </v-card-actions>
                </v-form> <div class="mt-2 divider-container">
                  <v-divider></v-divider>
                  <span class="divider-text">OR</span>
                  <v-divider></v-divider>
                </div>
                <div class="text-center">
                  <v-btn
                    depressed
                    outlined
                    color="#07143F"
                    class="mr-1 ml-1 mt-4"
                  >
                    <v-icon>mdi-gmail</v-icon>
                  </v-btn>
                  <v-btn
                    depressed
                    outlined
                    color="#07143F"
                    class="mr-1 ml-1 mt-4"
                  >
                    <v-icon>mdi-facebook</v-icon>
                  </v-btn>
                  <v-btn
                    depressed
                    outlined
                    color="#07143F"
                    class="mr-1 ml-1 mt-4"
                  >
                    <v-icon>mdi-microsoft</v-icon>
                  </v-btn>
                  <v-btn
                    depressed
                    outlined
                    color="#07143F"
                    class="mr-1 ml-1 mt-4"
                  >
                    <v-icon>mdi-email</v-icon>
                  </v-btn>
                  <v-card-actions class="mt-1 justify-center">
                    <div>
                      <span>Don't have an account yet? </span>
                      <span
                        class="text--primary"
                        @click="step++"
                        style="text-decoration: underline; cursor: pointer"
                        >SIGN UP</span
                      >
                    </div>
                  </v-card-actions>
                </div>
              </v-window-item>
              <v-window-item :value="2">
                <div class="text-center">
                  <v-btn tile outlined dark @click="step--">Log in</v-btn>
                </div>
              </v-window-item>
            </v-window>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
import { ref } from "vue";

export default {
  name: "Login",
  setup() {
    const step = ref(1);
    const showPassword = ref(false);
    const email = ref('');
    const password = ref('');

    const forgotPassword = () => {
      console.log("Forgot Password clicked");
    }

    const togglePasswordVisibility = () => {
      showPassword.value = !showPassword.value;
    }

    const login = () => {
      // Perform login logic here
    }

    const passwordRule = [
      v => !!v || 'Password is required',
      v => (v && v.length >= 8) || 'Password must be at least 8 characters'
    ];

    return {
      step,
      showPassword,
      forgotPassword,
      togglePasswordVisibility,
      email,
      password,
      login,
      passwordRule
    };
  },
};
</script>

<style src="/resources/css/styles.css"></style>
