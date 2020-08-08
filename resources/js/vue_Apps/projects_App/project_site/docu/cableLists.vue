<template>
     <div class="card-body row align-items-start mt-3">
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
                        @click="showNewCableList"></span>
            </div>
            <div class="col-12 p-0 row">
                    <input type="text" class="form-control col-12 col-lg-3 mr-1" v-model="cableList"/>
                    <select id="inputObject" class="custom-select col-12 col-lg-3 mr-1" v-model.lazy="activeObject">
                        <option v-for="docuObject in docuObjects"
                                :key="docuObject.id"
                                :value="docuObject.id">{{docuObject.Object}}</option>
                    </select>
                    <select id="inputFloor" class="custom-select col-12 col-lg-3 mr-1" v-model.lazy="activeFloor">
                        <option v-for="docuFloor in docuFloors(activeObject)"
                                :key="docuFloor.id"
                                :value="docuFloor.id">{{docuFloor.Floor}}</option>
                    </select>   
            </div>

            <div class="list-group list-group-action col-12 my-3 mb-5 p-0">
                <button v-for="cableList in cableLists"
                    :key="cableList.id"
                    :cableList="cableList"
                    class="list-group-item list-group-item-action p-0"
                    :class="getColor(cableList.CategoryId)"
                    type="button">
                    <div class="row">    
                        <div class="col-12 font-weight-bold p-2 border-md-right border-dark">{{cableList.name}}</div>
                        <div class="col-4 border-right border-dark p-2"> {{getCategory(cableList.CategoryId)}}</div>
                        <div class="col-4 border-right border-dark p-2">{{getObject(cableList.ObjectId)}}</div>
                        <div class="col-4 p-2">{{getFloor(cableList.FloorId)}}</div>
                    </div>
                </button>
                
            </div>
            
        </div>
</template>

<script>
export default {
    name: 'cableLists',
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
        
        activeObject: {
            get() {return this.$store.getters.ActiveObject},
            set(value) {this.$store.dispatch('setActiveObject', value)}
        },
        activeFloor: {
            get() {return this.$store.getters.ActiveFloor},
            set(value) {this.$store.dispatch('setActiveFloor', value)}   
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
        
        
        
    }
}
</script>