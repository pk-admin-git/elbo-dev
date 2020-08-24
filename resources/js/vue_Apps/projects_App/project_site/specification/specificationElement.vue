<template>
    

    <div class="row mb-2"> 
        <div class="card col p-0">
            <div class="row">
                <h5 class="card-title col-lg-4 col-6 p-1 border-bottom m-0">Position: {{SpecItem.PositionText}}</h5>
                <div class="col-lg-8 col-6 border-bottom">
                    <h5 class="mb-2 p-inline pt-1">
                    <span class="mb-2">{{SpecItem.ShortText}}</span>
                    <span   class="btn p-0 pl-2"
                            style="line-height: 1.0; border: none;" 
                            type="button" 
                            data-toggle="collapse" 
                            :data-target="setElementIndex(SpecItem.id)"><i class="fas fa-angle-down"></i></span></h5>
                    <div :id="elementIndex(SpecItem.id)" class="collapse">{{SpecItem.LongText}}</div>
                </div>
            </div>

            <div class="row">                    
                <div class="col border-right p-1">
                    <h6 class="mb-2">Menge</h6>
                    <span class="">{{SpecItem.Quantity + ' ' + SpecItem.Unit}}</span>
                </div>
                <div class="col border-right p-1">
                    <h6 class="mb-2">Minuten</h6>
                    <span class="">{{convertUnitPriceToMinutes(SpecItem.UnitPrice)}} min</span>
                </div>
                <div class="col-6 p-1">
                    <h6 class="mb-2">Zeit Gesamt</h6>
                    <div class="flex">
                        <span class="d-inline-flex">{{TotalMinutes(SpecItem.Quantity, convertUnitPriceToMinutes(SpecItem.UnitPrice))}} min | </span>
                        <span class="d-inline-flex">{{TotalHours(SpecItem.Quantity, convertUnitPriceToMinutes(SpecItem.UnitPrice))}} h</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
    export default {
        name: 'specificationElement',
        props: [
            'SpecItem',
        ],
        methods: {
            elementIndex: function(index) {
                return "specification"+index;
            },
            setElementIndex: function(index) {
                return "#specification"+index;
            },
            convertUnitPriceToMinutes(UnitPrice) {
                let hourPrice = this.SpecItem.HourPrice
                let minutes = 60/((hourPrice/100)/(UnitPrice/100))
                return minutes.toFixed(2)
            },
            TotalMinutes(Quantity, Minutes) {
                return Quantity*Minutes
            },
            TotalHours(Quantity, Minutes) {
                return ((Quantity*Minutes)/60).toFixed(2)
            }
        }
    }
</script>