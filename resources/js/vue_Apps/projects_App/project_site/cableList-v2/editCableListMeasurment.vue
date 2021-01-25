
<template>
<div class="d-flex align-center">
    <v-btn icon x-small><v-icon  @click.stop="[dialogEditToggel(true), setCurrentData()]" small class="mr-2">
        mdi-pencil
    </v-icon></v-btn>
    <v-btn icon x-small><v-icon  @click.stop="deleteItem(specRoom.id)" small>
        mdi-delete
    </v-icon></v-btn>
<v-dialog v-model="dialogEdit" persistent max-width="600px">
    <v-card>
        <v-card-title class="d-flex justify-space-between">
        <span class="headline">Position aufmessen</span>
        <v-chip color="green" text-color="white">
            Aufmaß
            <v-avatar v-if="CurrentMsr"
                right
                class="green darken-4">
                {{CurrentMsr.Number}}
            </v-avatar>
        </v-chip>
        </v-card-title>
        <v-card-text>
            <v-container>
                <v-row>
                    <v-col cols="5">
                        <v-select
                            :items="docuObjects"
                            v-model="object"
                            :item-value="'id'"
                            :item-text="'Object'"
                            return-object
                            label="Gebäude"
                            :disabled="ObjectFloorLocked"
                            required>
                        </v-select>
                    </v-col>
                    <v-col cols="5">
                        <v-select v-if="cableListById"
                            :items="docuFloors"
                            v-model="floor"
                            :item-value="'id'"
                            :item-text="'Floor'"
                            return-object
                            label="Etage"
                            :disabled="ObjectFloorLocked"
                            required>
                        </v-select>
                    </v-col>
                    <v-col cols="2" class="d-flex justify-center align-center">
                        <v-btn icon @click="unlockObjectFloor" v-if="ObjectFloorLocked">
                            <v-icon >mdi-lock</v-icon>
                        </v-btn>
                        <v-btn icon @click="unlockObjectFloor" v-if="!ObjectFloorLocked">
                            <v-icon>mdi-lock-open</v-icon>
                        </v-btn>
                    </v-col>
                    <v-col cols="12">
                        <v-autocomplete
                        :items="SpecItems"
                        v-model="specItem"
                        :item-value="'id'"
                        :item-text="'ShortText'"
                        return-object
                        label="Position"
                        required>
                        <template v-slot:item="data">
                            <v-row>
                                <v-col cols="4">
                                    {{data.item.PositionText}}
                                </v-col>
                                <v-col cols="8">
                                    {{data.item.ShortText}}
                                </v-col>
                            </v-row>
                        </template>
                        </v-autocomplete>
                    </v-col>
                    <v-col cols=4>
                        <v-select v-if="cableListById"
                            :items="docuRooms"
                            v-model="room"
                            :item-text="'Room'"
                            :item-value="'id'"
                            return-object
                            label="Raum"
                            required>
                        </v-select>
                    </v-col>
                    <v-col cols="4">
                        <v-text-field
                            v-model="convertQuantity"
                            label="Menge"
                            required>
                        </v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-checkbox
                            v-model="finished"
                            label="Finale Installation">
                        </v-checkbox>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="dialogEditToggel(false)">Close</v-btn>
            <v-btn color="blue darken-1" text @click="addNewDocumentation">Save</v-btn>
        </v-card-actions>
    </v-card>
 </v-dialog>
</div>
</template>

<script>
export default {
    name: 'editCableListMeasurment',
    props: [
        'cableListById',
        'CableListElement',
        'SpecItems',
        'CurrentMsr',
        'specRoom'
    ],
    data: () => ({
        specItem: '',
        object: '',
        floor: '',
        room: '',
        quantity: null,
        ObjectFloorLocked: true,
        finished: true,
        dialogEdit: false,

    }),
    created() {
    
    },
    computed: {
        convertQuantity: {
            get: function() {
                return this.quantity
            },
            set: function(newValue) {
                this.quantity = (Math.round(parseFloat(newValue.replace(/,/, "." ))*100)) /100
            }
        },
        docuObjects() {
            return this.$store.getters.DocuObjects
        },
        docuFloors(){
            return this.$store.getters.DocuFloorsFiltered(this.object)
        },
        docuRooms(){
            return this.$store.getters.DocuRoomsFiltered(this.floor)
        },

    },
    methods: {
        unlockObjectFloor() {
            this.ObjectFloorLocked = !this.ObjectFloorLocked
        },
        setCurrentData() {
            this.object = this.specRoom.ObjectId
            this.floor = this.specRoom.FloorId
            this.room = this.specRoom.RoomId
            this.specItem = this.specRoom.SpecificationId
            this.quantity = this.specRoom.Amount
        },
        addNewDocumentation() {
            const newDocu= {
                ProjectId : Number(this.projectId),
                EmployeeId : Number(this.user),
                MeasurmentId : this.CurrentMsr.id,
                MeasurmentNumber : this.CurrentMsr.Number,
                SpecificationId : this.specItem.id,
                CategoryId : this.cableListById.CategoryId,
                ObjectId : this.object.id,
                ObjectText : this.object.Object,
                FloorId : this.floor.id,
                FloorText : this.floor.Floor,
                RoomId : this.room.id,
                RoomText : this.room.Room,
                CableListId : Number(this.cableListId),
                CableListElementId : Number(this.CableListElement.id),
                Amount : this.quantity,
                Finished : this.finished
                }
            console.log(newDocu)
            this.$store.dispatch('addNewDocu', newDocu)
            this.dialog = false
        },
        dialogEditToggel(value) {
            this.dialogEdit = value
        }
    }   
}
</script>