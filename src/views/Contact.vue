<template>
    <div class="form">
        <div>
            <input v-bind:type="'text'" class="inputtext" v-bind:placeholder="'Your Name'">
        </div>    
        <div>
            <input v-bind:type="'email'" v-bind:placeholder="'Your Email'">
        </div>
        <div>
            <input v-bind:type="'text'" v-bind:placeholder="'Subject'" >
        </div>
        <div>
            <textarea v-bind:placeholder="'Message'"></textarea>
        </div>
        <button class="btn" @click="sendForm">Send</button>
    </div>
</template>

<script>
import axios from 'axios';


export default {
    methods: {
        sendForm(){
            const inputText = document.querySelector('.inputtext')
            const formData = new FormData();
            formData.append('name', inputText.value);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "http://jacopomigliorelli.com/files/sendmail.php", true);
            xmlhttp.setRequestHeader("Content-Type", "jsonp");
            xmlhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
            xmlhttp.send("name=MYNAME");
           /*  axios.post('http://jacopomigliorelli.com/files/sendmail.php', formData, {
                headers: {
                    'Content-Type': 'application/json;charset=UTF-8',
                    "Access-Control-Allow-Origin": "*",
                }
            })
            .then(resp => console.log(resp))  */
             /* this.$jsonp('http://jacopomigliorelli.com/files/sendmail.php', {'name' :'jjjjj'})
             .then(json => {
                console.log(json)
            }).catch(err => {
                // Failed.
            }) */
        }
    }
}
</script>
