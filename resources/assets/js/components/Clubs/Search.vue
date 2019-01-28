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
                      id="map"
                      ref="address"
                      name="city"
                      classname="form-control"
                      placeholder="Miejscowość"
                      types="(cities)"
                      country="pl"
                      :value="surveyData"
                      @no-results-found="runSearch"
                      @keyup.enter="runSearch"
                      @placechanged="getCityData"
                      @click="clearInputText"
                    />
                  </div>

                  <div class="col-md-2 pr-0 pl-0">
                    <input
                      type="submit"
                      class="btn btn-success"
                      value="Szukaj klubów"
                      @click="runSearch"
                    >
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
import VueGoogleAutocomplete from 'vue-google-autocomplete';

export default {
  components: { VueGoogleAutocomplete },

  data() {
    return {
      loading: false,
      address: null,
      surveyData: '',
    };
  },

  mounted() {
    this.surveyData = this.$route.params.city;
    if (this.$route.params.city) { document.getElementById('map').value = this.$route.params.city; }
  },

  methods: {
    getCityData(addressData, placeResultData, id) {
      this.address = addressData.locality;
      window.location.href = `http://localhost:8000/clubs#/clubs/search/${this.address}`;
    },
    runSearch() {
      const inputValue = document.getElementById('map').value;
      if (inputValue === '') {
        window.location.href = `http://localhost:8000/clubs#/clubs/`;
      } else {
        window.location.href = `http://localhost:8000/clubs#/clubs/search/${inputValue}`;
      }
    },
    clearInputText() {
      let inputValue = document.getElementById('map').value;
      inputValue = '';
    },
  },
};
</script>
