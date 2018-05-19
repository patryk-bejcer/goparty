<template>
    <div>
        <h3 class="text-center">Nearest Clubs Component</h3>
        
        <div class="row">
            <div v-for="club in clubs.data" class="col-12">
                <h3> {{club.official_name}} </h3>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "nearestClubs",
        data: function () {
            return {
                position: null,
                clubs: {}
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

                    axios.get('/api/nearest-clubs?lat=' + lat + '&long=' + long)
                        .then(function (response) {
                            self.clubs = response;
                            console.log(self.clubs);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                });

            }
        }
    }

</script>

<style scoped>

</style>