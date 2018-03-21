<template>
    <div>
        <div class="form-group row">

            <div class="col-md-12">
                <h2>Infomacje odnośnie lokalizacji</h2>
            </div>

            <div class="col-md-12">

                <label for="country" style="" class="">Wprowadź pełny adres (nazwa ulicy/numer
                    lokalu/miasto/kraj)</label>

                <vue-google-autocomplete
                        :enable-geolocation="true"
                        ref="address"
                        name="address-location"
                        id="address-location"
                        classname="form-control"
                        placeholder="Proszę wpisać w tym polu swój pełny adres"
                        v-on:placechanged="getAddressData"
                        country="pl"
                >
                </vue-google-autocomplete>

            </div>

        </div>

        <input id="country" type="hidden" name="country" v-model="address.country">
        <input id="locality" type="hidden" name="locality" v-model="address.locality">
        <input id="voivodeship" type="hidden" name="voivodeship" v-model="address.administrative_area_level_1">
        <input id="route" type="hidden" name="route" v-model="address.route">
        <input id="postal_code" type="hidden" name="postal_code" v-model="address.postal_code">
        <input id="latitude" type="hidden" name="latitude" v-model="address.latitude">
        <input id="longitude" type="hidden" name="longitude" v-model="address.longitude">

    </div>
</template>

<script>
    import VueGoogleAutocomplete from 'vue-google-autocomplete'

    export default {
        components: {VueGoogleAutocomplete},

        data: function () {
            return {
                address: '',
                checkAddress: false
            }
        },

        mounted() {

            this.$refs.address.focus();
        },

        methods: {
            /**
             * When the location found
             * @param {Object} addressData Data of the found location
             * @param {Object} placeResultData PlaceResult object
             * @param {String} id Input container ID
             */
            getAddressData: function (addressData, placeResultData, id) {
                this.address = addressData;
                // console.log(this.address);
                // console.log(this.address.latitude);
                // console.log(this.address.longitude);
                if (this.address.latitude && this.address.longitude) {
                    this.checkAddress = true;
                }
                // console.log('check:' + this.checkAddress);
            }
        }
    }
</script>
