<template>
    
     <v-item v-slot:default="{ active, toggle }">
    <div>
        <v-card class="mx-auto" max-width="380" color="#E1F5FE">
            <v-card-title>
                {{CableListElement.Device}} - {{CableListElement.DeviceNumber}}
                <v-card-actions>
                    <v-btn absolute right icon @click="toggle">
                        <v-icon>{{ active ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card-title>

            <v-expand-transition>
            <div v-show="active">
                <v-divider></v-divider>

                <v-data-iterator
                    :items="items"
                    :items-per-page.sync="itemsPerPage"
                    :page="page"
                    hide-default-footer>

                    <template v-slot:default="props">
                        <v-row class="px-2">
                        <v-col
                            v-for="item in props.items"
                            :key="item.name"
                            cols="12" sm="6">
                            <v-card>
                            <v-card-title class="text-subtitle-1 p-2">{{item.name}}</v-card-title>
                            <v-card-title class="text-subtitle-1 p-2">{{item.text}}</v-card-title>

                            <v-divider class="m-0"></v-divider>

                            <v-list dense>
                                <v-list-item>
                                    <v-list-item-content>Raum 1:</v-list-item-content>
                                    <v-list-item-content class="align-end">Menge</v-list-item-content>
                                </v-list-item>

                                <v-list-item>
                                    <v-list-item-content>Raum 2:</v-list-item-content>
                                    <v-list-item-content class="align-end">Menge</v-list-item-content>
                                </v-list-item>

                                <v-list-item>
                                    <v-list-item-content>Raum 3:</v-list-item-content>
                                    <v-list-item-content class="align-end">Menge</v-list-item-content>
                                </v-list-item>
                            </v-list>
                            </v-card>
                        </v-col>
                        </v-row>
                    </template>

                    <template v-slot:footer>
                        <v-row class="my-2">
                            <v-col cols="4" class="text-left">
                                <newCableListMeasurment/>
                            </v-col>
                            <v-col cols="8" class="text-right">
                                <span class="mr-4 grey--text">
                                    Seite {{ page }} von {{ numberOfPages }}
                                </span>
                                <v-btn
                                    fab
                                    small
                                    dark
                                    color="blue darken-3"
                                    @click="formerPage">
                                    <v-icon>mdi-chevron-left</v-icon>
                                </v-btn>
                                <v-btn
                                    fab
                                    small
                                    dark
                                    color="blue darken-3"
                                    class="mx-3"
                                    @click="nextPage">
                                    <v-icon>mdi-chevron-right</v-icon>
                                </v-btn>
                            </v-col>
                        </v-row>
                    </template>
                </v-data-iterator>
            </div>
            </v-expand-transition>
        </v-card>
        
        <div class="gradient-line-background"></div>
    </div>    
    </v-item>
</template>

<script>
import newCableListMeasurment from './newCableListMeasurment' 

export default {
    name: 'docuCableListelementV2',
    props: [
        'CableListElement',
    ],
    components: {
        newCableListMeasurment
    },
    data() {
        return {
            show: false,
            itemsPerPage: 2,
            clickedElement: '',
            page: 1,
            items: [
                {
                name: '1.1.10.100',
                text: "J-H(ST) 2x2x0,8 Brandmeldekabel"
                },
                {
                name: '1.1.10.200',
                text: "FPKu-Emf M20 halogenfrei"
                },
                {
                name: '1.1.10.300',
                text: "FPKu-Emf M20 halogenfrei"
                },
                {
                name: '1.1.10.400',
                text: "FPKu-Emf M20 halogenfrei"
                },
            ],
        }
    },
    computed: {
        numberOfPages () {
        return Math.ceil(this.items.length / this.itemsPerPage)
        },
    },
    methods: {
        nextPage () {
        if (this.page + 1 <= this.numberOfPages) this.page += 1
        },
        formerPage () {
            if (this.page - 1 >= 1) this.page -= 1
        },
        updateItemsPerPage (number) {
            this.itemsPerPage = number
        },
    
    }
}
</script>