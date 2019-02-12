<template>
    <div class="form">
        <vue-title :title="'Contact'"></vue-title>
        <div>
            <input
            id="name"
            v-model="name"
            class="form__field"
            type="text"
            name="name"
            placeholder="Your Name"
            v-bind:class="[hasError.name ? 'text-danger' : '']"
            >
        </div>

        <div>
            <input
            id="email"
            v-model="email"
            class="form__field"
            type="email"
            name="email"
            placeholder="YourEmail@domain.com"
            v-bind:class="[hasError.email ? 'text-danger' : '']"
            >
        </div>

        <div>
            <input
            id="subject"
            v-model="subject"
            class="form__field"
            type="text"
            name="subject"
            placeholder="Your Subject"
            v-bind:class="[hasError.subject ? 'text-danger' : '']"
            >
        </div>

         <div>
            <textarea
            id="Message"
            class="form__field"
            v-model="message"
            name="message"
            placeholder="Your Message"
            ></textarea>
        </div>

        <div>
            <button class="btn" @click="checkForm">Send</button> 
        </div>
    </div>
</template>

<script>
import axios from 'axios';


export default {
    data(){
        return {
            errors: [],
            name: null,
            email: null,
            subject: null,
            message: null,
            hasError: {
                'name' : false,
                'email' : false,
                'subject' : false
            }
        }
    },
    methods: {
        checkForm(e){
            this.errors = [];
            for (var key in this.hasError) {
                this.hasError[key] = false
            }
            if(!this.name){
                this.errors.push('Name required!');
                this.name = 'Name required!';
                this.hasError.name = true
            }
            if (!this.email) {
                this.errors.push('Email required!');
                this.email = 'Email required!';
                this.hasError.email = true
                
            } else if (!this.validEmail(this.email)) {
                this.errors.push('Valid email required!');
                this.email = 'Valid Email required!';
                this.hasError.email = true
            }
            if(!this.subject){
                this.errors.push('Subject required!');
                this.subject = 'Subject required!';
                this.hasError.subject = true
            }

            if (!this.errors.length) {
                this.sendForm();
               // return true       
            }else{
                console.log(this.errors);
               // return false;
            }
            
            return false
        },
        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        sendForm(){
            console.log('Success');
            var formData = new FormData(document.querySelector('.form'))
            
            /* for (var key of formdata.entries()) { console.log(key[0] + ', ' + key[1]) } */
            
            axios.post('http://jacopomigliorelli.com/files/axios_req/php/sendmail.php', formData, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                withCredentials : false
            })
            .then(resp => console.log(resp)) 
            .catch(function(res) {
                if(res instanceof Error) {
                console.log(res.message);
                } else {
                console.log(res.data);
                }
            });  
        }
    },
    mounted(){
        const formFields = document.querySelectorAll('.form__field');
        formFields.forEach(field => {
            field.addEventListener('focus', function(e){
                e.target.value = ""
            })
        })

    }
}
</script>
