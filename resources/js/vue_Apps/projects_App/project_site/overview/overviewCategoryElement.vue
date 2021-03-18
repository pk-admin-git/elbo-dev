<template>
<v-col cols="12" md="4">
    <!-- Kategorien -->
    <v-card tile elevation="0" class="px-2">
    <v-row>
        <v-col cols="8">
            <v-card-title class="py-0">Kategorien</v-card-title>
        </v-col>
        <v-col cols="4" class="d-flex align-end flex-column"
                v-if="!newCategoryShow">
            <v-btn icon 
                    @click="showNewCategoryInput">
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-col>
        <v-col cols="4" class="d-flex justify-end"
            v-if="newCategoryShow">
            <v-btn icon
                    @click="addNewDocuCategory">
                <v-icon>mdi-check</v-icon>
            </v-btn>
            <v-btn icon 
                    @click="showNewCategoryInput">
                <v-icon>mdi-window-close</v-icon>
            </v-btn>
        </v-col>

        <!-- Neue Kategorie anlegen -->
        <v-col cols="12" v-if="newCategoryShow">
        
        <v-form class="px-3" v-model="valid">
            <v-text-field
                v-model="category"
                label="Name der Kategorie"
                :rules="[v => !!v || 'Eingabe erforderlich']"
                required>
            </v-text-field>
            <v-combobox
                v-model="newCategoryColor"
                required
                :rules="[v => !!v || 'Eingabe erforderlich']"
                label="Farbe"
                :items="colors">
                <template v-slot:item="{item}">
                    <v-sheet
                        rounded
                        elevation="2"
                        class="mx-auto"
                        :color="item.color"
                        height="25"
                        width="100"
                    ></v-sheet>
                </template>
                <template v-slot:selection="{item}">
                    <v-sheet
                            v-if="item === Object(item)"
                            rounded
                            elevation="2"
                            class="mx-auto"
                            :color="`${item.color}`"
                            height="25"
                            width="100"
                    ></v-sheet>
                </template>
            </v-combobox>
        </v-form>
        </v-col>
        
        <!-- Ausgabe Kategorien -->
        <v-col cols="12">
        <v-item-group>
            <v-item v-for="docuCategory in docuCategories"
                    :key="docuCategory.id"
                    :docuCategory="docuCategory">
                <v-btn  tile block elevation="0"
                        @click="setActiveCategory(docuCategory.id)"
                        class="p-1 text-none"
                        height="48"
                        :color="docuCategory.color">
                        {{docuCategory.Category}}
                </v-btn>
            </v-item>
        </v-item-group>
        </v-col>
    </v-row>
    </v-card>
    
</v-col>
</template>


<script>
    
    export default {
        name: 'overviewCategoryElement',
        components: {
            
        },
        props: [
            'projectId'
        ],
        data() {
            return {
                valid: false,
                newCategoryShow: false,
                category: '',
                newCategoryColor: '',
                colors: [
                    {color:'red lighten-4'},
                    {color:'indigo lighten-4'},
                    {color:'teal lighten-4'},
                    {color:'lime lighten-4'},
                    {color:'yellow lighten-4'},
                    {color:'purple lighten-4'}   
                ],
                
            }
        },
        computed: {
            docuCategories() {
                return this.$store.getters.DocuCategories
            },
            activeCategory() {
                return this.$store.getters.ActiveCategory
            },
            categoryColors() {
                return this.colors
            },
            
        },
        methods: {
            showNewCategoryInput() {
                this.newCategoryShow = !this.newCategoryShow
            },
            setActiveColor(color){
                this.newCategoryColor = color
            },
            setActiveCategory(categoryId) {
                
                let payload = this.$store.getters.CategorySelected
                this.activeCategory === categoryId ? payload = true : payload = false
                
                if (payload === false) {
                    this.$store.dispatch('setActiveCategory', categoryId)
                    this.$store.dispatch('setCategorySelected', payload)
                }
                else {
                    this.$store.dispatch('setActiveCategory', '')
                    this.$store.dispatch('setCategorySelected', payload)
                }
            },
            addNewDocuCategory(){
            const NewDocuCategory = {
                Category: this.category,
                color: this.newCategoryColor.color,
                ProjectId: this.projectId,
            }
            if(this.valid){
                this.$store.dispatch('addNewDocuCategory', NewDocuCategory)
                this.newCategoryShow = !this.newCategoryShow
                this.category= ''
                this.newCategoryColor= ''
                }
            },
            bgColorListGroup(color) {
                return 'list-group-item-' + color
            },
            bgColorNewCategory(color) {
                return 'bg-' + color
            },
        }
    }
</script>

<style lang="scss">


    
</style>