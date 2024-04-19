<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col class="text-center">
                    <v-img class="mx-auto rounded-circle" cover src="https://st3.depositphotos.com/5572200/15094/v/450/depositphotos_150942812-stock-illustration-a-man-is-riding-a.jpg" style="max-width: 200px;"></v-img>
                </v-col>
                <v-col cols="12">
                    <v-card class="mx-auto px-6 py-8 custom-rounded-card" elevation="16" >
                        <v-form>
                            <v-text-field label="Username" variant="outlined" placeholder="sample@gmail.com" type="email">

                            </v-text-field>
                            <v-text-field label="Password" variant="outlined" type="password">

                            </v-text-field>
                        </v-form>

                        <v-card-actions class="justify-center">
                            <v-btn color="blue"> Signup</v-btn>
                            <v-btn color="blue"> Login</v-btn>
                        </v-card-actions>
                        <v-divider></v-divider>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<style src="/resources/css/styles.css"></style>