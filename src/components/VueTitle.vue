<script>
    export default {
        name: 'vue-title',
        props: ['title'],
        watch: {
            title: {
                immediate: true,
                handler() {
                    document.title = this.title+' - Jacopo Migliorelli - Frontend Development / Webdesign';
                    // console.log(title)
                }
            }
        },
        render () {
        },
    }
</script>
       