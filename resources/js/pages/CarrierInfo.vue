<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col>
                    <v-card title="Carrier Information" class="mx-auto px-6 py-8" elevation="16">
                        <v-form>
                            <v-text-field variant="underlined" label="Enter Username" :width="300" />
                            <v-text-field variant="underlined" label="Enter Password" :width="300" />
                            <v-text-field variant="underlined" label="Confirm Password" :width="300" />
                            <v-text-field variant="underlined" label="Enter Contact No." :width="300" />
                            <v-text-field variant="underlined" label="Enter Email" :width="300" />
                            <v-text-field variant="underlined" label="Location" :width="300" />
                            <v-select variant="underlined"  label="Province" :items="['NCR', 'Region 1', 'Region 2']" ></v-select>
                            <v-select variant="underlined"  label="Municipality" :items="['NCR', 'Region 1', 'Region 2']" ></v-select>
                            <v-text-field variant="underlined" label="Postal Code" :width="300" />
                        </v-form>
                        <v-card-actions class="justify-end">
                            <v-btn @click="Next" color="#07143F" variant="tonal">
                                Next
                            </v-btn>
                            <v-btn color="#07143F" variant="tonal">
                                Back
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script setup>
import { useRouter, useRoute } from 'vue-router'
const router = useRouter()
const route = useRoute()

//Declaration of Next v-btn to move pages
function Next() {
  router.push({
    name: 'Login',
  })
}
</script>
