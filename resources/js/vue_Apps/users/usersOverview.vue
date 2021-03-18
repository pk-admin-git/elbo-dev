<template>
<v-data-table
    :headers="headers"
    hide-default-header
    hide-default-footer
    :items="users"
    class="elevation-1">

    <template v-slot:top>
      <v-toolbar flat>
        <v-toolbar-title>Benutzer</v-toolbar-title>
        <v-spacer></v-spacer>

        <v-dialog v-model="dialogNewUser"
                max-width="500px">
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on">
                Neuer Benutzer
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">Neuen Benutzer anlegen</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>

                  <v-col cols="12">
                    <v-text-field
                      v-model="userName"
                      label="Benutzername">
                    </v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-text-field
                      v-model="userEmail"
                      label="E-Mail">
                    </v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-text-field
                      v-model="userPassword"
                      label="Passwort">
                    </v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-select
                        v-model="userRole"
                        :items="userRoles"
                        label="Rolle">
                    </v-select>
                  </v-col>

                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                color="blue darken-1"
                text
                @click="dialogNewUser=false">Cancel
              </v-btn>
              <v-btn
                color="blue darken-1"
                text
                @click="dialogNewUser=false">Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>

    <template v-slot:[`item.actions`]="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editUser(item)">
        mdi-pencil
      </v-icon>
      <v-icon
        small
        @click="deleteUser(item)">
        mdi-delete
      </v-icon>
    </template>
  </v-data-table>
</template>

<script>
export default {
    name: 'usersOverview',
    props: [

    ],
    data() {
        return {
            dialogNewUser: false,
            userName: '',
            userEmail: '',
            userPassword: '',
            userRole: '',
            userRoles: [
              'Admin',
              'Bauleiter',
              'Monteur'
            ],
            headers: [
              { text: 'Benutzer', value: 'name' },
              /* { text: 'Rolle', value: 'role' } */
              { text: '', value: 'actions' },
            ],

        }
    },
    created() {
      this.$store.dispatch('getUsers')
    },
    computed: {

      users() {
        return this.$store.getters.Users
      }
    },
    methods: {
        addUser() {

        },
        editUser() {

        },
        delteUser() {

        }
    }

}
</script>