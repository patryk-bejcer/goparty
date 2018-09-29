<style>
    .pac-item > span:last-child {
        display: none;
    }
</style>
<template>
  <div>
    <vue-google-autocomplete
      id="map"
      ref="this.address"
      name="city"
      classname="form-control"
      placeholder="Miejscowość"
      types="(cities)"
      country="pl"
      :value="surveyData"
      @placechanged="getCityData"
    />
  </div>
</template>

<script>
import VueGoogleAutocomplete from 'vue-google-autocomplete';

export default {
  components: { VueGoogleAutocomplete },

  props: ['surveyData'],

  data() {
    return {
      address: '',
    };
  },

  mounted() {
    this.address = this.surveyData;
    // Do something useful with the data in the template
    // console.dir(this.surveyData)

    // To demonstrate functionality of exposed component functions
    // Here we make focus on the user input
    // this.$refs.address.focus();
  },

  methods: {
    /**
             * When the location found
             * @param {Object} addressData Data of the found location
             * @param {Object} placeResultData PlaceResult object
             * @param {String} id Input container ID
             */
    getCityData(addressData, placeResultData, id) {
      this.address = addressData.locality;
      // console.log(this.address);
    },
  },
};
</script>
