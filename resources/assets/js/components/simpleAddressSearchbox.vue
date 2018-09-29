<template>
  <div>
    <div class="form-group row">

      <div class="col-md-12">
        <h2>Infomacje odnośnie lokalizacji</h2>
      </div>

      <div class="col-md-12">

        <label
          for="country"
          style=""
          class=""
        >Pełny adres (nazwa ulicy/numer
        lokalu/miasto/kraj)</label>

        <vue-google-autocomplete

          id="address-location"
          ref="address"
          name="address-location"
          classname="form-control"
          placeholder="Proszę wpisać w tym polu swój pełny adres"
          country="pl"
          enable-geolocation="true"
          @placechanged="getAddressData"
        />

      </div>

    </div>

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

    <div
      id="map"
      style="height: 300px; width:100%;"
    />

  </div>
</template>

<script>
import VueGoogleAutocomplete from 'vue-google-autocomplete';

export default {
  components: { VueGoogleAutocomplete },

  props: ['ismap'],
  data() {
    return {
      address: '',
      checkAddress: false,
      lat: 52.232855,
      lng: 20.9211115,
    };
  },

  mounted() {
    this.$refs.address.focus();
    if (this.ismap) {
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
    getAddressData(addressData, placeResultData, id) {
      this.address = addressData;
      // console.log(this.address);
      // console.log(this.address.latitude);
      // console.log(this.address.longitude);
      if (this.address.latitude && this.address.longitude) {
        this.checkAddress = true;
        this.initMap(16, this.address.latitude, this.address.longitude);
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
