<template>
<div>    
  <v-expansion-panels>
    <v-expansion-panel v-for="specItem in SpecItems"
                        :key="specItem.id">
        <v-expansion-panel-header>
            <v-row no-gutters>
                <v-col cols="4">
                    {{ specItem.PositionText }}
                </v-col>
                <v-col cols="8">
                    {{ specItem.ShortText }}
                </v-col>
            </v-row>
        </v-expansion-panel-header>
        <v-expansion-panel-content>
            <v-row
            justify="space-around"
            no-gutters>
                <v-col cols="12" class="mb-5">
                    {{ specItem.LongText}}
                </v-col>

                <v-col cols="4">
                    Menge:
                </v-col>
                <v-col cols="4">
                    Minuten:
                </v-col>
                <v-col cols="4">
                    Zeit Gesamt:
                </v-col>
                <v-col cols="4">
                    {{ specItem.Quantity }}{{ specItem.Unit }}
                </v-col>
                <v-col cols="4">
                    {{ convertUnitPriceToMinutes(specItem) }} min
                </v-col>
                <v-col cols="4">
                    {{ TotalHours(specItem.Quantity, convertUnitPriceToMinutes(specItem))}} h
                </v-col>

            </v-row>
        </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</div>
</template>


<script>
    export default {
        name: 'specificationElement',
        props: [
            'SpecItems',
        ],
        data: () => ({
            dialogDelete: false,
            
        }),
        methods: {
            
            convertUnitPriceToMinutes(item) {
                let hourPrice = item.HourPrice
                let minutes = 60/((hourPrice/100)/(item.UnitPrice/100))
                return minutes.toFixed(2)
            },
            TotalMinutes(Quantity, Minutes) {
                return Quantity*Minutes
            },
            TotalHours(Quantity, Minutes) {
                return ((Quantity*Minutes)/60).toFixed(2)
            }
        }
    }
</script>