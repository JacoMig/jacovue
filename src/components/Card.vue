<template>
     <div class="post card-main" data-aos="fade-in" data-aos-ease="ease-in-out" daat-aos-duration="1500">
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
                <router-link to="/works/:id" class="btn">Go to Project</router-link>
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
 