<template>
<div class="d-flex flex-column align-items-center">
    <div class="card col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0">
        <div class="card-header"><h5 class="h5 mb-0">{{CableListElement.Device}}: {{CableListElement.DeviceNumber}}</h5></div>
        <div class="card-body">
            
        </div>
    </div>
</div>
</template>

<script>
import cableListElementMeasure from './cableListElementMeasure.vue'

export default {
    name: 'cableListElement',
    props: [
        'CableListElement'
    ],
    components: [
        cableListElementMeasure
    ],

}
</script>