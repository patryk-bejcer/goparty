<template>
    <div>
        <a :href="renderUrl(club.id)">
            <div class="card mb-4 pb-4">
                <span class="rate">{{'9,5'}}</span>
                <img :src="renderImg(club.club_img)" class="card-img-top" :alt="club.official_name"
                     :title="club.official_name">
                <div class="card-body">
                    <a>
                        <h4 class="text-white">{{club.official_name}}</h4>
                    </a>
                    <h6><i aria-hidden="true" class="fa fa-map-marker pt-1 mr-1"></i>
                        {{club.route}} {{club.street_number}}, {{club.locality}}
                    </h6>
                    <h6 v-if="distance"><i class="fa fa-location-arrow mr-1" aria-hidden="true"></i> Odległość <b>
                        {{distance}} km </b></h6>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        name: "SingleClubLoop",

        props: {
            club: {
                type: Object,
                required: true
            },
            distance: {
                required: false
            }
        },

        methods: {
            renderImg(img) {
                let imgDirectoryPath = this.$hostname + '/uploads/clubs/thumbnails/300x180-';
                if (img === null) return imgDirectoryPath + '1533504291.png';
                return imgDirectoryPath + img;
            },
            renderUrl(id) {
                return 'clubs/' + id;
            },
        }
    }
</script>
