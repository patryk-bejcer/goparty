<template>
  <div>
    <clubs-header />
    <div class="container">
      <div
        id="clubs-list"
        class="mt-4 pt-2"
      >

        <div
          v-if="address"
          class="search-heading"
        >
          <h1 class="text-white mb-4">Kluby w miejscowości {{ address }}</h1>
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
          <h2
            v-if="clubsList.data.length === 0"
            class="text-white text-center"
          >Brak wyników wyszukiwania
          dla miasta {{ address }} <br>
            <router-link
              title="Wszystkie kluby"
              :to="{name: 'clubs'}"
            >
              <a class="all-clubs-link">Wszystkie kluby</a>
            </router-link>
          </h2>
          <div class="card-columns">
            <div v-for="club in clubsList.data">
              <single-club-loop :club="club" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SearchResults',

  props: ['city'],

  data() {
    return {
      // Our data object that holds the Laravel paginator data
      loading: false,
      clubsList: {},
      address: null,
      length: '',
    };
  },

  watch: {
    $route(to, from) {
      this.address = this.$route.params.city;
      this.getSearchResults();
    },
  },

  mounted() {
    this.address = this.$route.params.city;
    this.getSearchResults();
    this.length = '';
  },

  methods: {
    getSearchResults() {
      console.log(this.address);
      this.loading = true;
      axios.get(`api/clubs-search?city=${this.address}`)
        .then((response) => {
          this.clubsList = response.data;
          this.loading = false;
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
    reset() {
      this.address = '';
      this.getResults();
    },
  },
};
</script>

<style>
    .all-clubs-link {
        margin-top: 10px;
        font-size: 20px;
    }
</style>
