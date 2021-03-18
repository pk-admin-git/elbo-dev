<template>
<v-dialog :value="newElementDialog" persistent max-width="600px">
    <v-card>
        <v-card-title>
            <span class="headline">Neues Element</span>
        </v-card-title>
        <v-card-text>
            <v-container>
                <v-form v-model="valid" ref="form">
                <v-row>
                    <v-col cols="12" sm="6" >
                        <v-text-field label="Element" 
                                    required
                                    :rules="[v => !!v || 'Eingabe erforderlich']" 
                                    v-model="device"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <v-text-field label="Bezeichnung/Nummer"
                                    required
                                    :rules="[v => !!v || 'Eingabe erforderlich']" 
                                    v-model="deviceNumber"></v-text-field>
                    </v-col>
                </v-row>
                </v-form>
            </v-container>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="closeDialog(false)">Schließen</v-btn>
            <v-btn color="blue darken-1" text @click="addNewCableListElement">Anlegen</v-btn>
        </v-card-actions>
    </v-card>
</v-dialog>    
</template>


<script>
export default {
    name: 'newCablelistElment',
    props: [
        'cableListId',
        'newElementDialog'
    ],
    data: () => ({
        valid: false,
        device: '',
        deviceNumber: '',
        snackbar: false,
        snackbarText: '',
        snackbarColor: '',
    }),
    methods: {
        addNewCableListElement() {
            const NewCableListElement = {
                Device: this.device,
                DeviceNumber: this.deviceNumber,
                CableListId: this.cableListId,
                Position: this.$store.getters.CableListElementsLength + 1
            }
            if(this.valid) {
                this.$store.dispatch('addNewCableListElement', NewCableListElement)
                this.device= ''
                this.deviceNumber= ''
                this.$emit('close-dialog', false)
                this.$refs.form.resetValidation()
            }
        },
        closeDialog(value) {
            this.$emit('close-dialog', value)
        },
    }   
}
</script>