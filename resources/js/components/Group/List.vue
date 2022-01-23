<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Group</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody v-if="groups.length > 0">
                                <tr v-for="(group,key) in groups" :key="key">
                                    <td>{{ group.id }}</td>
                                    <td>{{ group.name }}</td>
                                    <td>{{ group.description }}</td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="3" align="center">No Groups Found.</td>
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
    name:"groups",
    data(){
        return {
            groups:[]
        }
    },
    mounted(){
        this.getGroups()
    },
    methods:{
        async getGroups(){
            await this.axios.get('/api/groups').then(response=>{
                this.groups = response.data.data
            }).catch(error=>{
                console.log(error)
                this.groups = []
            })
        },
        deleteGroup(id){
            if(confirm("Are you sure to delete this group ?")){
                this.axios.delete(`/api/groups/${id}`).then(response=>{
                    this.getGroups()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>