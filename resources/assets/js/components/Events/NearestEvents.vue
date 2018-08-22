<template>
    <div>
        <div id="nearest-events">
            <div class="row">
                <div class="col-12 mt-3 pl-0">
                    <h3 class="text-left pull-left ml-3">NAJBLIŻSZE IMPREZY W TWOJEJ OKOLICY</h3>
                    <h5 class="pull-right show-more">
                        <a :href="this.$hostname + '/events'" class="text-white">Zobacz wszystkie</a>
                    </h5>
                </div>
            </div>

            <div v-show="loading" class="data-loading">
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>
                <p>Trwa ładowanie najbliższych imprez</p>
            </div>
            <div>
                <div v-if="!loading" id="events-list" class="mt-2">
                    <slick ref="slick" :options="slickOptions">
                        <div v-for="event in events.data">
                            <single-event-loop
                                    :event="event"
                            ></single-event-loop>
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
    import 'slick-carousel/slick/slick.css'
    import 'slick-carousel/slick/slick-theme.css'

    export default {
        name: "nearestEvents",

        data: function () {
            return {
                loading: false,
                events: {},
                position: null,
                slickOptions: {
                    slidesToShow: 4,
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
                                autoplaySpeed: 2500
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                autoplaySpeed: 3000
                            }
                        },
                        {
                            breakpoint: 575,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoplaySpeed: 2500
                            }
                        }
                    ]
                }
            }
        },

        components: {
            Slick
        },

        mounted: function () {
            this.getResults();
            // setInterval(() => {
            // }, 4500)
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

                        axios.get('/api/nearest-events?lat=' + lat + '&long=' + long)
                            .then(function (response) {
                                self.events = response;
                                self.loading = false;
                                console.log(response);
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    });
                }
            },
        },
        watch: {
            events: function () {
                let currIndex = this.$refs.slick.currentSlide();
                this.$refs.slick.destroy();
                this.$nextTick(() => {
                    this.$refs.slick.create();
                    this.$refs.slick.goTo(currIndex, true)
                })
            }
        }
    }

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
        margin-top: 4em;
    }

    #nearest-events h3 {
        font-size: 2rem;
    }

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