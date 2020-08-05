<template>
    <div class="card border-0 col-12 col-lg-4 bg-transparent mt-1">
        <div class="card-body p-0 row align-items-start">
            
            <h5 class="h5 col-10 pl-0">Kategorien</h5>
            <span   style="cursor:pointer"
                    class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end" 
                    @click="showNewCategoryInput"
                    v-if="(activeFloor != null) && (newCategoryShow !== true)"></span>
            
            
            <div class="col-12 p-0">
                <div class="row">   
                    <form class="col p-0">
                    <input type="text" class="form-control mr-2" v-if="newCategoryShow" v-model="category"/>
                    </form>
                    <div class="col-auto d-flex justify-content-end pl-0"> 
                        <span   style="cursor:pointer"
                                class="fas fa-check-circle fa-lg m-2"
                                v-if="newCategoryShow"
                                @click="addNewDocuCategory"></span>
                        <span   style="cursor:pointer"
                                class="fas fa-times-circle fa-lg mt-2 ml-2"
                                v-if="newCategoryShow"
                                @click="showNewCategoryInput"></span>
                    </div>
                </div>   
            </div>
            <div class="list-group list-group-action col-12 my-3 mb-5">
                <div v-for="docuCategory in docuCategories"
                    :key="docuCategory.id"
                    :docuCategory="docuCategory" 
                    class="list-group-item list-group-item-action"> {{docuCategory.Category}} </div>   
            </div>
        </div>
    </div>
</template>


<script>
    
    export default {
        name: 'docuCategoryElement',
        components: {
            
        },
        props: [
            'projectId'
        ],
        data() {
            return {
                newCategoryShow: false,
                category: '',
            }
        },
        computed: {
            docuCategories() {
                return this.$store.getters.docuCategories;
            },
            docuFloors() {
                return this.$store.getters.DocuFloors;
            },
            activeObject() {
                return this.$store.getters.ActiveObject
            },
            activeFloor() {
                return this.$store.getters.ActiveFloor
            }
        },
        methods: {
            showNewCategoryInput() {
                this.newCategoryShow = !this.newCategoryShow
            },
            addNewDocuCategory(){
            const NewDocuCategory = {
                Category: this.category,
                ProjectId: this.projectId,
                DocuObjectId: this.activeObject,
                DocuFloorId: this.activeFloor
            }
            this.$store.dispatch('addNewDocuCategory', NewDocuCategory)
            this.newCategoryShow = !this.newCategoryShow
            this.category= ''
            }
        }
    }
</script>