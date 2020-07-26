<template>
    
        
    <div class="row mb-2"> 
        <div class="card col p-0">
            <div class="row">
                <h5 class="card-title col-lg-4 col-6 p-2 m-0">Position: 1.100.001</h5>
                <div class="card col-lg-8 col-6 border-0">
                    <h5 class="mb-2 p-inline pt-2">
                    <span class="mb-2">J-H(ST)H 2x2x0,8</span>
                    <span   class="btn p-0 pl-2"
                            style="line-height: 1.0; border: none;" 
                            type="button" 
                            data-toggle="collapse" 
                            :data-target="setElementIndex(index)"><i class="fas fa-angle-down"></i></span></h5>
                    <div :id="elementIndex(index)" class="collapse">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum</div>
                </div>
            </div>

            <div class="row">                    
                <div class="card col pt-2">
                    <h6 class="mb-2">Menge</h6>
                    <span class="">1000 m</span>
                </div>
                <div class="card col pt-2">
                    <h6 class="mb-2">EP</h6>
                    <span class="">5 min</span>
                </div>
                <div class="card col pt-2">
                    <h6 class="mb-2">GP</h6>
                    <span class="">5000 min</span>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'specificationElement',
        props: [
            'element',
            'index'
        ],
        methods: {
            elementIndex: function(index) {
                return "specification"+index;
            },
            setElementIndex: function(index) {
                return "#specification"+index;
            }
        }
    }
</script>