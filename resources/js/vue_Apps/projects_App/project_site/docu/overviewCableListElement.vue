<template>
     <div class="card-body align-items-start mt-3">
         <div class="row">
            <h3 class="h3 col-10 mb-4 pl-0">Kabelzuglisten</h3>
            <span   style="cursor:pointer"
                    class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end"
                    @click="showNewCableList"
                    v-if="!newCableListShow"></span>

            <div class="col-2 d-flex justify-content-end mt-2" v-if="newCableListShow">
                <span   style="cursor:pointer"
                        class="fas fa-times-circle fa-lg mr-3"
                        @click="showNewCableList"></span>
                <span   style="cursor:pointer"
                        class="fas fa-check-circle fa-lg"
                        @click="addNewCableList"></span>
            </div>
        </div>
        <div class="row mb-5" v-if="newCableListShow">
            <div class="col-lg-3 col-12">
                <label for="inputTitle">Titel</label>
                <input id="inputTitle" type="text" class="form-control" v-model="cableList"/>
             </div>
            <div class="col-lg-3 col-12">
                <label for="inputObject">Gebäude</label>
                <select id="inputObject" class="custom-select" v-model.lazy="activeObject">
                    <option v-for="docuObject in docuObjects"
                            :key="docuObject.id"
                            :value="docuObject.id">{{docuObject.Object}}</option>
                </select>
             </div>
            <div class="col-lg-3 col-12">
                <label for="inputFloor">Etage</label>
                <select id="inputFloor" class="custom-select" v-model.lazy="activeFloor">
                    <option v-for="docuFloor in docuFloors(activeObject)"
                            :key="docuFloor.id"
                            :value="docuFloor.id">{{docuFloor.Floor}}</option>
                </select> 
             </div>
            <div class="col-lg-3 col-12">
                <label for="inputCategory">Kategorie</label>
                <select id="inputCategory" class="custom-select" v-model.lazy="activeCategory">
                    <option v-for="docuCategory in docuCategories"
                            :key="docuCategory.id"
                            :value="docuCategory.id">{{docuCategory.Category}}</option>
                </select>
            </div>
        </div>

            <div class="list-group list-group-action col-12 my-3 mb-5 p-0">
                <button v-for="cableList in cableLists"
                    :key="cableList.id"
                    :cableList="cableList"
                    class="list-group-item list-group-item-action p-0 mb-3"
                    :class="getColor(cableList.CategoryId)"
                    @click="setActiveCableList(cableList.id)"
                    type="button">
                    <router-link :to="'/projectApp/project/' + projectId + '/projectDocu/' + cableList.id" 
                        style="text-decoration:none; color:inherit;"
                        class="row">
                        <div class="col-12 font-weight-bold p-2 border-md-right border-dark">{{cableList.name}}</div>
                        <div class="col-4 border-right border-dark p-2"> {{getCategory(cableList.CategoryId)}}</div>
                        <div class="col-4 border-right border-dark p-2">{{getObject(cableList.ObjectId)}}</div>
                        <div class="col-4 p-2">{{getFloor(cableList.FloorId)}}</div>
                    </router-link>
                </button>
                
            </div>
            
        </div>
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
    },
    methods: {
        getColor(categoryId) {
            const category = this.$store.getters.DocuCategories.find(category => category.id === categoryId)
            return 'list-group-item-' + category.color
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
        }
    }
}
</script>