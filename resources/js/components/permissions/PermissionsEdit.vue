<template>
    <div>
        <h4 class="card-title">Edit permission</h4>
        <div class="card-body">
            <form v-on:submit="saveForm()">
                <div v-show="errors.length > 0" id="error" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div v-for="item in errors">
                        <strong>Error: </strong>{{item}}.
                    </div>
                    <button type="button" class="close" v-on:click="errors = []" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Role</label>
                        <select v-model="permission.role_id" class="form-control">
                          <option v-for="role, index in roles" :value="role.id">{{role.name}}</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Permission</label>
                        <select v-model="permission.permission_code" class="form-control">
                          <option v-for="permission, index in permissionsList" :value="permission.code">{{permission.name}}</option>
                        </select>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <router-link to="/" class="m-1 btn btn-outline-secondary">Back</router-link>
                        <button class="m-1 btn btn-outline-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.permissionId = id;
            axios.get('/api/v1/permissions/' + id,{
                headers: app.$bearerAPITOKEN
            })
                .then(function (resp) {
                    app.permission = resp.data;
                })
                .catch(function () {
                    alert("Could not load your permission")
                });
            axios.get('/api/v1/permissionsList',{
                headers: app.$bearerAPITOKEN
            })
                .then(function (resp) {
                    app.permissionsList = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load list permissionsList");
                });
            axios.get('/api/v1/roles',{
                headers: app.$bearerAPITOKEN
            })
                .then(function (resp) {
                    app.roles = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load list Roles");
                });

        },
        data: function () {
            return {
                permissionId: '',
                permission: {
                    permission_name: '',
                    category_id: '',
                    permission_image: '',
                    permission_slug: '',
                },
                permissionsList: [],
                roles: [],
                errors: [],
            }
        },
        methods: {
            // validate() {
            //     if (this.permission.permission_name === '')
            //     {
            //         this.errors.push("Name is empty");
            //     }
            //     if (this.permission.category_id === '')
            //     {
            //         this.errors.push("Category is empty");
            //     }
            // },
            saveForm() {
                event.preventDefault();
                var app = this;
                //app.errors = [];
                //app.validate();
                // if (app.errors.length == 0)
                // {
                //     app.isLoading = true;
                    var newPermission = app.permission;
                    axios.patch('/api/v1/permissions/' + app.permissionId, newPermission,{
                headers: app.$bearerAPITOKEN
            })
                        .then(function (resp) {
                            app.$router.replace('/');
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            alert("Could not update your permission");
                        });
            }
        }
    }
</script>