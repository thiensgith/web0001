<template>
    <div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title h4 m-0">Permissions list</div>
                <div class="form-group">
                <router-link :to="{name: 'createPermission'}" class="btn btn-outline-dark">Create new permission</router-link>
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Permission</th>
                    <th>Role</th>
                    <th width="100">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="permission, index in permissions">
                    <td>{{permission.permission_name}}</td>
                    <td>{{ permission.role.name }}</td>
                    <td>
                        <router-link :to="{name: 'editPermission', params: {id: permission.id}}" class="btn btn-sm btn-block btn-outline-dark m-1">
                            Edit
                        </router-link>
                        <a href="#"
                           class="btn btn-sm btn-block btn-danger m-1"
                           v-on:click="deleteEntry(permission.id, index)">
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
                permissions: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/permissions',{
                headers: app.$bearerAPITOKEN
            })
                .then(function (resp) {
                    app.permissions = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load permissions");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/permissions/' + id,{
                headers: app.$bearerAPITOKEN
            })
                        .then(function (resp) {
                            app.permissions.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete permission");
                        });
                }
            }
        }
    }
</script>