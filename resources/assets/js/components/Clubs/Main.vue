<template>
    <div>
        <clubs-header></clubs-header>
        <div class="container">
            <div id="clubs-list" class="mt-4 pt-2">
                <div class="search-heading">
                    <h1 class="text-white mb-4">Lista wszystkich klubów</h1>
                    <!--<button v-on:click="reset" class="btn btn-primary">Reset</button>-->
                    <!--<p>Miejscowość: {{address}}</p>-->
                </div>
                <div v-show="loading" class="data-loading">
                    <i v-show="loading" class="fa fa-spinner fa-spin"></i>
                    <p>Trwa ładowanie klubów</p>
                </div>
                <div v-if="!loading">
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
                    <pagination :data="clubsList" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Poprzednie</span>
                        <span slot="next-nav">Następne &gt;</span>
                    </pagination>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import VueGoogleAutocomplete from 'vue-google-autocomplete'

    export default {
        components: {VueGoogleAutocomplete},

        props: ['surveyData'],

        data() {
            return {
                // Our data object that holds the Laravel paginator data
                loading: false,
                clubsList: {},
                address: null,
            }
        },

        mounted() {
            this.getResults();
        },


        methods: {
            getResults(page = 1) {
                this.loading = true;
                axios.get('clubs-archived?page=' + page)
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
        },
    }
</script>

