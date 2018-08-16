<template>
    <div>
        <div class="search-top-bg">
            <div class="container">
                <div class="row">
                    <div id="events-search-form">
                        <h2 class="mb-2">Znajdź klub dla siebie</h2>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <div class="row p-0 pb-0 search-form-body">
                                    <div class="col-md-10">
                                        <vue-google-autocomplete
                                                ref="address"
                                                name="city"
                                                id="map"
                                                classname="form-control"
                                                placeholder="Miejscowość"
                                                v-on:placechanged="getCityData"
                                                v-on:click="clearInputText"
                                                types="(cities)"
                                                country="pl"
                                                :value=surveyData
                                        >
                                        </vue-google-autocomplete>
                                    </div>


                                    <div class='col-md-2 pr-0 pl-0'>
                                        <input v-on:click="runSearch" type="submit" class="btn btn-success"
                                               value="Szukaj klubów">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueGoogleAutocomplete from 'vue-google-autocomplete'

    export default {
        components: {VueGoogleAutocomplete},

        data() {
            return {
                // Our data object that holds the Laravel paginator data
                loading: false,
                address: null,
                cityInput: '',
                message: '',
                surveyData: '',
            }
        },

        mounted() {
            this.surveyData = this.$route.params.city;
        },


        methods: {
            getCityData: function (addressData, placeResultData, id) {
                this.address = addressData.locality;
                this.$router.push({name: 'search', params: {city: this.address}});
            },

            // TODO Naprawić tą metode żeby szukać po tekscie w inpucie wyszukiwarki (teraz wyrzuca wszystkie kluby jak ktoś kliknie szukaj)
            runSearch() {
                this.$router.push({name: 'search', params: {city: ''}});
                // this.$router.go(url);
            },
            clearInputText() {
                alert('test');
            }
        },
    }
</script>
