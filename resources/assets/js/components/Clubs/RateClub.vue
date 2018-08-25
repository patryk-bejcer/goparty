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

        props: ['club'],

        data() {
            return {
                rating: 0,
                user: window.Laravel.user,
            }

        },

        created(){

        },

        computed:{
            logged(){
                return this.user != null
            }
        },

        methods: {
            getRating(rating){
                axios.get('api/rate-club', {
                    rateValue: this.rating,
                    club: this.club,
                    userId: this.user.id,
                })
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            setRating(rating) {
                if(this.logged){
                    this.rating = rating;
                    axios.post('api/rate-club', {
                        rateValue: this.rating,
                        club: this.club,
                        userId: this.user.id,
                    })
                        .then(response => {
                            console.log(response)
                        })
                        .catch(error => {
                            console.log(error)
                        });
                }
            }
        }
    }
</script>

<style scoped>
    .vue-star-rating-pointer {
        width: 32px !important;
    }
</style>