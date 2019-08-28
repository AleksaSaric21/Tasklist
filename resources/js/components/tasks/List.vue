<template>
    <div class="container">
        <table class="table">
            <thead>
            <th>Name</th>
            <th>Action</th>
            </thead>
            <tbody>
                <template v-if="!tasks.length">
                    <tr>
                        <td colspan="4" class="text-center"> No plans available</td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="task in tasks" :key="task.id">
                        <td>{{task.name}}</td>
                        <td>
                            <router-link :to="'/tasks/' + task.id">View task</router-link>
                        </td>
                    </tr>

                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "List",
        mounted(){
          this.$store.dispatch('getTasks');
        },
        computed: {
            tasks() {
                return this.$store.getters.tasks;
            }
        }
    }
</script>

<style scoped>

</style>