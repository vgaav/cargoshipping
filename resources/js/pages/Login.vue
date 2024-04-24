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
                    v-model="emailLogin"
                    label="Username"
                    variant="outlined"
                    placeholder="juandelacruz@email.com"
                    type="email"
                    :rules="emailRule"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="passwordLogin"
                    label="Password"
                    variant="outlined"
                    :append-inner-icon="
                      showPasswordLogin ? 'mdi-eye-off' : 'mdi-eye'
                    "
                    @click:append-inner="togglePasswordVisibility"
                    :type="showPasswordLogin ? 'text' : 'password'"
                    :rules="passwordLoginRule"
                    required
                  ></v-text-field>
                  <v-col cols="12" class="px-0 py-0 text-right forgot-password">
                    <span @click="forgotPassword">Forgot Password?</span>
                  </v-col>
                  <v-card-actions class="mt-1 justify-center">
                    <v-btn type="submit" block color="#4E47C6" variant="tonal"
                      >Login</v-btn
                    >
                  </v-card-actions>
                </v-form>
                <v-alert v-if="loginSuccess" type="success" class="mt-3"
                  >Login Successful!</v-alert
                >
                <v-alert v-if="loginError" type="error" class="mt-3"
                  >Login Failed. Please check your credentials.</v-alert
                >
                <div class="mt-2 divider-container">
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
                <v-form @submit.prevent="signUp">
                  <v-text-field
                    v-model="emailSignUp"
                    label="Email"
                    variant="outlined"
                    placeholder="Enter your email"
                    type="email"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="passwordSignUp"
                    label="Password"
                    variant="outlined"
                    :append-inner-icon="'mdi-eye-off'"
                    @click:append-inner="toggleNewPasswordVisibility"
                    :type="showPasswordSignUp ? 'text' : 'password'"
                    required
                    :rules="PasswordSignUpRule"
                  ></v-text-field>
                  <v-card-actions class="mt-1 justify-center">
                    <v-btn type="submit" block color="#4E47C6" variant="tonal"
                      >Sign Up</v-btn
                    >
                  </v-card-actions>
                  <v-card-actions class="mt-1 justify-center">
                    <div>
                      <span>Already have an account? </span>
                      <span
                        class="text--primary"
                        @click="step--"
                        style="text-decoration: underline; cursor: pointer"
                        >LOG IN</span
                      >
                    </div>
                  </v-card-actions>
                </v-form>
              </v-window-item>
            </v-window>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script setup>
import { ref, watch } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const step = ref(1);
const showPasswordLogin = ref(false);
const emailLogin = ref("");
const passwordLogin = ref("");
const loginSuccess = ref(false);
const loginError = ref(false);
const emailSignUp = ref("");
const passwordSignUp = ref("");
const showPasswordSignUp = ref(false);

const forgotPassword = () => {
  console.log("Forgot Password clicked");
};

const togglePasswordVisibility = () => {
  showPasswordLogin.value = !showPasswordLogin.value;
};

const toggleNewPasswordVisibility = () => {
  showPasswordSignUp.value = !showPasswordSignUp.value;
};

const login = () => {
  if (
    emailLogin.value === "user@example.com" &&
    passwordLogin.value === "password"
  ) {
    loginSuccess.value = true;
    loginError.value = false;
    router.push({ name: "MainMenuUser" });
  } else {
    loginSuccess.value = false;
    loginError.value = true;
  }
};

const signUp = () => {
  console.log("Sign Up clicked");
};

const emailRule = [
  (v) => !!v || "Email is required",
  (v) => /.+@.+\..+/.test(v) || "Email must be valid",
];

const passwordLoginRule = [(v) => !!v || "Password is required"];

const PasswordSignUpRule = [
  (v) => !!v || "Password is required",
  (v) => (v && v.length >= 8) || "Password must be at least 8 characters",
  (v) =>
    /[a-z]/.test(v) || "Password must contain at least one lowercase letter",
  (v) =>
    /[A-Z]/.test(v) || "Password must contain at least one uppercase letter",
  (v) => /\d/.test(v) || "Password must contain at least one digit",
  (v) =>
    /[!@#$%^&*()_+[\]{};':"\\|,.<>/?~]/.test(v) ||
    "Password must contain at least one special character",
  (v) =>
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+[\]{};':"\\|,.<>/?~])/.test(
      v
    ) ||
    "Password must contain at least one of each: lowercase letter, uppercase letter, digit, and special character",
];

watch(step, () => {
  emailLogin.value = "";
  passwordLogin.value = "";
  emailSignUp.value = "";
  passwordSignUp.value = "";
  loginSuccess.value = false;
  loginError.value = false;
});
</script>

<style src="/resources/css/styles.css"></style>