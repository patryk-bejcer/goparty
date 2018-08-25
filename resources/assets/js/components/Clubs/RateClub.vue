<template>
    <div>
        <star-rating @rating-selected="setRating"
                     inactive-color="rgba(0, 0, 0, 0.4)"
                     active-color="#ef3ab1"
                     :border-width="0"
                     :star-size="26"
                     class="mb-3"
        >
        </star-rating>
    </div>
</template>

<script>
    import StarRating from 'vue-star-rating';

    export default {
        name: "RateClub",

        components: {
            StarRating
        },

        data() {
            return{
                rating: 0
            }

        },

        methods: {
            setRating: function (rating) {
                this.rating = rating;
                console.log(rating);
            }
        }
    }
</script>

<style scoped>
    .vue-star-rating-pointer{
        width: 32px !important;
    }
</style>