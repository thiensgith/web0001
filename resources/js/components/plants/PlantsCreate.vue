<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" 
        :can-cancel="false"
        :is-full-page="fullPage"></loading>
        <h4 class="card-title">Create new plant</h4>
        <div class="card-body">
            <form v-on:submit="saveForm()">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="control-label">Plant image</label>
                        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" class="rounded"></vue-dropzone>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Plant name</label>
                        <input type="text" v-model="plant.plant_name" class="form-control">
                    </div>  
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Category</label>
                        <select v-model="plant.category_id" class="form-control">
                          <option v-for="category, index in categories" :value="category.id">{{category.category_name}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <router-link to="/" class="m-1 btn btn-outline-secondary">Back</router-link>
                        <button class="m-1 btn btn-outline-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
 
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone,
            Loading
        },
        data: function () {
            return {
                dropzoneOptions: {
                    url: 'post',
                    autoProcessQueue: false,
                    parallelUploads: 1,
                    maxFiles:1,
                    addRemoveLinks: true,
                    acceptedFiles: ".jpeg,.jpg,.png,",
                    init: function() {
                        this.on("maxfilesexceeded", function(file) {
                            this.removeAllFiles();
                            this.addFile(file);
                        });
                    }   

                },
                plant: {
                    plant_name: '',
                    category_id: '',
                    plant_image: '',
                    plant_slug: '',
                },
                categories: [],
                //Vue Loading Overlay
                isLoading: false,
                fullPage: true
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/categories')
                .then(function (resp) {
                    app.categories = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load list categories");
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                app.isLoading = true;
                var newPlant = app.plant;
                newPlant.plant_image = this.$refs.myVueDropzone.getAcceptedFiles();
                axios.post('/api/v1/plants', newPlant)
                    .then(function (resp) {
                        app.isLoading = false;
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your plant");
                    });
            }
        }
    }
</script>