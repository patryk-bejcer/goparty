<template>
    <div>
        <clubs-header></clubs-header>


        <div style="min-height: 420px;">

            <a v-on:click="fetchNextClub" class="prev-club">
                <i class="fa fa-angle-left fa-5x" aria-hidden="true"></i>
            </a>
            <a v-on:click="fetchPrevClub" class="next-club">
                <i class="fa fa-angle-right fa-5x" aria-hidden="true"></i>
            </a>

            <div class="container mt-4 pl-0">

                <nav aria-label="breadcrumb" class="mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Strona główna</a></li>

                        <li class="breadcrumb-item"><a href="#">
                            <router-link title="Wszystkie kluby" :to="{name: 'clubs'}">Wszystkie kluby</router-link>
                        </a></li>

                        <li class="breadcrumb-item active" aria-current="page">{{club.official_name}}</li>
                    </ol>
                </nav>

            </div>

            <div v-show="loading" class="data-loading" style="margin-top: 3em;">
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>
                <p>Trwa ładowanie klubu</p>
            </div>

            <div v-if="!loading" class="container">

                <div class="container mt-1" style="max-width: 100%;" id="single_club"
                     data-scroll="scroll">

                    <div class="row justify-content-center">

                        <!--<div class="club-border"></div>-->
                        <div class="col-lg-6">
                            <img class="img-fluid" :src="renderImg(club.club_img)"
                                 alt="">


                        </div>

                        <div class="col-lg-6" style="padding-top: 0px;">
                            <h2 style="margin-top: 0px;" class="text-center">{{club.official_name}}</h2>
                            <hr>
                            <p id="description">
                                Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle
                                poligraficznym.
                                Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem
                                próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym,
                                pozostając
                                praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją
                                arkuszy
                                Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje
                                Lorem
                                Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak
                                Aldus PageMaker
                            </p>
                            <div style="display: none;" class="description-footer">
                                <a href="#"><i class="fa fa-globe" style="margin-right: 5px"> </i> <span
                                        style="color: white; ">Miasto: </span>{{club.locality}} </a>
                                <a href="#"><i class="fa fa-globe" style="margin-right: 5px"> </i> <span
                                        style="color: white; ">Wojewodztwo: </span>{{club.voivodeship}} </a>
                                <a href="#"><i class="fa fa-globe" style="margin-right: 5px"> </i> <span
                                        style="color: white; ">Ulica: </span>{{club.route}} {{club.street_number}} </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container" id="events">
                    <div class="row justify-content-center">


                        <div class="col-lg-12 mt-3 mb-3 text-center">
                            <h3 class="text-left">Najważniejsze informacje </h3>
                        </div>
                        <div id="event-carousel" class="carousel carousel-events slide carousel-fade"
                             data-ride="carousel">
                            <div class="carousel-inner">

                                <div id="shadow-outside" class="carousel-item  active  "
                                     style="min-height: 420px; overflow: hidden">
                                    <div class="event-image">

                                        <img class="event-image" :src="renderImg(club.club_img)">
                                        <div id="shadow-inside"></div>

                                    </div>

                                    <div class="row text-white pt-4">
                                        <div class="col-lg-4">
                                            <h4>Oceny</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4>Informacje</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4>Dojazd</h4>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 event" style="padding-top:1rem; padding-bottom: 1rem">

                                        <div class="row">
                                            <div class="col-lg-1">
                                                <h1 style=" margin: 0px; "> 1. </h1>
                                            </div>
                                            <div class="col-lg-11">
                                                <p style="margin-top: 5px;" id="event-name">Gruba imba</p>
                                                <p id="event-date">2018-06-15 <span class="pull-right">6166 osób</span>
                                                </p>

                                            </div>
                                        </div>
                                        <hr style="background-color: white; text-align: center; margin-top: 5px">
                                        <div id="event-article" class="col-lg-19 text-center " style="; padding: 0px;">
                                            <article>
                                                I have done that?' she thought. 'I must be off, and had no idea what
                                                you're
                                                doing!' cried.
                                            </article>

                                        </div>
                                        <a style=" font-size: 20px;"
                                           class="mt-3 myBtn-link text-white myBtn hvr-sweep-to-right animated fadeIn">Zobacz
                                            wiecej</a>
                                    </div>
                                    <div class="col-lg-12 event" style="padding-top:1rem; padding-bottom: 1rem">

                                        <div class="row">
                                            <div class="col-lg-1">
                                                <h1 style=" margin: 0px; "> 2. </h1>
                                            </div>
                                            <div class="col-lg-11">
                                                <p style="margin-top: 5px;" id="event-name">Tyra Lebsack</p>
                                                <p id="event-date">2018-06-15 <span class="pull-right">6166 osób</span>
                                                </p>

                                            </div>
                                        </div>
                                        <hr style="background-color: white; text-align: center; margin-top: 5px">
                                        <div id="event-article" class="col-lg-19 text-center " style="; padding: 0px;">
                                            <article>
                                                I have done that?' she thought. 'I must be off, and had no idea what
                                                you're
                                                doing!' cried.
                                            </article>

                                        </div>
                                        <a style=" font-size: 20px;"
                                           class="mt-3 myBtn-link text-white myBtn hvr-sweep-to-right animated fadeIn">Zobacz
                                            wiecej</a>
                                    </div>


                                </div>


                            </div>

                            <a class="carousel-control-prev " href="#event-carousel" data-slide="prev"
                               style="font-size:4em; color:black; z-index: 1; left: -11%; top:0px !important;">
                                <span class="carousel-control fa fa-caret-left fa-sm"></span>
                            </a>
                            <a class="carousel-control-next " href="#event-carousel" data-slide="next"
                               style="font-size:4em; color:black; z-index: 1; right: -11%; top:0px !important;">
                                <span class="carousel-control fa fa-caret-right fa-sm"></span>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="container mt-5" id="events">
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-12 mt-5 mb-3 text-center">
                            <h3>Najbliższe wydarzenia: </h3>
                        </div>
                        <div id="event-carousel" class="carousel carousel-events slide carousel-fade"
                             data-ride="carousel">
                            <div class="carousel-inner">

                                <div id="shadow-outside" class="carousel-item  active  "
                                     style="min-height: 420px; overflow: hidden">
                                    <div class="event-image">

                                        <img class="event-image" :src="renderImg(club.club_img)">
                                        <div id="shadow-inside"></div>

                                    </div>
                                    <div class="col-lg-12 event" style="padding-top:1rem; padding-bottom: 1rem">

                                        <div class="row">
                                            <div class="col-lg-1">
                                                <h1 style=" margin: 0px; "> 1. </h1>
                                            </div>
                                            <div class="col-lg-11">
                                                <p style="margin-top: 5px;" id="event-name">Gruba imba</p>
                                                <p id="event-date">2018-06-15 <span class="pull-right">6166 osób</span>
                                                </p>

                                            </div>
                                        </div>
                                        <hr style="background-color: white; text-align: center; margin-top: 5px">
                                        <div id="event-article" class="col-lg-19 text-center " style="; padding: 0px;">
                                            <article>
                                                I have done that?' she thought. 'I must be off, and had no idea what
                                                you're
                                                doing!' cried.
                                            </article>

                                        </div>
                                        <a style=" font-size: 20px;"
                                           class="mt-3 myBtn-link text-white myBtn hvr-sweep-to-right animated fadeIn">Zobacz
                                            wiecej</a>
                                    </div>
                                    <div class="col-lg-12 event" style="padding-top:1rem; padding-bottom: 1rem">

                                        <div class="row">
                                            <div class="col-lg-1">
                                                <h1 style=" margin: 0px; "> 2. </h1>
                                            </div>
                                            <div class="col-lg-11">
                                                <p style="margin-top: 5px;" id="event-name">Tyra Lebsack</p>
                                                <p id="event-date">2018-06-15 <span class="pull-right">6166 osób</span>
                                                </p>

                                            </div>
                                        </div>
                                        <hr style="background-color: white; text-align: center; margin-top: 5px">
                                        <div id="event-article" class="col-lg-19 text-center " style="; padding: 0px;">
                                            <article>
                                                I have done that?' she thought. 'I must be off, and had no idea what
                                                you're
                                                doing!' cried.
                                            </article>

                                        </div>
                                        <a style=" font-size: 20px;"
                                           class="mt-3 myBtn-link text-white myBtn hvr-sweep-to-right animated fadeIn">Zobacz
                                            wiecej</a>
                                    </div>


                                </div>


                            </div>

                            <a class="carousel-control-prev " href="#event-carousel" data-slide="prev"
                               style="font-size:4em; color:black; z-index: 1; left: -11%; top:0px !important;">
                                <span class="carousel-control fa fa-caret-left fa-sm"></span>
                            </a>
                            <a class="carousel-control-next " href="#event-carousel" data-slide="next"
                               style="font-size:4em; color:black; z-index: 1; right: -11%; top:0px !important;">
                                <span class="carousel-control fa fa-caret-right fa-sm"></span>
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SingleClub",
        data() {
            return {
                id: null,
                loading: false,
                club: []
            }
        },
        mounted() {
            this.id = this.$route.params.id;
            this.fetchClub();
        },

        watch: {
            '$route'(to, from) {
                this.fetchClub();
            }
        },

        methods: {
            fetchClub() {
                this.loading = true;
                axios.post('clubs-single?id=' + this.id)
                    .then(response => {
                        this.club = response.data;
                        this.loading = false;
                    })
                    .catch(error => {
                        console.log(response)
                    });
            },
            //TODO Handle 404 error on next and prev club in axios methods.
            fetchNextClub() {
                this.loading = true;
                let nextClubId = this.id++;
                this.$router.push({name: 'singleClub', params: {id: nextClubId}});
            },
            fetchPrevClub() {
                this.loading = true;
                let prevClubId = this.id--;
                this.$router.push({name: 'singleClub', params: {id: prevClubId}});
            },
            renderImg(img) {
                let imgDirectoryPath = 'http://localhost/goparty/public/uploads/clubs/';
                if (img === null) return imgDirectoryPath + '1533504291.png';
                return imgDirectoryPath + img;
            },
        }
    }
</script>

<style scoped>

</style>