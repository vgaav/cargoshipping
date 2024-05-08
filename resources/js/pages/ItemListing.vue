<template>
    <v-main>
        <v-container>
            <v-card class="mx-auto px-6 py-8">
                <v-card-title> Item Listing </v-card-title>
                <v-row>
                    <v-col cols="12">
                        <v-text-field label="Type of Product"></v-text-field>
                        <v-text-field label="Weight"></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="8">
                        <v-text-field label="Time"></v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-select :items="['AM','PM']"></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-btn block id="selectdate"> 
                            Select Date
                        </v-btn>
                        <v-dialog activator="#selectdate">
                            <v-date-selector> </v-date-selector>
                        </v-dialog>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        Select preferred vehicle

                        <v-select :items="['Motorcycle', 'Van', 'Truck']"></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        Bid Express on:

                        <v-btn block>
                            Select Date
                        </v-btn>
                    </v-col>
                </v-row>
            </v-card>
        </v-container>
    </v-main>
</template>