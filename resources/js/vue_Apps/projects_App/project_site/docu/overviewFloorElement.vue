<template>
   <v-col cols=12 md=4>
    <!-- Etagen -->
    <v-card tile elevation="0" class="px-2">
    <v-row>
        <v-col cols="8">
            <v-card-title class="py-0">Etagen</v-card-title>
        </v-col>
        <v-col cols="4" class="d-flex align-end flex-column"
                v-if="(activeObject != '') && (newFloorShow !== true)">
            <v-btn icon 
                    @click="showNewFloorInput">
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-col>
        <v-col cols="4" class="d-flex justify-end"
            v-if="newFloorShow">
            <v-btn icon
                    @click="addNewDocuFloor">
                <v-icon>mdi-check</v-icon>
            </v-btn>
            <v-btn icon 
                    @click="showNewFloorInput">
                <v-icon>mdi-window-close</v-icon>
            </v-btn>
        </v-col>

        <!-- Neue Etage anlegen -->
        <v-col cols="12" v-if="newFloorShow">
        
        <v-form class="px-3">
            <v-text-field
                v-model="floor"
                label="Name der Etage"
                required>
            </v-text-field>
            
        </v-form>
        </v-col>
        
        <!-- Ausgabe Etagen -->
        <v-col cols="12">
        <v-list class="p-0">
        <v-list-item-group color="primary" value="activeFloor">
            <v-list-item v-for="docuFloor in docuFloors(activeObject)"
                        :key="docuFloor.id"
                        :docuFloor="docuFloor"
                        :input-value="activeFloor === docuFloor.id ? true : false"
                        @click="setActiveFloor(docuFloor.id)">
                        {{docuFloor.Floor}}
            </v-list-item>
        </v-list-item-group>   
        </v-list>
        </v-col>
    </v-row>
    </v-card>
</v-col> 
</template>

<script>
export default {
    name: 'overviewFloorElement',
    props: [
        'projectId'
    ],
    components: {

    },
    data() {
        return {
            newFloorShow: false,
            floor: '',
            activeFloorToggle: false,
        }
    },
    created() {
        
    },
    computed: {
        activeObject() {
            return this.$store.getters.ActiveObject
        },
        activeFloor() {
            return this.$store.getters.ActiveFloor
        }

    },
    methods: {
            showNewFloorInput() {
                this.newFloorShow = !this.newFloorShow
            },
            docuFloors(objectId){
                return this.$store.getters.DocuFloorsFiltered(objectId)
            },
            addNewDocuFloor(){
            const NewDocuFloor = {
                Floor: this.floor,
                ProjectId: this.projectId,
                DocuObjectId: this.activeObject,
            }
            this.$store.dispatch('addNewDocuFloor', NewDocuFloor)
            this.newFloorShow = !this.newFloorShow
            this.floor= ''
            },
            setActiveFloor(floorId) {
                
                this.activeFloor === floorId ? this.activeFloorToggle = true : this.activeFloorToggle = false
                if (this.activeFloorToggle === false) {
                    this.$store.dispatch('setActiveFloor', floorId)
                }
                else {
                    this.$store.dispatch('setActiveFloor', '')
                }
            },
    }, 
}
</script>