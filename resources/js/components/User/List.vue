<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"userAdd"}' class="btn btn-primary" v-if="isLogged">Create User</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Group</th>
                                    <th v-if="isLogged">Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="users.length > 0">
                                <tr v-for="(user,key) in users" :key="key">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.first_name }}</td>
                                    <td>{{ user.last_name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.age }}</td>
                                    <td>{{ user.phone }}</td>
                                    <td>{{ user.type }}</td>
                                    <td>
                                        <span v-if="user.group">{{ user.group.name }}</span>
                                        <span v-else>-</span>
                                    </td>
                                    <td v-if="isLogged">
                                        <router-link :to='{name:"userEdit",params:{id:user.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="9" align="center">No Users Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"users",
    data(){
        return {
            users:[]
        }
    },
    mounted(){
        this.getUsers()
    },
    computed: {
        isLogged() {
            return this.$store.state.auth.authenticated
        },
        token() {
            return this.$store.state.auth.token
        }
    },
    methods:{
        async getUsers(){
            await this.axios.get('/api/users').then(response=>{
                this.users = response.data.data
            }).catch(error=>{
                console.log(error)
                this.users = []
            })
        },
        deleteUser(id){
            if(confirm("Are you sure to delete this user ?")){
                this.axios.delete(`/api/users/${id}`,{
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json'
                }
            }).then(response=>{
                    this.getUsers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>