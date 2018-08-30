<template>
        <div class="row" style="width:100%;">
            <div class="col-md-4 pr-0" v-if="image">
                <img :src="image" class="img-responsive">
            </div>
            <div class="col-md-8">
                <input name="image" type="file" v-on:change="onImageChange" class="form-control file-input" accept="image/x-png,image/gif,image/jpeg">
            </div>
            <!--<div class="col-md-3">-->
            <!--<button class="btn btn-success btn-block" @click="uploadImage">Upload Image</button>-->
            <!--</div>-->
        </div>
</template>

<script>
    export default {
        data() {
            return {
                image: ''
            }
        },
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            uploadImage() {
                axios.post('/image/store', {image: this.image}).then(response => {
                    console.log(response);
                });
            }
        }
    }
</script>

<style>
    .file-input{
        min-width: 250px;
    }
</style>