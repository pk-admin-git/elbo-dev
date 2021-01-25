<template>

<!-- Formular Neuer Bereich -->
<v-card elevation="0" tile class="mt-10">
    <v-row>
        <v-col cols="12" class="d-flex">
            <div class="text-h4 mr-5 d-inline-flex align-self-center">Bereiche</div>
            <v-btn icon v-if="!newCableListShow"
                    @click="showNewCableList">
                <v-icon>mdi-plus</v-icon>
            </v-btn>
            <v-btn icon v-if="newCableListShow"
                    @click="addNewCableList">
                <v-icon>mdi-check</v-icon>
            </v-btn>
            <v-btn icon v-if="newCableListShow"
                    @click="showNewCableList">
                <v-icon>mdi-window-close</v-icon>
            </v-btn>
        </v-col>
    </v-row>

    <v-form v-if="newCableListShow">    
        <v-row>
            <v-col cols="12" lg="3">
                <v-text-field
                        v-model="cableList"
                        label="Name des Bereiches"
                        required>
                </v-text-field>
            </v-col>
            <v-col cols="12" lg="3">
                <v-select
                    :items="docuObjects"
                    v-model="activeObject"
                    :item-text="'Object'"
                    :item-value="'id'"
                    label="Auswahl Gebäude"
                ></v-select>
            </v-col>
            <v-col cols="12" lg="3">
                <v-select
                    :items="docuFloors(activeObject)"
                    v-model="activeFloor"
                    :item-text="'Floor'"
                    :item-value="'id'"
                    label="Auswahl Etage"
                ></v-select>
            </v-col>
            <v-col cols="12" lg="3">
                <v-select
                    :items="docuCategories"
                    v-model="activeCategory"
                    :item-text="'Category'"
                    :item-value="'id'"
                    label="Auswahl Kategorie"
                ></v-select>
            </v-col>
        </v-row>
        <v-divider></v-divider>
    </v-form>

<!-- Bereiche -->

    <v-data-iterator
        :items="filteredCableLists"
        :search="search"
        :items-per-page="100"
        hide-default-footer>

        <!-- Auswahl Filter -->
        <template v-slot:header>
        <v-card elevation="0" class="mt-8">
            <v-row>
                <v-col class="py-0" md="4" cols="12">
                    <v-select   v-model="filterCategories"
                                :items="docuCategories"
                                :item-text="'Category'"
                                :item-value="'id'"
                                label="Kategorie"
                                multiple
                                chips
                                deletable-chips
                                persistent-hint>
                        <template v-slot:prepend>    
                            <v-icon>
                                mdi-filter-variant-plus
                            </v-icon>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="py-0" md="4" cols="12">
                    <v-select   v-model="filterObjects"
                                :items="docuObjects"
                                :item-text="'Object'"
                                :item-value="'id'"
                                label="Gebäude"
                                multiple
                                chips
                                deletable-chips
                                persistent-hint>
                        <template v-slot:prepend>    
                            <v-icon>
                                mdi-filter-variant-plus
                            </v-icon>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-card>
        </template>

        <!-- Ausgabe Bereiche  -->
        <template v-slot:default="props">
            <v-row>
            <v-col
                v-for="item in props.items"
                :key="item.id" cols="12" sm="6" md="4" lg="3"
                :cableListId="item.id"
                :cableList="item"
                :projectId="projectId"
                @click="setActiveCableList(item.id)">
                <router-link :to="'/projectApp/project/' + projectId + '/projectDocu/section/' + item.id"
                   replace style="text-decoration:none">
                    <v-card>
                    <v-card-title v-if="filteredCableLists" class="subheading font-weight-bold"
                                :class="getColor(item.CategoryId)">
                        <!-- :class="getColor(cableList.CategoryId)" -->
                        {{getCategory(item.CategoryId)}} - {{ item.name }}
                    </v-card-title>

                    <v-divider class="m-0"></v-divider>

                    <v-list dense>
                        <v-list-item>
                        <v-list-item-content>Objekt:</v-list-item-content>
                        <v-list-item-content class="align-end">
                            {{getObject(item.ObjectId)}}
                        </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                        <v-list-item-content>Etage:</v-list-item-content>
                        <v-list-item-content class="align-end">
                            {{getFloor(item.FloorId)}}
                        </v-list-item-content>
                        </v-list-item>
                    </v-list>
                    </v-card>
                </router-link>
            </v-col>
            </v-row>
        </template>     
    </v-data-iterator>
            
</v-card>
</template>

<script>
export default {
    name: 'overviewCableListElement',
    props: [
        'projectId',
    ],
    data() {
        return {
            newCableListShow: false,
            cableList: '',
            search: '',
            filterCategories: [],
            filterObjects: [],
        }
    },
    computed: {

        cableLists() {
            return this.$store.getters.CableLists
        },
        docuObjects() {
            return this.$store.getters.DocuObjects
        },
        docuCategories() {
            return this.$store.getters.DocuCategories
        },
        
        activeObject: {
            get() {return this.$store.getters.ActiveObject},
            set(value) {this.$store.dispatch('setActiveObject', value)}
        },
        activeFloor: {
            get() {return this.$store.getters.ActiveFloor},
            set(value) {this.$store.dispatch('setActiveFloor', value)}   
        },
        activeCategory: {
            get() {return this.$store.getters.ActiveCategory},
            set(value) {this.$store.dispatch('setActiveCategory', value)}   
        },
        filteredCableLists() {
            let filterCat = this.filterCategories
            let filterObj = this.filterObjects
            const unfilteredList = this.cableLists
            let filteredList = []
            if(filterCat.length < 1 && filterObj.length < 1) {
                return this.cableLists
            }
            if(filterCat.length >= 1 && filterObj.length < 1) {
            filteredList = unfilteredList.filter(item => filterCat.includes(item.CategoryId))
            }
            if(filterCat.length < 1 && filterObj.length >= 1) {
            filteredList = unfilteredList.filter(item => filterObj.includes(item.ObjectId))
            }
            if(filterCat.length >= 1 && filterObj.length >= 1) {
            filteredList = unfilteredList.filter(item => filterCat.includes(item.CategoryId))
                .filter(item => filterObj.includes(item.ObjectId))
            }

            return filteredList
        },
        
    },    
    methods: {
        getColor(categoryId) {
            const category = this.$store.getters.DocuCategories.find(category => category.id === categoryId)
            return category.color
        },
        getCategory(categoryId) {
            const category = this.$store.getters.DocuCategories.find(category => category.id === categoryId)
            return category.Category
        },
        getObject(objectId) {
            const object = this.$store.getters.DocuObjects.find(object => object.id === objectId)
            return object.Object
        },
        getFloor(floorId) {
            const floor = this.$store.getters.DocuFloors.find(floor => floor.id === floorId)
            return floor.Floor
        },
        showNewCableList() {
            this.newCableListShow = !this.newCableListShow
        },
        docuFloors(objectId){
            return this.$store.getters.DocuFloorsFiltered(objectId)
        },
        
        addNewCableList() {
            const NewCableList = {
                name: this.cableList,
                ProjectId: this.projectId,
                CategoryId: this.activeCategory,
                ObjectId: this.activeObject,
                FloorId: this.activeFloor
            }
            this.$store.dispatch('addNewCableList', NewCableList)
            this.newCableListShow = !this.newCableListShow
            this.cableList= ''
            
        },
        setActiveCableList(cableListId) {
            this.$store.dispatch('setActiveCableList', cableListId)
        },
        
    }
}
</script>