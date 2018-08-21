<template>
    <div>
        <div id="nearest-clubs">
            <div class="col-lg-auto mt-3 pl-0">
                <h3 class="text-left pull-left">NAJBLIŻSZE KLUBY W TWOJEJ OKOLICY</h3>
                <h5 class="pull-right show-more">
                    <a :href="this.$hostname + '/clubs#/clubs'" class="text-white">Zobacz wszystkie</a>
                </h5>
            </div>
            <div v-show="loading" class="data-loading">
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>
                <p>Trwa ładowanie klubów</p>
            </div>
            <div v-if="!loading" id="clubs-list" class="mt-5">
                <slick ref="slick" :options="slickOptions">
                    <div v-for="club in clubs.data">
                        <single-club-loop
                                :club="club"
                                :distance="getDistanceFromLatLonInKm(position.latitude, position.longitude, club.latitude, club.longitude)"
                        ></single-club-loop>
                    </div>
                </slick>
            </div>
        </div>
    </div>
</template>


<script>
    import Slick from 'vue-slick';
    import 'slick-carousel/slick/slick.css'
    import 'slick-carousel/slick/slick-theme.css'

    export default {
        name: "nearestClubs",

        data: function () {
            return {
                loading: false,
                clubs: {},
                slickOptions: {
                    slidesToShow: 4,
                    dots: true,
                    draggable: true,
                    edgeFriction: 0.30,
                    swipe: true
                },
                position: null
            }
        },

        components: {
            Slick
        },

        mounted: function () {
            this.getResults();
            setInterval(() => {
            }, 2000)
        },
        methods: {
            getResults() {
                if (navigator.geolocation) {

                    let self = this;

                    navigator.geolocation.getCurrentPosition(function (position) {

                        self.loading = true;

                        self.position = position.coords;
                        let lat = self.position.latitude;
                        let long = self.position.longitude;

                        axios.get('/api/nearest-clubs?lat=' + lat + '&long=' + long)
                            .then(function (response) {
                                self.clubs = response;
                                self.loading = false;
                                console.log(response);
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    });
                }
            },
            getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
                let R = 6371; // Radius of the earth in km
                let dLat = this.deg2rad(lat2 - lat1);  // deg2rad below
                let dLon = this.deg2rad(lon2 - lon1);
                let a =
                    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2)
                ;
                let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                let d = R * c; // Distance in km
                return d.toFixed(1);
            },
            deg2rad(deg) {
                return deg * (Math.PI / 180)
            }
        },
        watch: {
            clubs: function () {
                let currIndex = this.$refs.slick.currentSlide()
                this.$refs.slick.destroy()
                this.$nextTick(() => {
                    this.$refs.slick.create()
                    this.$refs.slick.goTo(currIndex, true)
                })
            }
        }
    }

</script>

<style scoped>
    #nearest-clubs .card {
        margin: .5em;
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
        margin-top: 4em;
    }

    #nearest-clubs h3 {
        font-size: 2rem;
    }

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