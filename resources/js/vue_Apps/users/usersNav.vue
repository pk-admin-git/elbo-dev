<template>
    <v-tabs dark show-arrows>
        <v-tabs-slider color="teal lighten-3"></v-tabs-slider>
        <v-tab :to="'/elboApp/users/overview'">
            Benutzer
        </v-tab>
        <v-tab :to="'/elboApp/users/roles'">
            Rollen
        </v-tab>
        <v-tab :to="'/elboApp/users/permissions'">
            Berechtigungen
        </v-tab>
    </v-tabs>
</template>

<script>
export default {
    name: 'usersNav',
    props: [
        
    ],
    
    created() {
        
    },

    computed: {
        
    },
    
}
</script>