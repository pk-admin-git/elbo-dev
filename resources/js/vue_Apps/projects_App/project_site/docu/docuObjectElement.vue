<template>
    <div class="card my-4">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-block text-left" type="button" data-toggle="collapse" :data-target="setElementIndex(docuObject.id)">
                {{docuObject.Object}}
                </button>
            </h2>
        </div>

        <div :id="elementIndex(docuObject.id)" class="collapse" aria-labelledby="headingOne" data-parent="#accordionObject">
            <div class="card-body">
                <div class="row col-12 my-3">
                    <button type="button" class="btn btn-primary" @click="collapseNewObjectForm">Objekt anlegen</button>
                </div>

                <form class="form-inline" v-if="newObjectFormVisible">
                    <input type="text" class="form-control mr-2" id="ObjectName" placeholder="Name" v-model="object">
                    <button type="button" class="btn btn-success mr-2 mt-2 mt-sm-0" @click="addNewDocuObject">Anlegen</button>
                    <button type="button" class="btn btn-secondary mr-2 mt-2 mt-sm-0" 
                    @click="collapseNewObjectForm">Schließen</button>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'docuObjectElement',
        props: [
            'docuObject',
            'id'
        ],
        data() {
            return {
                newObjectFormVisible: false,
                object: '',
            }
        },
        methods: {
            elementIndex: function(index) {
                return "object"+index;
            },
            setElementIndex: function(index) {
                return "#object"+index;
            },
            collapseNewObjectForm: function() {
                this.newObjectFormVisible = !this.newObjectFormVisible;
            },
            addNewDocuObject(){
            const NewDocuObject = {
                Object: this.object,
                ProjectId: this.id
            }
            this.$store.dispatch('addNewDocuObject', NewDocuObject)
            
        } 
        }
    }
</script>