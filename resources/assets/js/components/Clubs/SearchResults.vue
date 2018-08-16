<template>
    <div>
        <clubs-header></clubs-header>
        <div class="container">
            <div id="clubs-list" class="mt-4 pt-2">

                <div v-if="address" class="search-heading">
                    <h1 class="text-white mb-4">Kluby w miejscowości {{address}}</h1>
                    <!--<button v-on:click="reset" class="btn btn-primary">Reset</button>-->
                    <!--<p>Miejscowość: {{address}}</p>-->
                </div>

                <div v-show="loading" class="data-loading">
                    <i v-show="loading" class="fa fa-spinner fa-spin"></i>
                    <p>Trwa ładowanie klubów</p>
                </div>

                <div v-if="!loading">
                    <h2 v-if="clubsList.data.length === 0" class="text-white text-center">Brak wyników wyszukiwania
                        dla miasta {{address}} <br>
                        <router-link title="Wszystkie kluby" :to="{name: 'clubs'}">
                            <a style="margin-top:10px; font-size:20px;" href="">Wszystkie kluby</a>
                        </router-link>
                    </h2>
                    <div class="card-columns">
                        <a v-for="club in clubsList.data" :href="renderUrl(club.id)">
                            <div class="card mb-4 pb-4">
                                <img :src="renderImg(club.club_img)" class="card-img-top" alt="Card image top">
                                <div class="card-body">
                                    <a>
                                        <h4 class="text-white">{{club.official_name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchResults",

        props: ['city'],

        data() {
            return {
                // Our data object that holds the Laravel paginator data
                loading: false,
                clubsList: {},
                address: null,
            }
        },

        watch: {
            '$route'(to, from) {
                this.address = this.$route.params.city;
                this.getSearchResults();
            }
        },

        mounted() {
            this.address = this.$route.params.city;
            this.getSearchResults();
        },

        methods: {
            getSearchResults() {
                this.loading = true;
                axios.post('clubs-search?city=' + this.address)
                    .then(response => {
                        this.clubsList = response.data;
                        this.loading = false;
                    });
            },
            renderImg(img) {
                let imgDirectoryPath = 'http://localhost/goparty/public/uploads/clubs/';
                if (img === null) return imgDirectoryPath + '1533504291.png';
                return imgDirectoryPath + img;
            },
            renderUrl(id) {
                return 'clubs/' + id;
            },
            reset() {
                this.address = '';
                this.getResults();
            }
        }
    }
</script>
