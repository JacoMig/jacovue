<template>
    <div class="post-area">
        <Card v-for="work in works"  v-bind:work="work" v-bind:key="work.id"></Card> 
    </div>
</template>

<script>
import axios from 'axios'
import Card from '../components/Card.vue'
export default {
    data(){
        return {
            works : Object
        }
    },
    components:{
        Card
    },
    created() {
        axios
        .get('../assets/works.json')
        .then(response => { 
            this.works = response.data 
        })
    }
}
</script>
