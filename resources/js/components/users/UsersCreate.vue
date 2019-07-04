<template>
    <div>
        <h4 class="card-title">Create new user</h4>
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
                    <div class="col-sm-6 form-group">
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
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group text-left">
                        <small>Default password: "1"</small>
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
    export default {
        data: function () {
            return {
                user: {
                    fname: '',
                    lname: '',
                    gender: 'female',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newUser = app.user;
                axios.post('/api/v1/users', newUser)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your user");
                    });
            }
        }
    }
</script>