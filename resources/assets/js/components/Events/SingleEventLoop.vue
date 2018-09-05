<template>
    <div>
        <a :href="renderUrl(event.id)">
            <div class="card mb-4 pb-2 ">
                 <!--<span class="rate">{{'9,5'}}</span>-->
                <img :src="renderImg(event.event_img)" class="card-img-top"
                     :alt="event.official_name"
                     :title="event.official_name"
                     @error="errorImg"
                >
                <div class="card-body mt-1 pt-1">
                    <a>
                        <h4 class="text-white">{{event.title}}</h4>
                    </a>
                    <h6 class="text-white mt-2"> {{ event.start_date }} </h6>
                    <h6 class="text-white mt-2"> Klub: {{ event.official_name }} </h6>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        name: "SingleEventLoop",

        props: {
            event: {
                type: Object,
                required: true
            },
            distance: {
                required: false
            }
        },

        methods: {
            errorImg(event){
                event.target.src = "http://localhost/goparty/public/uploads/events/Klubowa-Noc-w-Bydgoszczy-plakat-obrazek_duzy_4049971.jpg"
            },
            renderImg(img) {
                let imgDirectoryPath = this.$hostname + '/uploads/events/thumbnails/300x180-';
                if (img === null) return imgDirectoryPath + '1533504291.png';
                return imgDirectoryPath + img;
            },
            renderUrl(id) {
                return 'events/' + id;
            },
        }
    }
</script>
