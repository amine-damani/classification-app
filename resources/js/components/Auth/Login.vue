<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <hr/>
                        <form action="javascript:void(0)" class="row" method="post">
                            <div class="form-group col-12 mb-2">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" v-bind="auth.email" v-model="auth.email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-12 mb-2">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" v-bind="auth.email" v-model="auth.password" name="password" id="password" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" @click="login" class="btn btn-primary btn-block">
                                    {{ processing ? "Please wait" : "Login" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name:"login",
    data(){
        return {
            auth:{
                email:"admin@admin.com",
                password:"password"
            },
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async login(){
            this.processing = true
            await axios.post('/api/auth/login',this.auth).then(response => {
                localStorage.setItem("token", response.data.data.token)
                this.signIn()
            }).catch(error =>{
                console.log(error.message)
            }).finally(()=>{
                this.processing = false
            })
        }
    }
}
</script>