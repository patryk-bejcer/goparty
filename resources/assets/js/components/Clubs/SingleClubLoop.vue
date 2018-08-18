<template>
    <div>
        <a :href="renderUrl(club.id)">
            <div class="card mb-4 pb-4">
                <span class="rate">{{'9,5'}}</span>
                <img :src="renderImg(club.club_img)" class="card-img-top" alt="Card image top">
                <div class="card-body">
                    <a>
                        <h4 class="text-white">{{club.official_name}}</h4>
                        <h6><i aria-hidden="true" class="fa fa-map-marker pt-1 mr-1"></i>
                            {{club.route}} {{club.street_number}}, {{club.locality}}
                        </h6>
                    </a>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        name: "SingleClubLoop",

        props: {
            club: {
                type: Object,
                required: true
            }
        },

        methods: {
            renderImg(img) {
                let imgDirectoryPath = 'http://localhost/goparty/public/uploads/clubs/';
                if (img === null) return imgDirectoryPath + '1533504291.png';
                return imgDirectoryPath + img;
            },
            renderUrl(id) {
                return 'clubs/' + id;
            },
        }
    }
</script>
