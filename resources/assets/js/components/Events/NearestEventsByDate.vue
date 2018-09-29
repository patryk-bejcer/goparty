<template>
  <div>
    <div id="nearest-events">
      <div class="row justify-content-center">
        <div class="col-lg-auto mt-0 mt-md-4 mb-3 mb-md-4">
          <h3 class="text-right first-heading">
            <a
              href="events"
              title="Zobacz wszystkie wydarzenia"
            >WYDARZENIA</a>
          </h3>
          <h3 class="text-center second-heading">NADCHODZĄCE DATY</h3>
        </div>
      </div>
      <!--<div class="row">-->
      <!--<div class="col-12 mt-3 pl-0">-->
      <!--<h3 class="text-left pull-left ml-3">NAJBLIŻSZE IMPREZY W TWOJEJ OKOLICY</h3>-->
      <!--<h5 class="pull-right show-more">-->
      <!--<a :href="`${hostname}/events`" class="text-white">Zobacz wszystkie</a>-->
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
        <p>Trwa ładowanie najbliższych imprez</p>
      </div>
      <div>
        <div
          v-if="!loading"
          id="events-list"
          class="mt-2"
        >
          <slick
            ref="slick"
            :options="slickOptions"
          >
            <div v-for="event in events.data">
              <single-event-loop
                :event="event"
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
import SingleEventLoop from '../Events/SingleEventLoop';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

export default {
  name: 'NearestEvents',

  components: {
    Slick, SingleEventLoop,
  },

  data() {
    return {
      hostname: this.$hostname,
      loading: false,
      events: {},
      position: null,
      slickOptions: {
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
              autoplaySpeed: 2500,
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
    events() {
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
    // setInterval(() => {
    // }, 4500)
    console.log(this.hostname);
  },
  methods: {
    getResults() {
      if (navigator.geolocation) {
        const self = this;

        navigator.geolocation.getCurrentPosition((position) => {
          self.loading = true;

          self.position = position.coords;
          const lat = self.position.latitude;
          const long = self.position.longitude;

          axios.get(`/api/nearest-events?lat=${lat}&long=${long}`)
            .then((response) => {
              self.events = response;
              self.loading = false;
              // console.log(response);
            })
            .catch((error) => {
              console.log(error);
            });
        });
      }
    },
  },
};

</script>

<style scoped>
    #nearest-events .card {
        margin: .5em;
    }

    .single-event {
        transition: .3s;
        text-align: center;
    }

    .single-event:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

    #nearest-events {
        margin-top: 0em;
    }

    /*#nearest-events h3 {*/
    /*font-size: 2rem;*/
    /*}*/

    #nearest-events .show-more {
        margin-top: .75em;
    }

    #nearest-events .show-more:hover {
        text-decoration: underline;
    }

    #nearest-events .single-event {
        background: rgba(0, 0, 0, 0.4);
        padding-bottom: .75em;
    }

    #nearest-events .single-event img {
        padding-bottom: .5em;
    }

    #nearest-events .single-event:hover {
        transform: scale(1.075);
    }

    #events-list .card {
        margin: .5em !important;
    }

    #events-list a h4 {
        color: #de29a0;
    }
</style>
