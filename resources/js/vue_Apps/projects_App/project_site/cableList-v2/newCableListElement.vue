<template>
<v-dialog v-model="dialog" persistent max-width="600px">
    <template v-slot:activator="{ on, attrs }">
        <v-btn fixed dark fab bottom right color="pink" v-bind="attrs" v-on="on">
            <v-icon>mdi-plus</v-icon>
        </v-btn>
    </template>
    <v-card>
        <v-card-title>
            <span class="headline">Neues Element</span>
        </v-card-title>
        <v-card-text>
            <v-container>
                <v-row>
                    <v-col cols="12" sm="6" >
                        <v-text-field label="Element" required v-model="device"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <v-text-field label="Bezeichnung/Nummer" v-model="deviceNumber"></v-text-field>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="dialog = false">Schließen</v-btn>
            <v-btn color="blue darken-1" text @click="addNewCableListElement">Anlegen</v-btn>
        </v-card-actions>
    </v-card>
</v-dialog>    
</template>


<script>
export default {
    name: 'newCablelistElment',
    props: [
        'cableListId'
    ],
    data: () => ({
        dialog: false,
        device: '',
        deviceNumber: '',
    }),
    methods: {
        addNewCableListElement() {
            const NewCableListElement = {
                Device: this.device,
                DeviceNumber: this.deviceNumber,
                CableListId: this.cableListId,
                Position: this.$store.getters.CableListElementsLength + 1
            }
            this.$store.dispatch('addNewCableListElement', NewCableListElement)
            this.device= ''
            this.deviceNumber= ''
            this.dialog = false
        },
    }   
}
</script>