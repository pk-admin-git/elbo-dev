<template>
     <div class="card-body row align-items-start mt-3">
            <h3 class="h3 col-10 mb-4 pl-0">Kabelzuglisten</h3>
            <span   style="cursor:pointer"
                    class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end"></span>

            <div class="list-group list-group-action col-12 my-3 mb-5">
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
            
        }
    },
    computed: {
        cableLists() {
            return this.$store.getters.CableLists
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
        }
    }
}
</script>