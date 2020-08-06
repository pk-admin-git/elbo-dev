<template>
    <div class="card border-0 col-12 col-lg-4 bg-transparent mt-1">
        <div class="card-body p-0 row align-items-start">
            
            <h5 class="h5 col-10 pl-0">Kategorien</h5>
            <span   style="cursor:pointer"
                    class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end" 
                    @click="showNewCategoryInput"
                    v-if="!newCategoryShow"></span>

            <div class="col-2 d-flex justify-content-end mb-3" v-if="newCategoryShow">
                <span   style="cursor:pointer"
                        class="fas fa-times-circle fa-lg mt-2 mr-3"
                        @click="showNewCategoryInput"></span>
                <span   style="cursor:pointer"
                        class="fas fa-check-circle fa-lg mt-2"
                        @click="addNewDocuCategory"></span>
            </div>
            
            <div class="col-12 pl-0">   
                <form class="col p-0">
                <input type="text" class="form-control mr-2" v-if="newCategoryShow" v-model="category"/>
                </form> 
            </div>

            <div class="col-12 pl-0 d-flex justify-content-between mt-3 mb-4"
                 v-if="newCategoryShow">
                        <button  v-for="(categoryColor, index) in categoryColors"
                            :key="index"
                            :categoryColor="categoryColor"        
                            class="btn"
                            style="height: 35px; width: 35px"
                            :class="bgColorNewCategory(categoryColor.color)"
                            data-toogle="button"
                            @click="setActiveColor(categoryColor.color)">   
                        </button>
            </div>

            <div class="list-group list-group-action col-12 my-3 mb-5">
                <div v-for="docuCategory in docuCategories"
                    :key="docuCategory.id"
                    :docuCategory="docuCategory" 
                    class="list-group-item list-group-item-action"
                    :class="bgColorListGroup(docuCategory.color)"> {{docuCategory.Category}} </div>   
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
                newCategoryColor: '',
                colors: [
                    {color: 'primary'},
                    {color: 'secondary'},
                    {color: 'success'},
                    {color: 'danger'},
                    {color: 'warning'},
                    {color: 'info'},
                ]    
                
            }
        },
        created: {

        },
        computed: {
            docuCategories() {
                return this.$store.getters.DocuCategories;
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
            addNewDocuCategory(){
            const NewDocuCategory = {
                Category: this.category,
                color: this.newCategoryColor,
                ProjectId: this.projectId,
            }
            this.$store.dispatch('addNewDocuCategory', NewDocuCategory)
            this.newCategoryShow = !this.newCategoryShow
            this.category= ''
            this.newCategoryColor= ''
            },
            bgColorListGroup(color) {
                return 'list-group-item-' + color
            },
            bgColorNewCategory(color) {
                return 'btn-' + color
            }
        }
    }
</script>