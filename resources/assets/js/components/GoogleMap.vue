<template>
  <div
    :id="mapName"
    class="google-map"
  />
</template>

<script>
export default {
  name: 'GoogleMap',
  props: ['name', 'lat', 'long'],
  data() {
    return {
      mapName: `${this.name}-map`,
      markerCoordinates: [{
        latitude: this.lat,
        longitude: this.long,
      }],
    };
  },
  mounted() {
    const element = document.getElementById(this.mapName);
    const options = {
      zoom: 17,
      center: new google.maps.LatLng(this.lat, this.long),
    };
    const map = new google.maps.Map(element, options);
    this.markerCoordinates.forEach((coord) => {
      const position = new google.maps.LatLng(coord.latitude, coord.longitude);
      const marker = new google.maps.Marker({
        position,
        map,
      });
    });
  },
};
</script>

<style scoped>
    .google-map {
        width: 100%;
        height: 102%;
        margin: 0 auto;
        background: gray;
    }
    @media (max-width: 768px) {
        .google-map {
            height: 300px;
        }
    }
</style>
