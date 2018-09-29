<template>
  <div>
    <div
      id="clubs-list"
      class="mt-5"
    >
      <slick
        ref="slick"
        :options="slickOptions"
      >
        <div v-for="club in clubs.data">
          <single-club-loop
            :club="club"
          />
        </div>
      </slick>
    </div>
  </div>
</template>

<script>
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

export default {
  components: {
    Slick,
  },
  data() {
    return {
      clubs: {},
      slickOptions: {
        slidesToShow: 4,
        dots: true,
        draggable: true,
        edgeFriction: 0.30,
        swipe: true,
      },
    };
  },
  watch: {
    clubs() {
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
    setInterval(() => {
    }, 2000);
  },
  methods: {
    getResults() {
      axios.get('clubs-archived?page=1')
        .then((response) => {
          this.clubs = response.data;
        });
    },
  },
};
</script>

<style>
    .slick-slide .card {
        margin: .5em;
    }
</style>
