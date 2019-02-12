<template>
    <div>
        <vue-title :title="infos.title"></vue-title>
        <div class="detail__block" v-if="visible">
            <h1>{{infos.title}}</h1>
            <div class="detail__image">
                <img :src="infos.image" :alt="infos.title"  />
            </div>
            <div class="detail__text">
                <ul>
                    <li>
                        <h3>Techniques</h3>
                        <p>{{infos.category.join(', ')}}</p>
                    </li>
                        <li>
                        <h3>Project description</h3>
                        <p>{{infos.body.description}}</p>
                    </li>
                    <li>
                        <h3>Client</h3>
                        <p>{{infos.body.client}}</p>
                    </li>
                    <li>
                        <h3>When</h3>
                        <p>{{infos.body.when}}</p>
                    </li>
                    <li>
                        <h3>Link to project</h3>
                        <a :href="infos.body.link" :target="'_blank'">{{infos.body.link}}</a>
                    </li>
                </ul>
            </div>
            <div class="detail__pag" v-if="visible">
                <button class="prev" @click="changeProject"></button>
                <button class="next" @click="changeProject"></button>
            </div>
        </div>
        
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data(){
        return{
            id : this.$route.params.id,
            works : Array,
            infos : Object,
            visible: false
        }
    },
    created() {
        axios
        .get('../assets/works.json')
        .then(response => { 
            this.works =  response.data;
            this.infos = this.works.filter(work => work.id === parseInt(this.id))[0]
            this.visible = true
        })
    },
    methods:{
        changeProject(event){
            const direction = event.target.className;
            if(direction === 'next' && (this.id < this.works.length)){
                this.id++;
            }else if(direction === 'prev' && ( this.id > 1)){
                this.id--;
            }  
            this.$router.push({ path: '/detail/'+this.id })
        }
    },
    watch:{
        '$route' (to,from){
            if(to.params.id){
                this.id = to.params.id
                this.infos = this.works.filter(work => work.id === parseInt(this.id))[0]
            }
        }
    }
    
}
</script>

