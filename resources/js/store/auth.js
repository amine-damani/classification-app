import router from '../router'

export default {
    namespaced: true,
    state:{
        authenticated:false,
        token:'',
        user:{}
    },
    getters:{
        authenticated(state){
            return state.authenticated
        },
        user(state){
            return state.user
        },
        token(state){
            return state.token
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            state.authenticated = value
        },
        SET_USER (state, value) {
            state.user = value
        },
        SET_TOKEN (state, value) {
            state.token = value
        }
    },
    actions:{
        login({commit}){
            return axios.get('/api/auth/user', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                commit('SET_USER',response.data.data)
                commit('SET_TOKEN',localStorage.getItem('token'))
                commit('SET_AUTHENTICATED',true)
                router.push({name:'userList'})
            }).catch(({response:{data}})=>{
                commit('SET_USER',{})
                commit('SET_TOKEN','')
                localStorage.removeItem("token");
                commit('SET_AUTHENTICATED',false)
            })
        },
        logout({commit}){
            console.log('cleared')
            commit('SET_USER',{})
            commit('SET_TOKEN','')
            localStorage.removeItem("token")
            commit('SET_AUTHENTICATED',false)
        }
    }
}