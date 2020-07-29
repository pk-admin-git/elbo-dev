<template>
    <div class="card my-4">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-block text-left" type="button" data-toggle="collapse" :data-target="setElementIndex(docuObject.id)">
            {{docuObject.Object}}
            </button>
        </h2>
        </div>

        <div :id="elementIndex(docuObject.id)" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            
        </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'docuCategoryElement',
        props: [
            'docuObject',
        ],
        methods: {
            elementIndex: function(index) {
                return "category"+index;
            },
            setElementIndex: function(index) {
                return "#category"+index;
            }
        }
    }
</script>