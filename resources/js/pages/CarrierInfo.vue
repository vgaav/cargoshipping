<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col>
                    <v-card title="Carrier Information" class="mx-auto px-6 py-8">
                        <v-form>
                            <v-text-field label="Enter Username" :width="300" />
                            <v-text-field label="Enter Password" :width="300" />
                            <v-text-field label="Confirm Password" :width="300" />
                            <v-text-field label="Enter Contact No." :width="300" />
                            <v-text-field label="Enter Email" :width="300" />
                            <v-text-field label="Location" :width="300" />
                            <v-select label="Province" :items="['NCR', 'Region 1', 'Region 2']" ></v-select>
                            <v-select label="Municipality" :items="['NCR', 'Region 1', 'Region 2']" ></v-select>
                            <v-text-field label="Postal Code" :width="300" />
                        </v-form>
                        <v-card-actions class="justify-end">
                            <v-btn @click="Next">
                                Next
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script setup>

function Next (){
    this.$router.push({path: '/Login'})
}
</script>