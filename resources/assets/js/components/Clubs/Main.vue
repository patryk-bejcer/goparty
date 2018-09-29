<template>
  <div>
    <clubs-header />
    <div class="container">

      <div
        id="clubs-list"
        class="mt-4 pt-2"
      >
        <div class="search-heading">
          <h1 class="text-white mb-4">Lista wszystkich klubów</h1>
        </div>
        <div
          v-show="loading"
          class="data-loading"
        >
          <i
            v-show="loading"
            class="fa fa-spinner fa-spin"
          />
          <p>Trwa ładowanie klubów</p>
        </div>
        <div v-if="!loading">

          <div class="card-columns">
            <div v-for="club in clubsList.data">
              <single-club-loop :club="club" />
            </div>
          </div>

          <pagination
            class="mt-4"
            :data="clubsList"
            @pagination-change-page="getResults"
          >
            <span slot="prev-nav">&lt; Poprzednie</span>
            <span slot="next-nav">Następne &gt;</span>
          </pagination>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import VueGoogleAutocomplete from 'vue-google-autocomplete';

export default {
  components: { VueGoogleAutocomplete },

  props: ['surveyData'],

  data() {
    return {
      // Our data object that holds the Laravel paginator data
      loading: false,
      clubsList: {},
      address: null,
      position: null,
    };
  },

  mounted() {
    this.getResults();
  },
  methods: {

    getResults(page = 1) {
      const self = this;

      const lat = 50;
      const long = 50;

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
          self.position = position.coords;
          const lat = self.position.latitude;
          const long = self.position.longitude;
        });
      }

      this.loading = true;

      // console.log('http://localhost/goparty/public/api/clubs-archived?lat=' + lat + '&long=' + long + '&page=' + page);
      axios.get(`http://localhost/goparty/public/api/clubs-archived?lat=${lat}&long=${long}&page=${page}`)
        .then((response) => {
          this.clubsList = response.data;
          this.loading = false;
        });
      const top = document.getElementById('app');
      window.scrollTo(0, top);
    },
    reset() {
      this.address = '';
      this.getResults();
    },
  },
};
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
