<template>
  <div>
    <div id="nearest-clubs">
      <div class="row justify-content-center">
        <div class="col-lg-auto mt-4 mb-4">
          <h3 class="text-right first-heading">
            <a
              href="clubs#/clubs"
              title="Zobacz wszystkie kluby"
            >
              KLUBY
            </a>
          </h3>
          <h3 class="text-center second-heading">NAJBLIŻEJ CIEBIE</h3>
        </div>
      </div>
      <!--<div class="row">-->
      <!--<div class="col-12 mt-3 pl-0">-->
      <!--<h3 class="text-left pull-left ml-3">NAJBLIŻSZE KLUBY W TWOJEJ OKOLICY</h3>-->
      <!--<h5 class="pull-right show-more">-->
      <!--<a :href="`${hostname}/clubs#/clubs`" class="text-white">Zobacz wszystkie</a>-->
      <!--</h5>-->
      <!--</div>-->
      <!--</div>-->

      <div
        v-show="loading"
        class="data-loading"
      >
        <i
          v-show="loading"
          class="fa fa-spinner fa-spin"
        />
        <p>Trwa ładowanie najbliższych klubów</p>
      </div>
      <div>
        <div
          v-if="!loading"
          id="clubs-list"
          class="mt-2 mb-2"
        >
          <slick
            ref="slick"
            :options="slickOptions"
          >
            <div v-for="club in clubs.data">
              <single-club-loop
                v-if="permissions"
                :club="club"
                :distance="getDistanceFromLatLonInKm(position.latitude, position.longitude, club.latitude, club.longitude)"
              />
              <single-club-loop
                v-else
                :club="club"
              />
            </div>
          </slick>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Slick from 'vue-slick';
import SingleClubLoop from '../Clubs/SingleClubLoop';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

export default {
  name: 'NearestClubs',

  components: {
    Slick, SingleClubLoop,
  },

  data() {
    return {
      hostname: this.$appUrl,
      loading: false,
      clubs: {},
      position: null,
      slickOptions: {
        permissions: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        dots: true,
        draggable: true,
        edgeFriction: 0.30,
        swipe: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true,
              autoplaySpeed: 3500,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              autoplaySpeed: 3000,
            },
          },
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplaySpeed: 2000,
              dots: false,
            },
          },
        ],
      },
    };
  },
  watch: {
    clubs() {
      if (this.$refs.slick === undefined) return;
      const currIndex = this.$refs.slick.currentSlide();
      this.$refs.slick.destroy();
      this.$nextTick(() => {
        this.$refs.slick.create();
        this.$refs.slick.goTo(currIndex, true);
      });
    },
  },

  mounted() {
    this.getResults();
  },
  created() {
    // console.log(this)
  },
  methods: {
    getResults() {
      if (navigator.geolocation) {
        const self = this;

        navigator.geolocation.getCurrentPosition((position) => {
          self.loading = true;

          self.permissions = true;

          self.position = position.coords;
          const lat = self.position.latitude;
          const long = self.position.longitude;

          axios.get(`${this.$appUrl}/api/nearest-clubs?lat=${lat}&long=${long}`)
            .then((response) => {
              self.clubs = response;
              self.loading = false;
              // console.log(response);
            })
            .catch((error) => {
              console.log(error);
            });
        },
        (error) => {
          if (error.code === error.PERMISSION_DENIED) {
            self.permissions = false;
            self.loading = true;
            axios.get(`${this.$appUrl}/api/nearest-clubs?lat=55&long=55`)
              .then((response) => {
                self.clubs = response;
                self.loading = false;
              })
              .catch((error) => {
                console.log(error);
              });
          }
        });
      }
    },
    getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
      const R = 6371; // Radius of the earth in km
      const dLat = this.deg2rad(lat2 - lat1); // deg2rad below
      const dLon = this.deg2rad(lon2 - lon1);
      const a = Math.sin(dLat / 2) * Math.sin(dLat / 2)
                    + Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2))
                    * Math.sin(dLon / 2) * Math.sin(dLon / 2);
      const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
      const d = R * c; // Distance in km
      return d.toFixed(1);
    },
    deg2rad(deg) {
      return deg * (Math.PI / 180);
    },
  },
};

</script>

<style scoped>


    #clubs-list .card {
        margin: .5em;
        margin-bottom: 1em;
    }

    #clubs-list .card .card-body {
        background: transparent;
        padding-top: .65em;
        padding-bottom: 0;
        height: 120px !important;
    }

    .slick-list {
        padding-bottom: 1em !important;
        margin-bottom: 2em;
    }

    .single-club {
        transition: .3s;
        text-align: center;
    }

    .single-club:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

    #nearest-clubs {
        margin-top: 2em;
    }

    /*#nearest-clubs h3 {*/
    /*font-size: 2rem;*/
    /*}*/

    #nearest-clubs .show-more {
        margin-top: .75em;
    }

    #nearest-clubs .show-more:hover {
        text-decoration: underline;
    }

    #nearest-clubs .single-club {
        background: rgba(0, 0, 0, 0.4);
        padding-bottom: .75em;
    }

    #nearest-clubs .single-club img {
        padding-bottom: .5em;
    }

    #nearest-clubs .single-club:hover {
        transform: scale(1.075);
    }

    #clubs-list .card {
        margin: .5em !important;
    }

    #clubs-list a h4 {
        color: #de29a0;
    }
</style>
