
<template>
    <div>
        <div class="col-lg-auto mt-3 mb-5">
            <h3 class="text-center">NAJBLIŻSZE IMPREZY W TWOJEJ OKOLICY</h3>
        </div>

        <div class="row">

            <div v-for="event in events.data" class="col-12 col-md-3 mb-2">
                <div>
                    <img class="img-fluid" src="http://localhost:8000/img/klub1.jpg" alt="">
                    <a :href="'/events/' + event.id">
                        <h4 class="text-white mt-2"> {{ event.title }} </h4>
                        <h4 class="text-white mt-2"> {{ event.start_date }} </h4>
                        <h4 class="text-white mt-2"> {{ event.official_name }} </h4>
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
                events: {}
            }
        },
        mounted: function () {
            if (navigator.geolocation) {
                let self = this;

                navigator.geolocation.getCurrentPosition(function (position) {
                    self.position = position.coords;
                    let lat = self.position.latitude;
                    let long = self.position.longitude;

                    console.log(self.position.latitude);
                    console.log(self.position.longitude);

                    axios.get('/api/nearest-events?lat=' + lat + '&long=' + long)
                        .then(function (response) {
                            self.events = response;
                            console.log(self.events);
                            console.log('distance:' + self.getDistanceFromLatLonInKm(lat,long,50.667263, 17.935603899999933))
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                });

            }
        },
        methods: {
            getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
                let R = 6371; // Radius of the earth in km
                let dLat = this.deg2rad(lat2-lat1);  // deg2rad below
                let dLon = this.deg2rad(lon2-lon1);
                let a =
                    Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) *
                    Math.sin(dLon/2) * Math.sin(dLon/2)
                ;
                let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                let d = R * c; // Distance in km
                return d.toFixed(1);
            },
            deg2rad(deg) {
                return deg * (Math.PI/180)
            }
        }
    }

</script>

<style scoped>

</style>