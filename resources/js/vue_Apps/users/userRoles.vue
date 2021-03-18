<template>
<div>
  <v-card
    class="mx-auto mb-5"
    max-width="760"
    v-for="(role, i) in roles" :key="i">
      
      <v-card-title> {{ role.name}} </v-card-title>
      <v-container class="py-0">
        <v-row align="center"
          justify="start">

          <v-col cols="12">
            <v-chip v-for="permission in role.permissions" :key="permission.id"
              class="ma-2"
              close
              @click:close="removePermission">
                {{ permission.name }}
            </v-chip>

            <v-select   
                       
                        :items="permissions"
                        :item-text="'name'"
                        :item-value="'id'"
                        label="Berechtigung hinzufügen"
                        multiple
                        return-object
                        persistent-hint>
            </v-select>
          </v-col>

        </v-row>
      </v-container>
  </v-card>
</div>
</template>

<script>
export default {
    name: 'userRoles',
    props: [
      

    ],
    data() {
        return {
          
        }
    },
    created() {
        this.$store.dispatch('getRoles')

        this.$store.dispatch('getPermissions')
    },
    computed: {
        roles() { 
          return this.$store.getters.Roles
        },
        permissions() {
          return this.$store.getters.Permissions
        }, 
        rolesToAdd() {
          return this.$store.getters.PermissionsToAdd
        }
    },
    methods: {
      removePermission() {

      }
       
    }

}
</script>