<style>

</style>
<template>

  <div class="col-md-6">

    <label
      for="country"
      style=""
      class="mb-2"
    >Pełny adres  * <small>(nazwa ulicy/numer
    lokalu/miasto/kraj)</small> </label>

    <vue-google-autocomplete

      id="address-location"
      ref="address"
      v-model="fulladdress"
      name="address_location"
      classname="form-control"
      placeholder="Proszę wpisać w tym polu swój pełny adres"
      country="pl"
      enable-geolocation="true"
      autofocus
      :value="inputAddress"
      @placechanged="getAddressData"
    />

    <div
      id="map"
      style="height: 300px; width:100%; margin-top:20px;"
    />

    <input
      id="country"
      v-model="address.country"
      type="hidden"
      name="country"
    >
    <input
      id="locality"
      v-model="address.locality"
      type="hidden"
      name="locality"
    >
    <input
      id="voivodeship"
      v-model="address.administrative_area_level_1"
      type="hidden"
      name="voivodeship"
    >
    <input
      id="route"
      v-model="address.route"
      type="hidden"
      name="route"
    >
    <input
      id="street_number"
      v-model="address.street_number"
      type="hidden"
      name="street_number"
    >
    <input
      id="postal_code"
      v-model="address.postal_code"
      type="hidden"
      name="postal_code"
    >
    <input
      id="latitude"
      v-model="address.latitude"
      type="hidden"
      name="latitude"
    >
    <input
      id="longitude"
      v-model="address.longitude"
      type="hidden"
      name="longitude"
    >

  </div>

</template>

<script>
import VueGoogleAutocomplete from 'vue-google-autocomplete';

export default {
  components: { VueGoogleAutocomplete },

  props: ['fulladdress', 'ismap', 'latform', 'lngform'],
  data() {
    return {
      address: '',
      checkAddress: false,
      lat: 52.232855,
      lng: 20.9211115,
      inputAddress: '',
    };
  },

  mounted() {
    // alert(this.ismap);
    this.$refs.address.focus();

    console.log(this.latform);
    console.log(this.lngform);
    console.log(this.fulladdress);

    if (this.latform && this.lngform) {
      this.initMap(15, this.latform, this.lngform);
      this.inputAddress = this.fulladdress;
      console.log(`full:${this.fulladdress}`);
    } else if (this.ismap) {
      this.initMap(15, this.lat, this.lng);
    }

    console.log(this.lat);
    console.log(this.lng);
  },

  methods: {
    /**
             * When the location found
             * @param {Object} addressData Data of the found location
             * @param {Object} placeResultData PlaceResult object
             * @param {String} id Input container ID
             */
    getAddressData(addressData, placeResultData, id) {
      this.address = addressData;
      console.log(this.address);
      // console.log(this.address.latitude);
      // console.log(this.address.longitude);
      if (this.address.latitude && this.address.longitude) {
        this.checkAddress = true;
        this.initMap(15, this.address.latitude, this.address.longitude);
      }
      // console.log('check:' + this.checkAddress);
    },
    initMap(zoom, lat, lng) {
      const map = new google.maps.Map(document.getElementById('map'), {
        zoom,
        center: { lat, lng },
      });
      const marker = new google.maps.Marker({
        position: { lat, lng },
        map,
      });
    },
  },
};
</script>
