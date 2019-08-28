import {getlocalUser} from "./helpers";

const user = getlocalUser();

export default {
    state:{
        welcomeMessage: 'Welcome to the app',
        currentUser: user,
        tasks:[],
        isLoggedIn: false,
        authError: ''
    },
    getters: {
        welcome(state){
            return state.welcomeMessage;
        },
        currentUser(state){
            return state.currentUser;
        },
        tasks(state){
            return state.tasks;
        }
    },
    mutations:{
        login_success(state,payload){
            state.isLoggedIn = true;

            state.currentUser = Object.assign({}, payload.success.user, {token: payload.success.token});
            localStorage.setItem("user", JSON.stringify(state.currentUser));


            },
        login_failed(state,payload){
            state.isLoggedIn = false;
            state.authError = payload.error;
            },
        logout(state){
            state.currentUser = null;
            localStorage.removeItem("user");
            state.isLoggedIn = false;

        },
        updateTasks(state, payload){
            state.tasks = payload;
        }
        },
    actions: {
        getTasks(context) {

            axios.get('api/tasks/'+context.state.currentUser.id, {
                headers: {
                    "Authorization": "Bearer "+ context.state.currentUser.token
                }
            }).then((response) => {
                context.commit('updateTasks', response.data);

            }).catch((error)=>{
                alert(error);
                console.log("Bearer"+ context.state.currentUser);
            });

        }

    }
}