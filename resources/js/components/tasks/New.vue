<template>
    <div>
    <form>
        <div class="form-group">
            <label for="inputTask">Task</label>
            <input type="text" class="form-control" id="inputTask"
                   aria-describedby="TaskHelp" placeholder="Enter Task Body" v-model="task.body">
        </div>


        <div class="d-flex justify-content-between">
        <button type="submit" @click.prevent="createTask" class="btn btn-primary">Submit</button>
        <router-link to="/tasks">Back</router-link>
        </div>
    </form>
    <div class="errors" v-if="errors">
        <ul>
            <li v-for="(fieldsError, fieldName) in errors" :key="fieldName">
                <strong>{{ fieldName }}</strong> {{fieldsError.join('\n')}}
            </li>
        </ul>
    </div>
    </div>
</template>

<script>
    import validate from 'validate.js';

    export default {
        name: "New",
        data(){
                return {
                    task: {
                        body: '',
                    },
                    errors: null
                }
        },
        methods:{
            createTask(){
                const constraints = this.getConstraints();

                const errors = validate(this.$data.task, constraints);

                if (errors){
                    this.errors = errors;
                    return;
                }
                axios.post('/api/tasks/create', {"name": this.task.body}, {
                    headers:{
                        "Authorization": "Bearer "+ this.$store.state.currentUser.token,
                    },
                }).then((response)=>{
                    console.log('here');
                    this.$router.push('/tasks');
                }).catch((err)=>{
                    alert(err);
                    console.log('here2');

                })
            },
            getConstraints() {
                return {
                    body: {
                        presence: true,
                        length: {
                            minimum:5,
                            message: 'Must be 5 characters long'
                        }
                    }
                }
            }
        }
    }
</script>

<style scoped>
.errors{
    background: lightcoral;
    border-radius: 5px;
    margin-top: 15px;
}
</style>