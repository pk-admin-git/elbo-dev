<template>
<v-row>
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
                    :cableListId="cableListId"/>
        </v-item-group>

        <v-card 
                class="mx-auto"
                max-width="380"
                color="#C8E6C9">

            <v-card-title>
                Ende
            </v-card-title>
        </v-card>   
            
        <newCableListElement :cableListId="cableListId"/>
        
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
    },
    computed: {
        CableListElements() {
            return this.$store.getters.CableListElements
        },
    },
  }
</script>