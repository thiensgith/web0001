<template>
    <div>
        <div class="card-body row">
            <div class="card col-md-4 mx-2">
                <div class="card-body">
                    jgfwekfeuifheiuwfhewi
                    ưefewf
                    ưefewf
                    ưefewf
                </div>
            </div>
            <div class="card col-md-4 mx-2">
                <div class="card-body">
                    jgfwekfeuifheiuwfhewi
                    ưefewf
                    ưefewf
                    ưefewf
                </div>
            </div>
            <div class="card col-md-4 mx-2">
                <div class="card-body">
                    jgfwekfeuifheiuwfhewi
                    ưefewf
                    ưefewf
                    ưefewf
                </div>
            </div>
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
            axios.get('/api/v1/users',{
                headers: app.$bearerAPITOKEN
            })
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
                    axios.delete('/api/v1/users/' + id,{
                headers: app.$bearerAPITOKEN
            })
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