<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex align-content-between">

                            <div><router-link to="/create">New Task</router-link></div>
                        </div>
                    </div>

                    <div class="card-body">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "tasks-main"
    }
</script>

<style scoped>

</style>