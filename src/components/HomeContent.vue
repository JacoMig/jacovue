<template>
    <div class="font__content" @click="redirect()">
        <FullNameMobileSvg v-if="isMobile()"/>
        <FullNameSvg v-else />
        <div class="home__tagline">
            <span>Frontend_Developer</span><span>__Webdesign</span>
        </div>
    </div>
</template>

<script>
import Vivus from 'vivus'
import FullNameSvg from '../components/FullNameSvg.vue'
import FullNameMobileSvg from '../components/FullNameMobileSvg.vue'

export default {
    components:{
        FullNameSvg, FullNameMobileSvg
    },
    mounted(){
        new Vivus('Fullname', {duration: 100,  animTimingFunction: Vivus.EASE}, this.fadeInDesc);
    },
    methods:{
        fadeInDesc(){
            const that = this
            const homeTagLine = document.querySelector('.home__tagline');
            homeTagLine.classList.add('animate')
            homeTagLine.addEventListener('transitionend', function(){
               setTimeout(() => {
                    /* that.$router.push({path : '/about'})     */
                    that.redirect();
               }, 2000); 
               
            })
        },
        isMobile(){
            if(window.innerWidth <= 600)
                return true
            else
                return false
        },
        redirect(){
             this.$router.push({path : '/about'}) 
        }
    }
}
</script>
