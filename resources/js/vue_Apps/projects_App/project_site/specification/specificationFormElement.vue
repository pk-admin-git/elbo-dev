<template>
<div class="row">
    <div class="row col-12 p-0 my-4"> 
        <h4 class="card-title col-lg-4 col-md-5 col-sm-8 col-10 px-0 m-0 d-flex align-items-center">Neue Position Einfügen</h4>
        <span   style="cursor:pointer"
                class="fas fa-plus-circle fa-lg col-lg-8 col-md-7 col-sm-4 col-2 p-3 d-flex justify-content-end align-items-center"
                @click="showNewPositionForm"
                v-if="!newPositionForm"></span>
    </div>

    <div class="card col-12 p-3 mb-5" v-if="newPositionForm">
        <div class="row">
        
            <div class="col-sm-6 col-12">    
                <h6 class="card-title p-2 m-0">Position: </h6>
                <div class="pb-3">
                    <input type="text" class="form-control" v-model="specFormPosition">  
                </div>

                <h6 class="card-title p-2 m-0">Kurztext: </h6>
                <div class="pb-3">
                    <input type="text" class="form-control" v-model="specFormShortText"> 
                </div>

                <h6 class="card-title p-2 m-0">Langtext: </h6>
                <div class="pb-3">
                    <input type="text" class="form-control" v-model="specFormLongText">   
                </div>
            </div>
        
            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-6 p-0">                    
                        <h6 class="card-title p-2 m-0">Menge</h6>
                        <div class="pb-3 pr-3">
                            <input type="text" class="form-control" v-model="convertSpecFormQuantity">   
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <h6 class="card-title p-2 m-0">Einheit</h6>
                        <div class="pb-3 ">
                            <input type="text" class="form-control" v-model="specFormUnit">   
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-6 p-0">                    
                        <h6 class="card-title p-2 m-0">EP</h6>
                        <div class="pb-3 pr-3">
                            <input type="text" class="form-control" v-model="convertSpecFormUnitPrice">   
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <h6 class="card-title p-2 m-0">Stundensatz</h6>
                        <div class="pb-3 ">
                            <input type="text" class="form-control" v-model="convertSpecFormHourPrice">   
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end mt-5" v-if="newPositionForm">
                    <span   style="cursor:pointer"
                            class="fas fa-times-circle fa-lg mr-3"
                            @click="showNewPositionForm"></span>
                    <span   style="cursor:pointer"
                            class="fas fa-check-circle fa-lg"
                            @click="addNewPosition"></span>
                </div>
            </div>

        </div>    
    </div>
</div>    
</template>

<script>

export default {
    name: 'specificationFormElement',
    props: [
        'SpecItems',
        'projectId'
    ],
    data() {
        return {
            newPositionForm: false,
            specFormPosition:'',
            specFormShortText: '',
            specFormLongText: '',
            specFormQuantity: null,
            specFormUnit: '',
            specFormUnitPrice: null,
            specFormHourPrice: null,
            

        }
    },
    computed: {
        convertSpecFormQuantity: {
            get: function() {
                return this.specFormQuantity
            },
            set: function(newValue) {
                this.specFormQuantity = parseFloat(newValue.replace(/,/, "." ))
            }
        },
        convertSpecFormUnitPrice: {
            get: function() {
                return this.specFormUnitPrice
            },
            set: function(newValue) {
                this.specFormUnitPrice = parseFloat(newValue.replace(/,/, "." ))
            }
        },
        convertSpecFormHourPrice: {
            get: function() {
                return this.specFormHourPrice
            },
            set: function(newValue) {
                this.specFormHourPrice = parseFloat(newValue.replace(/,/, "." ))
            }
        }
        
    },
    methods: {
        showNewPositionForm() {
            this.newPositionForm = !this.newPositionForm
        },
        addNewPosition(){
            const NewPosition = {
                ProjectId: this.projectId,
                PositionText: this.specFormPosition,
                PositionNumber: this.$store.getters.SpecItemsLength + 1,
                ShortText: this.specFormShortText,
                LongText: this.specFormLongText,
                Quantity: this.specFormQuantity,
                Unit: this.specFormUnit,
                UnitPrice: this.specFormUnitPrice,
                TotalPrice: this.specFormQuantity * this.specFormUnitPrice,
                HourPrice: this.specFormHourPrice,
            }
            this.$store.dispatch('addNewSpecItem', NewPosition)
            this.specFormPosition = ''
            this.specFormShortText = ''
            this.specFormLongText = ''
            this.specFormQuantity = null
            this.specFormUnit = ''
            this.specFormUnitPrice = null
            this.specFormHourPrice = null
            },
    },

    

}
</script>