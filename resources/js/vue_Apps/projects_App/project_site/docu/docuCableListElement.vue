<template>
<div class="d-flex flex-column align-items-center">
    <div class="card col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0">
        <div class="card-header"><h5 class="h5 mb-0">{{CableListElement.Device}}: {{CableListElement.DeviceNumber}}</h5></div>
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
</div>
</template>

<script>
export default {
    name: 'cableListElement',
    props: [
        'CableListElement'
    ]
}
</script>