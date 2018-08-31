<template>
        <div class="row" style="width:100%;">
            <div class="col-md-4 pr-0 mb-3 mb-md-0" v-if="image">
                <img :src="image" class="img-responsive">
            </div>
            <div class="col-md-8">
                <div class="box">
                    <input id="image-input" name="image" type="file" v-on:change="onImageChange" class="form-control file-input inputfile inputfile-1" accept="image/x-png,image/gif,image/jpeg">
                    <label for="image-input">
                        <i class="fa fa-upload" aria-hidden="true"></i><span>{{buttonText}}</span>
                    </label>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                image: '',
                buttonText: 'Wybierz plik z dysku...'
            }
        },

        mounted:{

        },

        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                this.buttonText = files[0].name;
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    }
</script>

<style>

    .box {
        background-color: #041962;
        padding: 10px 10px 4px;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .inputfile-1 + label {
        color: #f1e5e6;
        background-color: #ef3ab1;
    }

    .inputfile + label {
        max-width: 80%;
        font-size: 1.2em;
        font-weight: 500;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        padding: .2em .5em;
    }

    .inputfile + label i {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
        margin-top: 0em;
        margin-right: 0.25em;
    }
    .user-setting-body img {
        object-fit: cover;
        height: 195px;
        width: auto;
        display: block;
        margin: auto;
        max-width: 100%;
    }

    .user-setting-body img {
        object-fit: cover;
        height: auto;
        width:100%;
        display: block;
        margin: auto;
        max-width: 100%;
    }
    @media (max-width: 575.98px) {
        .inputfile + label{
            font-size: .95em;
        }
        .user-setting-body img {
            object-fit: cover;
            height: 195px;
            width: auto;
            display: block;
            margin: auto;
            max-width: 100%;
        }
    }


</style>