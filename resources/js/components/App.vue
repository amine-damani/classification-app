<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Classification-app</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav mr-auto">
                        <router-link exact-active-class="active" to="/" class="nav-item nav-link">Home</router-link>
                        <router-link exact-active-class="active" to="/users" class="nav-item nav-link">Users</router-link>
                        <router-link exact-active-class="active" to="/groups" class="nav-item nav-link">Groups</router-link>
                    </div>
                    <router-link v-if="!isLogged" exact-active-class="active" to="/login" class="nav-item nav-link">Login</router-link>
                    <div v-else class="form-inline my-2 my-lg-0">
                        <a class="nav-item nav-link" href="javascript:void(0)">{{ user.first_name+' '+user.last_name }}</a>
                        <a class="nav-item nav-link" role='button'  @click="logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>
 
<script>
    import { mapActions } from 'vuex'
    export default {
        computed: {
            isLogged() {
                return this.$store.state.auth.authenticated
            },
            user() {
                return this.$store.state.auth.user
            },
            token() {
                return this.$store.state.auth.token
            }
        },
        methods: {
        ...mapActions({
            exit:'auth/logout'
        }),
            logout(){
                axios.post('/api/auth/logout',{},{
                    headers: {
                        'Authorization': 'Bearer ' + this.token,
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    this.exit()
                }).catch(error =>{
                    console.log(error.message)
                });        
            },
        }
    }
</script>