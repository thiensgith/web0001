<template>
    <div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title h4 m-0">Users list</div>
                <div class="form-group">
                <router-link :to="{name: 'createUser'}" class="btn btn-outline-dark">Create new user</router-link>
                </div>
            </div>            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th width="100">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user, index in users">
                    <td>{{ user.id }}</td>
                    <td>{{ user.fname }}</td>
                    <td>{{ user.lname }}</td>
                    <td>{{ user.gender }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <router-link :to="{name: 'editUser', params: {id: user.id}}" class="btn btn-sm btn-block btn-outline-dark m-1">
                            Edit
                        </router-link>
                        <a href="#"
                           class="btn btn-sm btn-block btn-danger m-1"
                           v-on:click="deleteEntry(user.id, index)">
                            Delete
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                users: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/users')
                .then(function (resp) {
                    app.users = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/users/' + id)
                        .then(function (resp) {
                            app.users.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete user");
                        });
                }
            }
        }
    }
</script>