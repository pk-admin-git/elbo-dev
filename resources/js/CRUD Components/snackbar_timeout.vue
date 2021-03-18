<template>
        <v-snackbar :value="errorExists"
                    :color="snackbarObjectColor"
                    transition="slide-x-reverse-transition"
                    app
                    elevation="24"
                    right
                    rounded="pill"
                    top> 
            <v-icon  class="mr-2">mdi-{{snackbarObjectIcon}}</v-icon>
                    {{snackbarObjectText}}
        </v-snackbar>
</template>

<script>
export default {
    name: 'snackbarTimeout',
    props: [
        
    ],
    data() {
        return {
        }
    },
   
    computed: {
        errorExists: function() {
            return this.$store.getters.errorExists
        },
        snackbarObjectColor() {
            let value = this.$store.getters.getSnackbarObject;
            if (value != undefined && value != null) {
                return this.$store.getters.getSnackbarObject.color
            } else {
                return "";
            }
        },
        snackbarObjectText() {
            let value = this.$store.getters.getSnackbarObject;
            if (value != undefined && value != null) {
                return this.$store.getters.getSnackbarObject.text
            } else {
                return "";
            }
        },
        snackbarObjectIcon() {
            let value = this.$store.getters.getSnackbarObject;
            if (value != undefined && value != null) {
                return this.$store.getters.getSnackbarObject.icon
            } else {
                return "";
            }
        }
    },
    methods: {
        
    }
}
</script>