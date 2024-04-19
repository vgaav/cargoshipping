<template>
  <v-main>
    <v-container class="container-top-margin" fluid>
      <v-row>
        <v-col class="text-center">
          <v-img
            class="mx-auto rounded-circle"
            cover
            src="https://st3.depositphotos.com/5572200/15094/v/450/depositphotos_150942812-stock-illustration-a-man-is-riding-a.jpg"
            style="max-width: 200px"
          ></v-img>
        </v-col>
        <v-col cols="12">
          <v-card class="mx-auto px-6 py-8 custom-rounded-card">
            <v-form>
              <v-text-field
                label="Username"
                variant="outlined"
                placeholder="juandelacruz@gmail.com"
                type="email"
              >
              </v-text-field>
              <v-text-field label="Password" variant="outlined" type="password">
              </v-text-field>
            </v-form>
            <v-checkbox label="Remember Me" ></v-checkbox>
            <v-card-actions class="justify-center">
              <v-btn color="blue"> Signup</v-btn>
              <v-btn color="blue" variant="tonal"> Login</v-btn>
            </v-card-actions>
            <div class="divider-container">
              <v-divider></v-divider>
              <span class="divider-text">OR</span>
              <v-divider></v-divider>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
    <v-checkbox label="Remember Me" ></v-checkbox>
  </v-main>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
    };
  }
};
</script>

<style src="/resources/css/styles.css"></style>
