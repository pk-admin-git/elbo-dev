<template>
    <div class="card my-4">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-block text-left" type="button" data-toggle="collapse" :data-target="setElementIndex(index)">
                    {{index}}
                </button>
            </h2>
        </div>

        <div :id="elementIndex(index)" class="collapse"  data-parent="#accordionCategory">
        <div class="card-body">
                <div class="accordion" id="accordionObject">
                    <docuObjectElement v-for="docuObject in docuObjects" 
                                        :key="docuObject.id"
                                        :docuObject="docuObject"/>
                </div>
        </div>
        </div>
    </div>
</template>


<script>
    import docuObjectElement from './docuObjectElement.vue'

    export default {
        name: 'docuCategoryElement',
        components: {
            docuObjectElement,
        },
        props: [
            'docuCategory',
            'index',
            'id'
        ],
        computed: {
            docuObjects() {
                return this.$store.getters.DocuObjects;
            }
        },
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