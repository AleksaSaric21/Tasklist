<template>
<div class="customer-view" v-if="task">
    <table>
        <thead>
        <tr>
        <th>ID:</th>
        <td>{{ task.id }}</td>
        </tr>
        <tr>
        <th>Name:</th>
        <td>{{ task.name }}</td>
        </tr>
        </thead>
    </table>
    <!--<router-link to="/task">Back to all tasks</router-link>-->
</div>
</template>

<script>
    export default {
        name: "Task",
        data() {
            return {
                task:null
            }
        },
        created(){
            axios.get('/api/task/'+this.$route.params.id, {
                headers: {
                    "Authorization": "Bearer "+ this.$store.state.currentUser.token,
                }
            }).then((response) => {
                this.task = response.data;
             }).catch((error)=>{

        });
        }
    }
</script>

<style scoped>

</style>