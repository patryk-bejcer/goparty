<template>
    <div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="mt-2">
                <span v-if="avgRate > 0" class="number-rate">{{avgRate}}</span>
                <!--<span v-else class="number-rate" style="font-size:18px; font-weight: 300">Ten klub nie ma jescze ocen <br></span>-->
                <star-rating @rating-selected="setRating"
                             inactive-color="rgba(0, 0, 0, 0.4)"
                             active-color="#ef3ab1"
                             :increment="1"
                             :rating=avgRate
                             :border-width="0"
                             :read-only="readOnly"
                             :star-size="24"
                             class="mb-3"
                             style="display: inline-flex; width: 29px"
                             :show-rating="false"
                             :padding="5"
                             :round-start-rating="true"
                             v-on:click="test()"

                >
                </star-rating>
            </div>
            <div class="">
                <span style="margin-top: -8px;" class="number-of-rate pull-right text-sm text-right pl-4"><a href="">Liczba ocen:  {{countRate}}</a></span>
            </div>
        </div>

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
                rating: 3,
                avgRate: 0,
                countRate: 0,
                exist: false,
                user: window.Laravel.user,
                readOnly: true,
                userId: null
            }

        },

        created() {
            if (this.logged) {
                this.userId = this.user.id
                this.readOnly = false;
            }
            this.getRate();
        },


        computed: {
            logged() {
                return this.user != null
            }
        },

        methods: {
            getRate() {
                axios.get('http://localhost/goparty/public/api/rate-club-get-sum', {
                    params: {
                        club_id: this.club,
                        user_id: this.userId,
                    }
                })
                    .then(response => {
                        // console.log(response.data);
                        this.avgRate = parseFloat(response.data.avg).toFixed(1);
                        this.countRate = response.data.count
                        this.exist = response.data.exist
                        if (this.exist) {
                            this.readOnly = true;
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            setRating(rating) {
                if (this.logged && !this.exist) {
                    this.rating = rating;
                    // console.log(this);
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
    .vue-star-rating-star[data-v-34cbeed1] {
        display: inline-block;
        width: 29px !important
    }
    .vue-star-rating-pointer {
        width: 32px !important;
    }
    .vue-star-rating-star{
        width:30px !important;
    }
</style>