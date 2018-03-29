<style>

</style>
<template>

            <div class="col-md-6">

                <label for="country" style="" class="">Pełny adres  * <small>(nazwa ulicy/numer
                    lokalu/miasto/kraj)</small> </label>

                <vue-google-autocomplete

                        ref="address"
                        name="address_location"
                        id="address-location"
                        classname="form-control"
                        placeholder="Proszę wpisać w tym polu swój pełny adres"
                        v-model="fulladdress"
                        v-on:placechanged="getAddressData"
                        country="pl"
                        enable-geolocation="true"
                        autofocus required
                >
                </vue-google-autocomplete>

                <div style="height: 300px; width:100%; margin-top:20px;" id="map"></div>

                <input id="country" type="hidden" name="country" v-model="address.country">
                <input id="locality" type="hidden" name="locality" v-model="address.locality">
                <input id="voivodeship" type="hidden" name="voivodeship" v-model="address.administrative_area_level_1">
                <input id="route" type="hidden" name="route" v-model="address.route">
                <input id="street_number" type="hidden" name="street_number" v-model="address.street_number">
                <input id="postal_code" type="hidden" name="postal_code" v-model="address.postal_code">
                <input id="latitude" type="hidden" name="latitude" v-model="address.latitude">
                <input id="longitude" type="hidden" name="longitude" v-model="address.longitude">

            </div>

</template>

<script>
    import VueGoogleAutocomplete from 'vue-google-autocomplete'

    export default {
        components: {VueGoogleAutocomplete},

        props: ['ismap', 'latform', 'lngform','fulladdress'],
        data: function () {
            return {
                address: '',
                checkAddress: false,
                lat:52.232855,
                lng:20.9211115
            }
        },

        mounted() {
            // alert(this.ismap);
            this.$refs.address.focus();

            console.log(this.latform);
            console.log(this.lngform);
            console.log(this.fulladdress);

            if(this.latform && this.lngform){
                this.lat = this.latform;
                this.lng = this.lngform;
            }

            console.log(this.lat);
            console.log(this.lng);

            if(this.ismap){
                this.initMap(11, this.lat, this.lng);
            }


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
                console.log(this.address);
                // console.log(this.address.latitude);
                // console.log(this.address.longitude);
                if (this.address.latitude && this.address.longitude) {
                    this.checkAddress = true;
                    this.initMap(16, this.address.latitude, this.address.longitude);
                }
                // console.log('check:' + this.checkAddress);
            },
            initMap: function(zoom, lat, lng) {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: zoom,
                    center: {lat: lat, lng: lng}
                });
                var marker = new google.maps.Marker({
                    position: {lat: lat, lng: lng},
                    map: map
                });
            }
        }
    }
</script>
