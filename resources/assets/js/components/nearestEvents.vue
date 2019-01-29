<style>
    #nearest-events{
        margin-top: 4em;
    }
    #nearest-events h3{
        font-size: 2rem;
    }
    #nearest-events .show-more{
        margin-top: .75em;
    }
    #nearest-events .show-more:hover{
        text-decoration: underline;
    }

    #nearest-events .single-event{
        background: rgba(0,0,0,0.4);
        padding-bottom: .75em;

        font-size: 1.1rem;
    }

    #nearest-events .single-event h5{
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding-left: .5em;
        padding-right: .5em;
    }

    #nearest-events  .single-event img{
        padding-bottom: .5em;
    }

    #nearest-events .single-event:hover{
        transform:scale(1.075);
    }

</style>

<template>
  <div id="nearest-events">
    <div class="col-lg-auto mt-3 pl-0">
      <h3 class="text-left pull-left">NAJBLIŻSZE IMPREZY W TWOJEJ OKOLICY</h3>
      <h5 class="pull-right show-more">
        <a
          class="text-white"
          href=""
        >Zobacz wszystkie</a>
      </h5>
    </div>

    <div class="clearfix" />

    <div class="row mt-3">

      <div
        v-for="event in events.data"
        class="col-12 col-md mb-2"
      >
        <div class="single-event text-center">

          <a :href="`${this.$appUrl}/events/${event.id}`">
            <img
              class="img-fluid"
              :src="url + '/thumbnails/300x180-' + event.event_img"
              alt=""
            >
            <h5 class="text-white mt-2"> {{ event.title }} </h5>
            <h6 class="text-white mt-2"> {{ event.start_date }} </h6>
            <h6 class="text-white mt-2"> Klub: {{ event.official_name }} </h6>
          </a>
        </div>
      </div>

    </div>
  </div>
</template>

<script>

export default {
  name: 'NearestClubs',
  data() {
    return {
      position: null,
      events: {},
      url: `${this.$appUrl}/uploads/events/`,
    };
  },
  mounted() {
    if (navigator.geolocation) {
      const self = this;

      navigator.geolocation.getCurrentPosition((position) => {
        self.position = position.coords;
        const lat = self.position.latitude;
        const long = self.position.longitude;

        // console.log(self.position.latitude);
        // console.log(self.position.longitude);

        axios.get(`${this.$appUrl}/api/nearest-events?lat=${lat}&long=${long}`)
          .then((response) => {
            self.events = response;
            // console.log(self.events);
            // console.log('distance:' + self.getDistanceFromLatLonInKm(lat,long,50.667263, 17.935603899999933))
          })
          .catch((error) => {
            console.log(error);
          });
      });
    }
  },
  methods: {
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
    .single-event{
        transition:.3s;
    }
    .single-event:hover{
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
