<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add User</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" v-model="user.first_name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" v-model="user.last_name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" v-model="user.email">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control" v-model="user.age">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" v-model="user.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" class="form-control" v-model="user.type">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Group</label>
                                    <select name="group" id="group" class="form-control" v-model="user.group">
                                        <option value="">Groups</option>
                                        <option v-for="group in groups" :key="group.id" v-bind:value="group.id">{{ group.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" v-model="user.password">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" v-model="user.password_confirmation">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"add-user",
    data(){
        return {
            user:{
                first_name:"",
                last_name:"",
                email:"",
                phone:"",
                type:"",
                age:"",
                group:"",
                password:"",
                password_confirmation :""
            },
            groups:[]
        }
    },
    mounted(){
        this.getGroups();
    },
    computed: {
        token() {
            return this.$store.state.auth.token
        }
    },
    methods:{
        async getGroups(){
            await this.axios.get(`/api/groups`).then(response=>{
                this.groups = response.data.data
            }).catch(error=>{
                console.log(error)
            })
        },
        async create(){
            await this.axios.post('/api/users',this.user,{
                headers: {
                    'Authorization': 'Bearer ' + this.token,
                    'Content-Type': 'application/json'
                }
            }).then(response=>{
                this.$router.push({name:"userList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>