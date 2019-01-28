<template>
  <div>
    <a :href="renderUrl(club.id)">
      <div class="card mb-4 pb-2">
        <span class="rate">9.25</span>
        <img
          :src="renderImg(club.club_img)"
          class="card-img-top"
          :alt="club.official_name"
          :title="club.official_name"
        >
        <div class="card-body">
          <a>
            <h4 class="text-white">{{ club.official_name }}</h4>
          </a>
          <h6><i
            aria-hidden="true"
            class="fa fa-map-marker pt-1 mr-1"
          />
            {{ club.route }} {{ club.street_number }}, {{ club.locality }}
          </h6>
          <h6 v-if="distance"><i
            class="fa fa-location-arrow mr-1"
            aria-hidden="true"
          /> Odległość <b>
            {{ distance }} km </b></h6>
        </div>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  name: 'SingleClubLoop',

  props: {
    club: {
      type: Object,
      required: true,
    },
    distance: {
      required: false,
    },
  },

  data() {
    return {
      avgRate: null,
    };
  },

  methods: {
    renderImg(img) {
      const imgDirectoryPath = `http://localhost:8000/uploads/clubs/thumbnails/thumb-`;
      if (img === null) return `${imgDirectoryPath}1533504291.png`;
      return imgDirectoryPath + img.src;
    },
    renderUrl(id) {
      return `/clubs/${id}`;
    },
    // getRate(clubId) {
    //     axios.get('rate-club-get-sum', {
    //         params: {
    //             club_id: clubId
    //         }
    //     })
    //         .then(response => {
    //             console.log(response.data.avg)
    //             return response.data.avg
    //         })
    //         .catch(error => {
    //             console.log(error)
    //             return 0
    //         });
    //     return '5.0';
    // }
  },
};
</script>
