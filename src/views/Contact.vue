<template>
    <div class="form">
        <div>
            <input v-bind:type="'text'" v-bind:placeholder="'Your Name'">
        </div>    
        <div>
            <input v-bind:type="'email'" v-bind:placeholder="'Your Email'">
        </div>
        <div>
            <input v-bind:type="'text'" v-bind:placeholder="'Subject'" >
        </div>
        <div>
            <textarea></textarea>
        </div>
        <button @click="sendForm">Send</button>
    </div>
</template>

<script>
export default {
    methods: {
        sendForm(){
            
        }
    }
}
</script>
