<template>
    <div class="google-map" :id="mapName"></div>
</template>

<script>
    export default {
        name: 'google-map',
        props: ['name', 'lat', 'long'],
        data: function () {
            return {
                mapName: this.name + "-map",
                markerCoordinates: [{
                    latitude: this.lat,
                    longitude: this.long
                }]
            }
        },
        mounted: function () {
            const element = document.getElementById(this.mapName)
            const options = {
                zoom: 17,
                center: new google.maps.LatLng(this.lat, this.long)
            }
            const map = new google.maps.Map(element, options);
            this.markerCoordinates.forEach((coord) => {
                const position = new google.maps.LatLng(coord.latitude, coord.longitude);
                const marker = new google.maps.Marker({
                    position,
                    map
                });
            });
        }
    };
</script>

<style scoped>
    .google-map {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        background: gray;
    }
    @media (max-width: 768px) {
        .google-map {
            height: 350px;
        }
    }
</style>