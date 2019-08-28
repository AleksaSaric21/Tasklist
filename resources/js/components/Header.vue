<template>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <router-link class="navbar-brand" to="/">My Vue App</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-auto">
                <template v-if="!currentUser">
                    <li>
                        <router-link to="/login" class="nav-link">Login</router-link>
                    </li>
                    <li>
                        <router-link to="/register" class="nav-link">Register</router-link>
                    </li>
                </template>
                <template v-else>
                    <li>
                        <button class="nav-link" @click="logout" >Logout</button>
                    </li>
                </template>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'app-header',
        methods:{
            logout(){
                this.$store.commit('logout');
                this.$router.push('/login');
            }
        },
        computed: {
            currentUser(){
              return this.$store.state.currentUser;
            }
        }

    }
</script>