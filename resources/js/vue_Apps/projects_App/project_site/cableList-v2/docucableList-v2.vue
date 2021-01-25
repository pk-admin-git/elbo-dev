<template>
<v-row>
    <v-col cols="12" sm="12">
        <v-btn class="mx-2" fab dark color="primary">
            <v-icon dark>
                mdi-keyboard-backspace
            </v-icon>
        </v-btn>
    </v-col>
    <v-col cols="12" sm="12">
        <v-card 
                class="mx-auto mt-5"
                max-width="380"
                color="#C8E6C9">

            <v-card-title>
                Start
            </v-card-title>
        </v-card>

        <div class="gradient-line-background"></div>   

        <v-item-group>
            <docuCableListElementV2
                    v-for="CableListElement in CableListElements"
                    :key="CableListElement.id"
                    :CableListElement="CableListElement"
                    :cableListById="cableListById"
                    :cableListId="cableListId"
                    :projectId="projectId"
                    :user="user"
                    :measurments="measurments"
                    :SpecItems="SpecItems"
                    :CurrentMsr="CurrentMsr"/>
            <div class="d-flex justify-center mb-2">
                <v-btn dark fab color="pink"
                    @click="newElementDialog=true">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </div>
        </v-item-group>

       

        <v-card 
                class="mx-auto"
                max-width="380"
                color="#C8E6C9">

            <v-card-title>
                Ende
            </v-card-title>
        </v-card>   
            
        <newCableListElement :cableListId="cableListId"
                            :newElementDialog="newElementDialog"
                            @close-dialog="ElementDialog"/>
        
    </v-col>
</v-row>
    
</template>

<script>
  import docuCableListElementV2 from './docuCableListElement-v2.vue'
  import newCableListElement from './newCableListElement.vue'

  export default {
    
    name: 'docucableList-v2',
    props: [
        'projectId', 'cableListId',
    ],
    components: {
        docuCableListElementV2,
        newCableListElement,
    },
    created() {
            this.$store.dispatch('getCableListElements', [this.projectId, this.cableListId])

            this.$store.dispatch('getMeasurments', this.projectId)

            this.$store.dispatch('getSpecItems', this.projectId)

            this.$store.dispatch('getDocuObjectItems', this.projectId)

            this.$store.dispatch('getDocuFloorItems', this.projectId)

            this.$store.dispatch('getDocuRoomItems', this.projectId)

            this.$store.dispatch('getCableListItems', this.projectId)

            this.$store.dispatch('getDocu', [this.projectId, this.cableListId])
    },
    data() {
        return {
            user : this.$userId,
            newElementDialog: false,
        }
    },
    computed: {
        CableListElements() {
            return this.$store.getters.CableListElements
        },
        cableListById() {
            return this.$store.getters.CableListById(Number(this.cableListId));
        },
        measurments(){
            return this.$store.getters.Measurments
        },
        SpecItems() {
            return this.$store.getters.SpecItems
        },
        CurrentMsr() {
            return this.$store.getters.CurrentMeasurment
        },
    },

    methods: {
        ElementDialog(value) {
            this.newElementDialog = value
        }

    }
  }
</script>