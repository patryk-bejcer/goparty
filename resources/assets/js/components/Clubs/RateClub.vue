<template>
    <div>
        <star-rating @rating-selected="setRating"
                     inactive-color="rgba(0, 0, 0, 0.4)"
                     active-color="#ef3ab1"
                     :rating="avgRate"
                     :border-width="0"
                     :read-only="readOnly"
                     :star-size="26"
                     class="mb-3"
                     v-on:click="test()"
        >
        </star-rating>

        <h1 class="text-white">Średnia ocen: {{avgRate}}</h1>
        <h1>Liczba ocen: {{countRate}}</h1>
    </div>
</template>

<script>
    /* TODO Finish this component!!! */
    import StarRating from 'vue-star-rating';

    export default {
        name: "RateClub",

        components: {
            StarRating
        },

        props: ['club'],

        data() {
            return {
                rating: 3,
                avgRate: 0,
                countRate: 0,
                exist: false,
                user: window.Laravel.user,
                readOnly: true,
                userId: null
            }

        },

        created(){
            this.getRate();
            if(this.logged){
                this.userId = this.user.id
                this.readOnly = false;
            }
        },



        computed:{
            logged(){
                return this.user != null
            }
        },

        methods: {
            getRate(){
                axios.get('http://localhost/goparty/public/api/rate-club-get-sum',{
                    params: {
                        club_id: this.club,
                        user_id: this.userId,
                    }
                })
                    .then(response => {
                        console.log(response.data);
                        this.avgRate = response.data.avg
                        this.countRate = response.data.count
                        this.exist = response.data.exist
                        if(this.exist){
                            this.readOnly = false;
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            setRating(rating) {
                if(this.logged && !this.exist){
                    this.rating = rating;
                    axios.post('api/rate-club', {
                        rateValue: this.rating,
                        club: this.club,
                        userId: this.user.id,
                    })
                        .then(response => {
                            console.log(response)
                            this.getRate()
                        })
                        .catch(error => {
                            console.log(error)
                        });
                } else {
                    console.log('not logged or rate exist')
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