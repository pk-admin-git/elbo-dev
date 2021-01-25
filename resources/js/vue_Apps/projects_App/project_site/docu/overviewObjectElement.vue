<template>
<v-col cols="12" md="4">
    <!-- Gebäude -->
    <v-card tile elevation="0" class="px-2">
        <v-row>
            <v-col cols="8">
                <v-card-title class="py-0">Gebäude</v-card-title>
            </v-col>
            <v-col cols="4" class="d-flex align-end flex-column"
                    v-if="!newObjectShow">
                <v-btn icon 
                        @click="showNewObjectInput">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </v-col>
            <v-col cols="4" class="d-flex justify-end"
                v-if="newObjectShow">
                <v-btn icon
                        @click="addNewDocuObject">
                    <v-icon>mdi-check</v-icon>
                </v-btn>
                <v-btn icon 
                        @click="showNewObjectInput">
                    <v-icon>mdi-window-close</v-icon>
                </v-btn>
            </v-col>

            <!-- Neues Gebäude anlegen -->
            <v-col cols="12" v-if="newObjectShow">
            
            <v-form class="px-3">
                <v-text-field
                    v-model="object"
                    label="Name des Gebäudes"
                    required>
                </v-text-field>
                
            </v-form>
            </v-col>
            
            <!-- Ausgabe Gebäude -->
            <v-col cols="12">
            <v-list class="p-0">
            <v-list-item-group color="primary">
                <v-list-item v-for="docuObject in docuObjects"
                            :key="docuObject.id"
                            :docuObject="docuObject"
                            :input-value="activeObject === docuObject.id ? true : false"
                            @click="setActiveObject(docuObject.id)">
                            {{docuObject.Object}}
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
        name: 'overviewObjectElement',
        props: [
            'projectId'
        ],
        data() {
            return {
                newObjectShow: false,
                object: '',
                objectActiveToggle: false
            }
        },
        computed: {
            docuObjects() {
                return this.$store.getters.DocuObjects;
            },
            activeObject() {
                return this.$store.getters.ActiveObject
            }
        },
        methods: {
            showNewObjectInput() {
                this.newObjectShow = !this.newObjectShow
            },
            addNewDocuObject(){
            const NewDocuObject = {
                Object: this.object,
                ProjectId: this.projectId
            }
            this.$store.dispatch('addNewDocuObject', NewDocuObject)
            this.newObjectShow = !this.newObjectShow
            this.object= ''
            },
            setActiveObject(objectId) {
            
                
                this.activeObject === objectId ? this.objectActiveToggle = true : this.objectActiveToggle = false
                
                if (this.objectActiveToggle === false){
                    this.$store.dispatch('setActiveObject', objectId)
                    this.$store.dispatch('setActiveFloor', '')
                    
                }
                else {
                    this.$store.dispatch('setActiveObject', '')
                    this.$store.dispatch('setActiveFloor', '')
                }
            },
            
            
        
        }
    }
</script>