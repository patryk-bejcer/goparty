<template>
    <div>
        <div class="col-lg-auto mt-3 mb-5">
            <h3 class="text-center">NAJBLIŻSZE IMPREZY W TWOJEJ OKOLICY</h3>
        </div>

        <div class="row">

            <div v-for="event in events.data" class="col-12 col-md mb-2">
                <div class="single-event">

                    <a :href="'http://localhost/goparty/public/events/' + event.id">
                        <img class="img-fluid" :src="url + event.event_img" alt="">
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
    /*
     * @TODO create nearest events api controller and vue componnt
     */
    export default {
        name: "nearestClubs",
        data: function () {
            return {
                position: null,
                events: {},
                url: 'http://localhost/goparty/public/uploads/events/'
            }
        },
        mounted: function () {
            if (navigator.geolocation) {
                let self = this;

                navigator.geolocation.getCurrentPosition(function (position) {
                    self.position = position.coords;
                    let lat = self.position.latitude;
                    let long = self.position.longitude;

                    // console.log(self.position.latitude);
                    // console.log(self.position.longitude);

                    axios.get('/api/nearest-events?lat=' + lat + '&long=' + long)
                        .then(function (response) {
                            self.events = response;
                            // console.log(self.events);
                            // console.log('distance:' + self.getDistanceFromLatLonInKm(lat,long,50.667263, 17.935603899999933))
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                });

            }
        },
        methods: {
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
        }
    }

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