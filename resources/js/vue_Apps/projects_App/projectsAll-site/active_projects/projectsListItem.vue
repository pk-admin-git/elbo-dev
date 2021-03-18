<template>
   
    
    <router-link    :to="'/elboApp/project/' + ProjectItem.id + '/projectOverview'"
                    tag="div" 
                    class="col-sm-6 col-md-4 card-project">
        <div class="card">
            <div class="card-header">{{ProjectItem.name}}</div>
            <div class="card-body p-0">
                    
                <div class="list-group">

                    <div class="list-group-item p-2">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Interne Auftragsnummer</h5>
                        </div>
                        <p class="mb-1">{{ProjectItem.OrderIdInternal}}</p>
                    </div>

                    <div class="list-group-item p-2">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Kunde</h5>
                        </div>
                        <p class="mb-1">{{ProjectItem.customer.Name}}</p>
                    </div>
                    
                    <div class="list-group-item p-2">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Auftragsnummer Kunde</h5>
                        </div>
                        <p class="mb-1">{{ProjectItem.OrderIdCustomer}}</p>
                    </div>

                </div>
        
            </div>
        </div>
    </router-link>
</template>

<script>
    export default {
        name: 'projectsListItem',
        props: [
            'ProjectItem',
        ]
    }
</script>

<style lang="scss">

.card-project {
    @import '@/_variables.scss';
    
    margin-top: 20px;
    z-index: 10;
    cursor: pointer;
    
}

</style>
