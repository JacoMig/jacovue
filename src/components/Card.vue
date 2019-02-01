<template>
    <div class="post card-main">
        <div class="flip">
            <div class="front card">
                <div class="post-thumb">
                    <img v-bind:src="work.thumb" v-bind:alt="work.title" />
                </div>
                <div class="post-title">{{work.title}}</div>
            </div>
            <div class="back card">
                <h1>{{work.title}}</h1>
                <div class="post-category">{{work.category.join(', ')}}</div>
                <router-link to="/works/:id">Go to Project</router-link>
            </div>    
        </div>    
    </div>
</template>
 <script>
 export default {
    props:{
        work : Object
    }
 }
 </script>
 