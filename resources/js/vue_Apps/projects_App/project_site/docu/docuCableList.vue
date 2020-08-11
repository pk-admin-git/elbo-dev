<template>
    <div>
        <h1 class="h1 my-4">Dokumentation</h1>
        <button class="btn btn-success mb-4">
            <router-link :to="'/projectApp/project/'+ projectId +'/projectDocu/DocuOverview'"
                    style="text-decoration:none; color:inherit;">Zurück zur Übersicht</router-link>
        </button>
        <h3 class="h3">Kabelzugliste</h3>

        <div class="d-flex flex-column align-items-center">    
            
            <div class="card col-12 col-sm-10 col-md-8 col-lg-6 text-white bg-secondary m-3 px-0">
                <div class="card-header"><h5 class="h5 mb-0">Start</h5></div>
                <div class="card-body"></div>
            </div>

            <div class="card col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0">
                <div class="card-header"><h5 class="h5 mb-0">HFM: Meldegruppennummer</h5></div>
                <div class="card-body">
                    <div class="alert alert-secondary row" role="alert">
                        <div class="col-12 d-flex justify-content-between">
                            <span>Raum:</span><span>Nummer</span>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <span>Position:</span><span>Nummer</span>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <span>Menge</span><span>Zahl m</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0 fas fa-plus-circle fa-2x text-center"
                style="cursor:pointer">
                 
            </div>


        </div>


    </div>
</template>

<script>
export default {
    name: 'docuCableList',
    props: [
        'projectId', 'cableListId'
    ]
}
</script>