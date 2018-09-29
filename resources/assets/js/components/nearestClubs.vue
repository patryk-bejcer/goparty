<style>
    #nearest-clubs{
        margin-top: 4em;
    }
    #nearest-clubs h3{
        font-size: 2rem;
    }
    #nearest-clubs .show-more{
        margin-top: .75em;
    }
    #nearest-clubs .show-more:hover{
        text-decoration: underline;
    }

    #nearest-clubs .single-club{
        background: rgba(0,0,0,0.4);
        padding-bottom: .75em;
    }

    #nearest-clubs  .single-club img{
        padding-bottom: .5em;
    }

    #nearest-clubs .single-club:hover{
        transform:scale(1.075);
    }
</style>

<template>

  <div id="nearest-clubs">
    <i
      v-show="loading"
      class="fa fa-spinner fa-spin data-loading"
    />
    <div class="col-lg-auto mt-3 pl-0">
      <h3 class="text-left pull-left">NAJBLIŻSZE KLUBY W TWOJEJ OKOLICY</h3>
      <h5 class="pull-right show-more">
        <a
          class="text-white"
          href=""
        >Zobacz wszystkie</a>
      </h5>
    </div>

    <div class="clearfix" />

    <slick ref="carousel">
      <div v-for="club in clubs">
        {{ club.id }}
      </div>
    </slick>

    <!--<slick ref="slick" :options="slickOptions">-->
    <!--<a href="http://placehold.it/2000x1000"><img src="http://localhost/goparty/public/uploads/clubs/thumbnails/300x180-1533504291.png" alt=""></a>-->
    <!--<a href="http://placehold.it/2000x1000"><img src="http://localhost/goparty/public/uploads/clubs/thumbnails/300x180-1533504291.png" alt=""></a>-->
    <!--<a href="http://placehold.it/2000x1000"><img src="http://localhost/goparty/public/uploads/clubs/thumbnails/300x180-1533504291.png" alt=""></a>-->
    <!--<a href="http://placehold.it/2000x1000"><img src="http://localhost/goparty/public/uploads/clubs/thumbnails/300x180-1533504291.png" alt=""></a>-->
    <!--<a href="http://placehold.it/2000x1000"><img src="http://localhost/goparty/public/uploads/clubs/thumbnails/300x180-1533504291.png" alt=""></a>-->
    <!--</slick>-->

    <div class="row mt-3">

      <div
        v-for="club in clubs.data"
        class="col-12 col-md-3 mb-2"
      >
        <div class="single-club">

          <a :href="'http://localhost/goparty/public/clubs/' + club.id">
            <img
              class="img-fluid"
              :src="'http://localhost/goparty/public/uploads/clubs/thumbnails/300x180-' + club.club_img"
              alt=""
            >
            <b><h4 class="text-white mt-2"> {{ club.official_name }}</h4></b>
            <h5>Odległość: {{ getDistanceFromLatLonInKm(position.latitude, position.longitude, club.latitude,
                                                        club.longitude) }}
              km</h5>
          </a>
        </div>
      </div>

    </div>
  </div>
</template>

<script>

import 'slick-carousel/slick/slick.css';
import Slick from 'vue-slick';

export default {
  name: 'NearestClubs',

  components: { Slick },

  data() {
    return {
      loading: false,
      words: [
        'a',
        'b',
        'c',
        'd',
      ],
      position: null,
      clubs: {},
      slickOptions: {
        slidesToShow: 3,
        // Any other options that can be got from plugin documentation
      },
    };
  },
  watch: {
    clubs(club) {
      const currIndex = this.$refs.carousel.currentSlide();

      this.$refs.carousel.destroy();
      this.$nextTick(() => {
        this.$refs.carousel.create();
        this.$refs.carousel.goTo(currIndex, true);
      });
    },
  },
  mounted() {
    this.loading = true;
    setInterval(() => {
      this.clubs.push('club');
    }, 2000);


    if (navigator.geolocation) {
      const self = this;

      navigator.geolocation.getCurrentPosition((position) => {
        self.position = position.coords;
        const lat = self.position.latitude;
        const long = self.position.longitude;

        console.log(self.position.latitude);
        console.log(self.position.longitude);


        axios.get(`/api/nearest-clubs?lat=${lat}&long=${long}`)
          .then((response) => {
            self.clubs = response;

            // console.log(self.clubs);
            // console.log('distance:' + self.getDistanceFromLatLonInKm(lat,long,50.667263, 17.935603899999933))
          })

          .catch((error) => {
            console.log(error);
          });
      });
    }
    this.loading = false;
  },
  methods: {

    next() {
      this.$refs.slick.next();
    },
    prev() {
      this.$refs.slick.prev();
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
</style>
