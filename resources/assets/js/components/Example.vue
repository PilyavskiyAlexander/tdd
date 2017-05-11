<template>
    <div class="container">
        <ul>
            <li v-for="task in tasks">{{ task }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tasks: Laravel.tasks,
            }
        },
        mounted() {
            console.log('Component mounted.' + this.tasks)
        }
    }
</script>
