<template>
    <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Neues Projekt</h5>
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <label for="ProjectName">Projekt-Name</label>
                        <input type="text" class="form-control" id="ProjectName" v-model="name">
                </div>
                <div class="form-group">
                        <label for="customer">Kunde</label>
                        <select class="form-control" id="customer">
                        <option>Siemens</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="OrderIdInternal">Auftragsnummer Intern</label>
                        <input type="text" class="form-control" id="OrderIdInternal" v-model="OrderIdInternal">
                </div>
                <div class="form-group">
                        <label for="OrderIdCustomer">Auftragsnummer Kunde</label>
                        <input type="text" class="form-control" id="OrderIdCustomer" v-model="OrderIdCustomer">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#NewProjectForm" 
                @click="addNewProject">Erstellen</button>
            </div>
            </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex';

export default {
    name: 'NewProjectForm',
    data() {
        return {
            
            name: '',
            CustomerId: '1',
            OrderIdInternal: '',
            OrderIdCustomer:''   
        }
    },
    methods: {
        addNewProject(){
            const NewProject = {
                name: this.name,
                CustomerId: this.CustomerId,
                OrderIdInternal: this.OrderIdInternal,
                OrderIdCustomer: this.OrderIdCustomer,
            }
            this.$store.dispatch('addNewProject', NewProject)
            this.$store.dispatch('getProjectItems');
        }
        
        /*...mapActions([
            'addNewProject',
        ]),
        NewProject: function(name, CustomerId, OrderIdInternal, OrderIdCustomer){
            
            this.addNewProject(name, CustomerId, OrderIdInternal, OrderIdCustomer)
        } */
    }

}
</script>