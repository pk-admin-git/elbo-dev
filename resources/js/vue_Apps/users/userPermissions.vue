<template>
<div>
<v-row>
  <v-col cols="4">
    <v-text-field v-model="pInput" label="Neue Berechtigung"></v-text-field>
  </v-col>
  <v-col cols="4">
    <v-select v-model="categorySelected"
              :items="pCategories"
              :item-value="'category'"
              :item-text="'category'"
              label="Auswahl Kategorie">
    </v-select>
  </v-col>
  <v-col cols="4" class="d-flex justify-end">
    <v-btn color="primary" @click="createPermission(categorySelected)">
        Hinzufügen
    </v-btn>
  </v-col>

</v-row>
<v-divider></v-divider>
<v-row>
  <v-col cols="4">
    <v-text-field v-model="newCategory" label="Neue Kategorie"></v-text-field>
  </v-col>
  <v-col cols="2">
  <v-checkbox
      v-model="crudSelected"
      label="mit Crud-Berechtigungen"
    ></v-checkbox>
  </v-col>
  <v-col cols="6" class="d-flex justify-end">
    <v-btn color="primary" @click="createCategory(newCategory)">
        Hinzufügen
    </v-btn>
  </v-col>

</v-row>



  <v-card
    class="mx-auto mb-5"
    max-width="760"
    v-for="(pCategory, i) in pCategories" :key="i">
      
      <v-card-title> {{ pCategory.category}} </v-card-title>
      <v-container class="py-0">
        <v-row align="center"
          justify="start">

          <v-col cols="12">
            <v-chip v-for="(permission, i) in pCategory.permissions" :key="i" class="mr-3">
              {{ permission }}
            </v-chip>
          </v-col>

        </v-row>
      </v-container>
  </v-card>
</div>
</template>

<script>
export default {
    name: 'userPermissions',
    props: [

    ],
    data() {
        return {
          pInput: '',
          categorySelected: '',
          newCategory: '',
          crudSelected: true,
          pCategories: [
            {
              category: 'Dokumentation - Übersicht',
              permissions: []
            },
            {
              category: 'Dokumentation - LV',
              permissions: []
            },
            
            
          ],
        }
    },
    created() {
        this.$store.dispatch('getPermissions')
    },
    computed: {
        permissions() {
          return this.$store.getters.Permissions
        }
    },
    methods: {
       createPermission(category) {
        const value = this.pInput
        const cat = this.pCategories.find(cat => cat.category === category)
        const index = this.pCategories.indexOf(cat)

        this.pCategories[index].permissions.push(value)
       },
       createCategory(newCategory) {
         if (this.crudSelected == false) {
            const payload = {
              category : newCategory,
              permissions: []
            }
            this.pCategories.push(payload)
         }
         else {
           const payload = {
              category : newCategory,
              permissions: [
                'create', 'read', 'update', 'delete'
              ]
            }
            this.pCategories.push(payload)
         }
       }
    }

}
</script>