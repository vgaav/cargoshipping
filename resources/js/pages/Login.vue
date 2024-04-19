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
          <v-card class="mx-auto px-6 py-8 custom-rounded-card">
            <v-window v-model="step">
              <v-window-item :value="1">
                Welcome Back
                <v-form>
                  <v-text-field
                    label="Username"
                    variant="outlined"
                    placeholder="juandelacruz@gmail.com"
                    type="email"
                  ></v-text-field>
                  <v-text-field
                    label="Password"
                    variant="outlined"
                    :append-inner-icon="
                      showPassword ? 'mdi-eye-off' : 'mdi-eye'
                    "
                    @click:append-inner="togglePasswordVisibility"
                    :type="showPassword ? 'text' : 'password'"
                    hint="At least 8 characters"
                  ></v-text-field>
                  <v-row>
                    <v-col cols="6" class="mx-auto small-text">
                      <v-checkbox label="Remember Me"></v-checkbox>
                    </v-col>
                    <v-col cols="6" class="mx-auto px-7 py-8 forgot-password">
                      <span @click="forgotPassword">Forgot Password?</span>
                    </v-col>
                  </v-row>
                </v-form>
                <v-card-actions class="mt-1 justify-center">
                  <div class="text-center">
                    <v-btn tile outlined dark @click="step++">SIGN UP</v-btn>
                  </div>
                  <v-btn color="#07143F" variant="tonal">Login</v-btn>
                </v-card-actions>
                <div class="mt-2 divider-container">
                  <v-divider></v-divider>
                  <span class="divider-text">OR</span>
                  <v-divider></v-divider>
                </div>
                <div class="text-center">
                  <v-btn depressed outlined color="#07143F" class="mr-1 ml-1 mt-4">
                    <v-icon >mdi-gmail</v-icon>
                  </v-btn>
                  <v-btn depressed outlined color="#07143F" class="mr-1 ml-1 mt-4">
                    <v-icon >mdi-facebook</v-icon>
                  </v-btn>
                  <v-btn depressed outlined color="#07143F" class="mr-1 ml-1 mt-4">
                    <v-icon >mdi-microsoft</v-icon>
                  </v-btn>
                  <v-btn depressed outlined color="#07143F" class="mr-1 ml-1 mt-4">
                    <v-icon >mdi-email</v-icon>
                  </v-btn>
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
export default {
  name: "Login",
  data() {
    return {
      step: 1, // Initialize step to 1 for the login form view
      showPassword: false, // Initially hide password
    };
  },
  methods: {
    forgotPassword() {
      // Add your logic to handle "Forgot Password" functionality
      console.log("Forgot Password clicked");
    },
    togglePasswordVisibility() {
      this.showPassword = !this.showPassword;
    },
  },
};
</script>

<style src="/resources/css/styles.css"></style>
