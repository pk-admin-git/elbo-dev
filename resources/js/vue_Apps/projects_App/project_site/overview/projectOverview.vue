<template>
    <div>
      <h1 class="h1 my-4">{{ ProjectItem.name }}</h1>

        <div class="row"> 
            <div class="card col-12 col-lg m-2">
                <div class="card-body">
                    <h5 class="card-title">Projektdaten</h5>
                    
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td>Auftragsnummer:</td>
                                <td>{{ProjectItem.OrderIdInternal}}</td>
                            </tr>
                            <tr>
                                <td>Kunde:</td>
                                <td>{{ProjectItem.customer.Name}}</td>
                            </tr>
                            <tr>
                                <td>Auftragsnummer Kunde:</td>
                                <td>{{ProjectItem.OrderIdCustomer}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>

            <div class="card col-12 col-lg m-2">
                <div class="card-body">
                    <h5 class="card-title">Überblick</h5>

                    <h6 class="card-subtitle mt-3 mb-1 text-muted">Baufortschritt</h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <h6 class="card-subtitle mt-3 mb-1 text-muted">Rentabliltät</h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <table class="table table-sm table-borderless mt-3">
                        <tbody>
                            <tr>
                                <td>Summe aller Positionen</td>
                                <td>2400 h</td>
                            </tr>
                            <tr>
                                <td>Summe aller Aufmaße</td>
                                <td>1100 h</td>
                            </tr>
                            <tr>
                                <td>Summe Arbeitsstunden</td>
                                <td>1200 h</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'project',
    props: [
        'projectId',
    ],
    
    created() {
        this.$store.dispatch('getProjectItems');
    },

    computed: {
        ProjectItem() {
            return (this.$store.getters.ProjectItemById(Number(this.projectId)));
        }
    },
    
}
</script>

<style lang="scss" scoped>

</style>