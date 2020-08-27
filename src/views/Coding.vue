<template>
    <div>
       <vue-title :title="'Coding'"></vue-title>
        <h1>Coding</h1>				
        <div class="projects">
            <ul>
                <li v-for="project in projects"  v-bind:key="project.id">
                    <a v-bind:href="project.link"  target="_blank">
                        <div class="img-container" v-bind:style="{ 'background-image':'url('+project.image+')'}">
                           <!--  <img v-bind:src="project.image" v-bind:alt="project.title"> -->
                        </div>
                    </a>
                    <div>
                        <p v-html="project.description">
                        {{project.description}}<br>
                        </p>
                        <a v-bind:href="project.link"  target="_blank">Demo</a> | 
                        <a v-bind:href="project.repo"  target="_blank">Repo</a>
                    </div>
                     
                </li> 
            </ul>
        </div>
        <div class="resources">
            <p>Link to Github</p>
            <ul>
                <li><a href="https://github.com/JacoMig?tab=repositories" target="_blank">GitHub</a></li>
                <li><a href="https://codepen.io/jaco1981" target="_blank">Codepen</a></li>
            </ul>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data(){
        return{
            projects : Object,
        }
    },
    created() {
        axios
        .get('../assets/coding.json')
        .then(response => { 
            this.projects =  response.data;
            console.log(this.projects)
            /* this.checkProjectLength(); */
        })
    },
}
</script>