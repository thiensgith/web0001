<template>
    <div>

        <h4 class="card-title">Edit user</h4>
        <div class="card-body">
            <form v-on:submit="saveForm()">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label class="control-label">First name</label>
                        <input type="text" v-model="user.fname" class="form-control">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Last name</label>
                        <input type="text" v-model="user.lname" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label class="control-label">Gender</label>
                        <select v-model="user.gender" class="form-control">
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="control-label">Email</label>
                        <input type="text" v-model="user.email" class="form-control">
                    </div>
                    <div class="col-sm-3 form-group">
                        <label class="control-label">Role</label>
                        <select v-model="userrole" class="form-control">
                          <option v-for="role, index in listroles" :value="role.name">{{role.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-check m-3">
                        <input class="form-check-input" type="checkbox" v-model="user.resetpassword" id="resetpassword">
                        <label class="form-check-label" for="resetpassword">
                        Reset password
                        </label>
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
            app.userId = id;
            axios.get('/api/v1/users/' + id)
                .then(function (resp) {
                    app.user = resp.data.user;
                    app.userrole = resp.data.role;
                    app.listroles = resp.data.roles;
                })
                .catch(function () {
                    alert("Could not load your user")
                });
        },
        data: function () {
            return {
                userId: null,
                listroles: [],
                userrole : '',
                user: {
                    fname: '',
                    lname: '',
                    gender: '',
                    email: '',
                    role: '',
                    resetpassword: false,
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newUser = app.user;
                newUser.role = app.userrole;
                axios.patch('/api/v1/users/' + app.userId, newUser)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not update your user");
                    });
            }
        }
    }
</script>