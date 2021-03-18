<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app dark>
      <v-list dense>

        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/elboApp/projects/activeProjects">
          <v-list-item-action>
            <v-icon>mdi-email</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Bauprojekte</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/elboApp/users/overview">
          <v-list-item-action>
            <v-icon>mdi-email</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Benutzer</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link @click="logout">
          <v-list-item-action>
            <v-icon>mdi-power</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Logout</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>ELBO</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <router-view name="navTab"></router-view>
      <v-container class="mx-auto px-10">

        <v-row align="start" justify="start">
          <v-col>

            <router-view name="content"></router-view>
            <snackbarTimeout/>

          </v-col>
        </v-row>

      </v-container>
    </v-main>
  </v-app>
</template>

<script>
  import snackbarTimeout from '../CRUD Components/snackbar_timeout.vue'
  export default {
    props: {
      source: String,
    },
    components: {
      snackbarTimeout,
    },
    data: () => ({
      drawer: null,
    }),
    methods: {
      logout() {
        // eslint-disable-next-line no-undef
        axios.post('/logout')
          // eslint-disable-next-line no-unused-vars
          .then( response => {
            window.location.href = "logout"
          })
      }
    }
  }
</script>
